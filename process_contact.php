<?php
/**
 * Contact Form Processing Script
 * Handles form submission with validation and security
 */

// Start session for CSRF protection (if needed)
session_start();

// Set content type for JSON response
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Configuration
$config = [
    'admin_email' => 'info@consulting.com', // Change to your email
    'smtp_enabled' => false, // Set to true if using SMTP
    'rate_limit' => 5, // Max submissions per hour per IP
];

/**
 * Sanitize input data
 */
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate email address
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number
 */
function validatePhone($phone) {
    if (empty($phone)) return true; // Phone is optional
    return preg_match('/^[\+]?[0-9\s\-\(\)]{10,}$/', $phone);
}

/**
 * Rate limiting check
 */
function checkRateLimit($config) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $rate_file = sys_get_temp_dir() . '/contact_rate_' . md5($ip);
    
    if (file_exists($rate_file)) {
        $submissions = json_decode(file_get_contents($rate_file), true);
        $current_time = time();
        
        // Remove submissions older than 1 hour
        $submissions = array_filter($submissions, function($time) use ($current_time) {
            return ($current_time - $time) < 3600;
        });
        
        if (count($submissions) >= $config['rate_limit']) {
            return false;
        }
        
        $submissions[] = $current_time;
    } else {
        $submissions = [time()];
    }
    
    file_put_contents($rate_file, json_encode($submissions));
    return true;
}

/**
 * Send email notification
 */
function sendEmail($data, $config) {
    $to = $config['admin_email'];
    $subject = 'New Contact Form Submission - ' . $data['subject'];
    
    $message = "
    New contact form submission received:
    
    Name: {$data['name']}
    Email: {$data['email']}
    Phone: {$data['phone']}
    Subject: {$data['subject']}
    
    Message:
    {$data['message']}
    
    ---
    Submitted: " . date('Y-m-d H:i:s') . "
    IP Address: " . $_SERVER['REMOTE_ADDR'] . "
    User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "
    ";
    
    $headers = [
        'From: noreply@' . $_SERVER['HTTP_HOST'],
        'Reply-To: ' . $data['email'],
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8'
    ];
    
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

try {
    // Rate limiting
    if (!checkRateLimit($config)) {
        throw new Exception('Too many submissions. Please wait before submitting again.');
    }
    
    // Collect and sanitize form data
    $data = [
        'name' => sanitizeInput($_POST['name'] ?? ''),
        'email' => sanitizeInput($_POST['email'] ?? ''),
        'phone' => sanitizeInput($_POST['phone'] ?? ''),
        'subject' => sanitizeInput($_POST['subject'] ?? ''),
        'message' => sanitizeInput($_POST['message'] ?? '')
    ];
    
    // Validation
    $errors = [];
    
    // Name validation
    if (empty($data['name'])) {
        $errors[] = 'Name is required';
    } elseif (strlen($data['name']) < 2) {
        $errors[] = 'Name must be at least 2 characters long';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $data['name'])) {
        $errors[] = 'Name can only contain letters and spaces';
    }
    
    // Email validation
    if (empty($data['email'])) {
        $errors[] = 'Email is required';
    } elseif (!validateEmail($data['email'])) {
        $errors[] = 'Please enter a valid email address';
    }
    
    // Phone validation (optional)
    if (!empty($data['phone']) && !validatePhone($data['phone'])) {
        $errors[] = 'Please enter a valid phone number';
    }
    
    // Subject validation
    if (empty($data['subject'])) {
        $errors[] = 'Subject is required';
    } elseif (strlen($data['subject']) < 5) {
        $errors[] = 'Subject must be at least 5 characters long';
    }
    
    // Message validation
    if (empty($data['message'])) {
        $errors[] = 'Message is required';
    } elseif (strlen($data['message']) < 10) {
        $errors[] = 'Message must be at least 10 characters long';
    }
    
    // Check for errors
    if (!empty($errors)) {
        throw new Exception(implode(', ', $errors));
    }
    
    // Honeypot check (add a hidden field to your form if needed)
    if (!empty($_POST['website'])) {
        throw new Exception('Spam detected');
    }
    
    // Send email
    if (sendEmail($data, $config)) {
        // Log successful submission (optional)
        error_log("Contact form submission from: {$data['email']} - {$data['subject']}");
        
        echo json_encode([
            'success' => true,
            'message' => 'Thank you for your message! We will get back to you within 24 hours.'
        ]);
    } else {
        throw new Exception('Failed to send email. Please try again later.');
    }
    
} catch (Exception $e) {
    // Log error
    error_log("Contact form error: " . $e->getMessage());
    
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
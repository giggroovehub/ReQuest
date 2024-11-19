<?php
// Include database configuration
include 'config.php';

// Set the response header to return JSON
header('Content-Type: application/json');

// Initialize response
$response = ['success' => false, 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validate input
    if (empty($email) || empty($password)) {
        $response['message'] = 'Both email and password are required.';
        echo json_encode($response);
        exit;
    }

    try {
        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $response['success'] = true;
                $response['message'] = 'Login successful.';

                // (Optional) Start a session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
            } else {
                $response['message'] = 'Invalid password.';
            }
        } else {
            $response['message'] = 'No user found with this email.';
        }
    } catch (PDOException $e) {
        $response['message'] = 'An error occurred while processing your request.';
    }
}

// Return the response as JSON
echo json_encode($response);
?>

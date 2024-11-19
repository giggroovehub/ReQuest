<?php
// Include the database configuration file
require_once 'config.php';

// Start a session to manage login state
session_start();

// Check if form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate the data
    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Both fields are required.']);
        exit;
    }

    // Check if the email exists in the database
    try {
        $stmt = $pdo->prepare("SELECT id, password FROM budget_users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            exit;
        }

        // Verify the password
        if (!password_verify($password, $user['password'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            exit;
        }

        // Set session variables to track the logged-in user
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $email;

        // Return a success response
        echo json_encode(['success' => true, 'message' => 'Login successful.']);

    } catch (PDOException $e) {
        // Return an error response if something goes wrong
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>

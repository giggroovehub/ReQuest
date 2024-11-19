<?php
// Include the database connection configuration
require_once 'config.php'; // Make sure the path is correct for your project

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and password from the POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email and password
    if (empty($email) || empty($password)) {
        echo json_encode([
            'success' => false,
            'message' => 'Please enter both email and password.',
        ]);
        exit;
    }

    // Prepare the query to check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM end_users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password with the hash stored in the database
        if (password_verify($password, $user['password'])) {
            // Start a session and store user data (you may want to use session variables)
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];

            // Check if "remember me" was checked, and set a cookie if needed
            if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
                // Set a long-lasting cookie (you may want to adjust the cookie duration)
                setcookie('remember_me', $user['id'], time() + (86400 * 30), '/'); // 30 days
            }

            // Respond with success and redirect URL
            echo json_encode([
                'success' => true,
                'redirect' => '/request/end-user/dashboard.php', // Redirect to the dashboard or wherever after login
            ]);
        } else {
            // Invalid password
            echo json_encode([
                'success' => false,
                'message' => 'Incorrect password. Please try again.',
            ]);
        }
    } else {
        // User not found
        echo json_encode([
            'success' => false,
            'message' => 'No account found with that email.',
        ]);
    }
} else {
    // Invalid request method
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request.',
    ]);
}
?>

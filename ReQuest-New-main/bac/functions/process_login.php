<?php
// Include the database connection
include('config.php');

// Initialize response array
$response = [];

// Check if the form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve the form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember']) ? 1 : 0;

    // Validate form data
    if (empty($email) || empty($password)) {
        $response['success'] = false;
        $response['message'] = 'Please fill in all the required fields.';
        echo json_encode($response);
        exit();
    }

    // Check if the email exists in the database
    try {
        $stmt = $pdo->prepare("SELECT id, password FROM bac_users WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If no user is found with the given email
        if (!$user) {
            $response['success'] = false;
            $response['message'] = 'Email not found.';
            echo json_encode($response);
            exit();
        }

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Correct password, start session and set cookies if "Remember me" is checked
            session_start();
            $_SESSION['user_id'] = $user['id'];

            if ($remember_me) {
                // Set cookie for "Remember me" functionality (optional duration for cookie)
                setcookie('user_id', $user['id'], time() + (86400 * 30), "/"); // 30 days
            }

            $response['success'] = true;
            $response['message'] = 'Login successful. Redirecting...';
            echo json_encode($response);
        } else {
            // Incorrect password
            $response['success'] = false;
            $response['message'] = 'Invalid password.';
            echo json_encode($response);
            exit();
        }
    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = 'Error logging in: ' . $e->getMessage();
        echo json_encode($response);
        exit();
    }
}
?>

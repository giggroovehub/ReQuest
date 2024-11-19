<?php
// Include the database connection
include('config.php');

// Check if the form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the form data
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];

    // Initialize response array
    $response = [];

    // Validate form data
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $response['success'] = false;
        $response['message'] = 'Please fill in all the required fields.';
        echo json_encode($response);
        exit();
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $response['success'] = false;
        $response['message'] = 'Passwords do not match.';
        echo json_encode($response);
        exit();
    }

    // Check if email already exists in the database
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM bac_users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $email_exists = $stmt->fetchColumn();

        if ($email_exists) {
            $response['success'] = false;
            $response['message'] = 'Email already exists. Please use another one.';
            echo json_encode($response);
            exit();
        }
    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = 'Error checking email: ' . $e->getMessage();
        echo json_encode($response);
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO bac_users (first_name, last_name, email, password, remember_me) VALUES (:first_name, :last_name, :email, :password, :remember_me)");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $remember_me = isset($_POST['remember']) ? 1 : 0; // Check if "Remember me" was checked
        $stmt->bindParam(':remember_me', $remember_me, PDO::PARAM_BOOL);

        // Execute the statement
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Registration successful! You can now log in.';
        } else {
            $response['success'] = false;
            $response['message'] = 'There was an error with the registration. Please try again.';
        }
    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = 'Error registering user: ' . $e->getMessage();
    }

    // Return the response as JSON
    echo json_encode($response);
    exit();
}

?>

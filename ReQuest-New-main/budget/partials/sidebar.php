
<?php 
// Include session and database connection
include 'functions/session.php';
include 'functions/config.php';  // Include the database connection file

// Fetch the user's first name based on the session
$userId = $_SESSION['user_id'];  // Assuming user_id is stored in session after login

// Query to get the user's first name from the database
$query = "SELECT first_name FROM end_users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$firstName = $user ? $user['first_name'] : 'Guest';  // Set 'Guest' if no user is found
?>

<style>
    /* Position icons and user info at the top-right corner */
.top-right-icons {
      position: fixed;
      top: 10px;
      right: 80px;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
    }

    /* Container for icon buttons */
    .top-right-icons a {
      font-size: 24px;
      color: #333;
      text-decoration: none; /* Remove underline from links */
    }

    /* Hover effect for icons */
    .top-right-icons a:hover {
      color: #007bff;
    }

    .top-right-icons h2 {
      
      color: black;
      text-decoration: none; /* Remove underline from links */
    }


    /* User info section */
    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* User name styling */
    .user-info h2 {
      font-size: 18px;
      margin: 0;
      color: black !important; 
    }

    /* Profile image styling */
    .user-info img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid black; /* Optional border around the profile image */
    }
        
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Top-right icons section -->
<div class="top-right-icons">
  <a href="./Notification.php"><i class="bi bi-bell-fill"></i></a>
  <a href="./settings.php"><i class="bi bi-person-circle"></i></a>
  <div class="user-info">
    <!-- Display the user's first name -->
    <h2>Hello! <strong> <?php echo htmlspecialchars($firstName); ?> </strong></h2>
    <img src="path_to_user_profile_image.jpg" alt="Profile Image"> <!-- Replace with actual profile image path -->
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'functions/session.php'; ?>

<!-- Sidebar -->
<aside class="w-64 bg-indigo-700 text-white flex flex-col p-6 hidden md:block md:w-1/4 lg:w-1/5 xl:w-1/6">
    <h2 class="text-2xl font-bold mb-6 text-center">Dashboard</h2>
    <nav class="space-y-4">
        <a href="dashboard.php" class="block py-2 px-3 rounded hover:bg-indigo-600">Dashboard</a>
        
        <!-- Procurement Process with Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <!-- Make this an anchor tag for proper navigation -->
            <a href="./procurement.php" @click="open = !open" class="w-full flex justify-between items-center py-2 px-3 rounded hover:bg-indigo-600">
                Procurement Process
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div x-show="open" class="mt-2 pl-6 space-y-2">
                <a href="./app.php" class="block py-2 px-3 rounded hover:bg-indigo-600">APP</a>
                <a href="./ppmp.php" class="block py-2 px-3 rounded hover:bg-indigo-600">PPMP</a>
                <a href="./pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">PR</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">PMAF</a>
                <a href="./rfq.php" class="block py-2 px-3 rounded hover:bg-indigo-600">RFQ</a>
                <a href="./aoq.php" class="block py-2 px-3 rounded hover:bg-indigo-600">AOQ</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">RESO</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">NOA</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">NTP</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">PO</a>
                <a href="pr.php" class="block py-2 px-3 rounded hover:bg-indigo-600">PMR</a>
            </div>
        </div>
        <a id="logoutBtn" class="block py-2 px-3 rounded hover:bg-indigo-600">Log Out</a>
    </nav>
</aside>

<script>
// Handle logout button click
document.getElementById('logoutBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure you want to log out?',
        text: "You won't be able to recover your session after this.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, log out!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to logout script to destroy the session
            window.location.href = 'functions/logout.php';
        }
    });
});
</script>

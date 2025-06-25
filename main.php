<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];
$userDataFile = 'applications/' . $username . '.json';  // Store each user's application data separately

// Check if the user has already submitted an application
$applicationStatus = file_exists($userDataFile) ? 'Submitted' : 'Unsubmitted';

// Load user data if exists
$userData = file_exists($userDataFile) ? json_decode(file_get_contents($userDataFile), true) : null;
?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  *{
    text-decoration: none !important;
  }
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .status-section {
      margin-bottom: 20px;
    }
    .btn-custom {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      font-size: 16px;
    }
    .note {
      font-size: 14px;
      color: #6c757d;
    }
  </style>

    <div class="container">
    <!-- Application Status -->
    <div class="status-section">
      <h2>Application Status: <?= $applicationStatus ?></h2>
    </div>

    <!-- Edit Personal Details Button -->
    <button id="editDetailsBtn" class="btn btn-primary btn-custom">
    <a class="text-white" href="application_form.php"> <?= $userData ? 
    'Edit Personal Information' : 'Enter Personal Information' ?> </a></button>

    <!-- Download Application Form Button -->
    <?php if ($applicationStatus === 'Submitted'): ?>
    <button id="downloadFormBtn" class="btn btn-secondary btn-custom"><a href="download.php">Download Application</a></button>
    <p class="note">The application form can only be downloaded after the submission of all applications. If the account contains unsubmitted applications, the applicant will not be able to download the application form.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="apply.js"></script>
<?php endif; ?>

<?php
// Database configuration (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rx_axis";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve email and password from the form
  $email = $_POST["email"];
  $pwd = $_POST["password"];
  // Prepare the SQL statement and select and check in the database
  $stmt = "SELECT * FROM Patients WHERE email = '$email' AND password = '$pwd'";

  $result = mysqli_query($conn,$stmt) or die(mysqli_error());
  $num_row = mysqli_num_rows($result);
    // Verify the provided password with the hashed password from the database
    if ($num_row==1) {
      // If password is correct, redirect to index.html
      header("Location: rx.pdf");
      exit();
    } else {
      // If password is incorrect, alert the user and return to the login page
      echo "<script>alert('Invalid email or password. Please try again.');";
      header("Location: 'login.html'");
      exit();
    }
  } else {
    // If no record found, alert the user and return to the login page
    echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'login.html';</script>";
  }

  // Close the statement (already done in most cases by fetch_assoc)
  $stmt->close();


// Close the database connection
$conn->close();
?>

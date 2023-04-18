<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db1') or die("connection failed: " . mysqli_connect_error());

    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    $phone_otp = $_POST['phone_otp'];
    $email_otp = $_POST['email_otp'];

    // Verify captcha
    session_start();
    if ($captcha != $_SESSION['captcha']) {
        echo "Invalid captcha. Please try again.";
        exit();
    }

    // Verify OTP
    session_start();
    if ($phone_otp != $_SESSION['phone_otp']) {
        echo "Invalid phone OTP. Please try again.";
        exit();
    }
    // Check if email or phone number already exists in the database
    $sql = "SELECT * FROM `User` WHERE `email`='$email' OR `phone_no`='$phone_no'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        // Email or phone number already exists, show error message
      
        $message = "This email or phone number is already registered.";
       
        echo "<script type='text/javascript'>alert('$message');window.location.href='login.php';</script>";
       
       exit();
        
    } 
    else {
        // Email and phone number are unique, insert new record
        $sql = "INSERT INTO `User` (`name`, `phone_no`, `email`, `password`) VALUES ('$name', '$phone_no', '$email', '$password')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
         $message = "Your Registration is successfully completed ! Login Now.";
        echo "<script type='text/javascript'>alert('$message');window.location.href='dashboard.php';</script>";
       
        exit();
        
      
        } else {
            // An error occurred while inserting the new user into the database
            $error = "Error occurred: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Login">
        <input type="submit" name="submit" value="Forgot Password">
    </form>
</body>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('http://socialnetwork.great-site.net', 'epiz_33947063', 'YyziygyQtS', 'epiz_33947063_wordpress') or die("connection failed: " . mysqli_connect_error());

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";

        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) == 1) {
            // Login successful, save user data to session
            $user = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to dashboard or other protected page
            header("Location: dashboard.php");
            exit();
        } else {
            // Login failed, show error message
           
            $message="Invalid Id or Password / Forgot Password";
            echo "<script type='text/javascript'>alert('$message'); window.location.href='login.php';</script>";

            exit(); 
        }
    }
}
?>

</html>

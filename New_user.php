<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet"href="style.css">
</head>
<body>
    <h1>Register Form</h1>
    <form action="connect.php" method="POST">
        <div>
            <h2>User</h2>
        </div>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="phone_no">Phone Number</label><br>
        <input type="text" name="phone_no" id="phone_no" required><br><br>

        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" required><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="button" id="sendSmsBtn">Send OTP via SMS</button>

        <label for="otp">Enter OTP</label><br>
        <input type="text" name="otp" id="otp" required><br><br>

        <input type="submit" name="submit" id="submit">
    </form>

</centre>
    </body>
</html>




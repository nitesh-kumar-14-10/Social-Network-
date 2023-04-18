<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 500px;
            padding: 50px;
            background-color: #292929;
            border-radius: 5px;
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
        }

        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            background-color: #10a37f;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 5px; /* Added margin top */
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0c7e5d;
        }

        #sendSmsBtn {
            background-color: #292929;
            margin-top: 10px; /* Added margin top */
        }

        #sendSmsBtn:hover {
            background-color: #1a1a1a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register Form</h1>
        <form action="connect.php" method="POST">
           
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" required><br><br>

            <label for="phone_no">Phone Number</label><br>
            <input type="text" name="phone_no" id="phone_no" required><br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br><br>

            
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
</body>
<?php
    // Check if the user was just created successfully
    if(isset($_GET['success']) && $_GET['success'] == true) {
        // Redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>
</html>

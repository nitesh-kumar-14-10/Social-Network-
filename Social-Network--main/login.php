<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db1') or die("connection failed: " . mysqli_connect_error());

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
        
            // Check if user has a dashboard page
            $dashboard_file = "dashboard_" . $user['email'] . "_" . $user['id'] . ".php";
            if (!file_exists($dashboard_file)) {

                $dashboard_content = "
<html>
    <head>
        <title>Dashboard</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #fafafa;
                margin: 0;
            }
            .header {
                background-color: #fff;
                height: 60px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 20px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
            .logo {
                font-size: 32px;
                font-weight: bold;
                color: #3897f0;
            }
            .menu {
                display: flex;
                align-items: center;
            }
            .menu-item {
                margin-left: 20px;
            }
            .menu-link {
                color: #999;
                text-decoration: none;
                font-size: 14px;
                font-weight: bold;
            }
            .menu-link:hover {
                color: #000;
            }
            .content {
                padding: 20px;
                margin-top: 20px;
                background-color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                border-radius: 3px;
            }
            .heading {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            .text {
                font-size: 16px;
                margin-bottom: 10px;
            }
            .button {
                display: inline-block;
                background-color: #3897f0;
                color: #fff;
                text-align: center;
                padding: 10px 20px;
                border-radius: 3px;
                text-decoration: none;
                transition: background-color 0.2s;
            }
            .button:hover {
                background-color: #3173ba;
            }
        </style>
    </head>
    <body>
        <div class='header'>
            <div class='logo'>Social-Network</div>
            <div class='menu'>
                <div class='menu-item'><a class='menu-link' href='#'>Home</a></div>
                <div class='menu-item'><a class='menu-link' href='#'>Profile</a></div>
                <div class='menu-item'><a class='menu-link' href='#'>Settings</a></div>
                <div class='menu-item'><a class='menu-link' href='#'>Logout</a></div>
            </div>
        </div>
        <footer>
        <div class='content'>
            <div class='heading'>Welcome to your dashboard, $user[name]!</div>
            <div class='text'>Social networks are online platforms that allow people to connect, share information, and communicate with each other. These networks allow users to create profiles, share photos and videos, send messages, and join groups or communities with shared interests.

            Social networks have become an essential part of people's lives, with millions of users spending significant amounts of time on these platforms every day. Some of the most popular social networks include Facebook, Twitter, Instagram, LinkedIn, Snapchat, and TikTok, among others.
            
            Social networks offer a range of benefits to users, including the ability to connect with friends and family, meet new people, share knowledge and expertise, and access news and information. However, social networks also come with some risks, including privacy concerns, cyberbullying, and the spread of misinformation.
            
            Overall, social networks have transformed the way people interact with each other, and they continue to evolve and shape our online experiences.</div>
            <a class='button' href='#'>Create Post</a>
        </div>
        </footer>
    </body>
</html>";
file_put_contents($dashboard_file, $dashboard_content);
               
            }

            // Redirect to dashboard page
            header("Location: $dashboard_file");
            exit();
        } else {
            // Login failed, show error message
            $message="Invalid Id or Password / Forgot Password";
            echo "<script type='text/javascript'>alert('$message'); window.location.href='index.html';</script>";

            exit(); 
        }
    }
}
?>


<!DOCTYPE html>
<html>
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
            width: 300px;
            padding: 20px;
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

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #10a37f;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0c7e5d;
        }

        input[type="submit"]:last-child {
            background-color: #292929;
            color: #a0a0a0;
        }

        input[type="submit"]:last-child:hover {
            background-color: #1a1a1a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login Page</h1>
        <form method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="submit" value="Login">
            <input type="submit" name="submit" value="Forgot Password">
        </form>
    </div>
</body>
</html>

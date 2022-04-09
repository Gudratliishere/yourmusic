<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Music | Account</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <?php include 'private/header.php';
    $code = $_GET['code'];
    session_start();
    if ($_SESSION['id'])
        header('Location: profile.php');
    ?>

    <div class="container account-container">
        <div class="blur">

            <div class="form-container" id="FormContainer">
                <div class="form-btn">
                    <span id="Login">Login</span>
                    <span id="Register">Register</span>
                    <hr id="Indicator">
                </div>

                <form id="LoginForm" method="post" action="private/do_login.php">
                    <input type="email" placeholder="E-mail" required name="email">
                    <input type="password" placeholder="Password" id="LPassword" required name="password">

                    <div class="show-pass">
                        <input type="checkbox" id="LShowPass">
                        <label for="LShowPass" id="ShowPassText">Show</label>
                    </div>

                    <label id="LMessage" style="display:<?php echo ($code) ? 'block' : 'none';?>;
                            color: <?php echo ($code == 5 || $code == 6) ? 'green' : 'red'; ?>">
                        <?php 
                            switch ($code)
                            {
                                case 1: 
                                    echo 'Something is wrong, please try again or contact us!'; 
                                    break;
                                case 2: 
                                    echo 'User not found, maybe you have to register?'; 
                                    break;
                                case 3: 
                                    echo 'Password is wrong, try again!'; 
                                    break;
                                case 4: 
                                    echo 'Your account is blocked :(<br>If you think it is mistake, contact us!'; 
                                    break;
                                case 5:
                                    echo 'Password successfully changed!';
                                    break;
                                case 6:
                                    echo 'Successfully registered! Now you can log in!';
                                    break;
                            }
                        ?>
                    </label>
                    <button type="submit" class="btn">Login</button>
                    <a href="email_verification.php">Forget password?</a>
                </form>

                <form id="RegisterForm" onsubmit="return verifyPassword()">
                    <input type="text" placeholder="Name" required>
                    <input type="text" placeholder="Surname" required>
                    <input type="email" placeholder="E-mail" required>
                    <input type="text" placeholder="Phone number" required>
                    <input type="password" placeholder="Password" id="RPassword" required>
                    <input type="password" placeholder="Confirm Password" id="RCPassword" required>

                    <div class="show-pass">
                        <input type="checkbox" id="RShowPass">
                        <label for="RShowPass" id="ShowPassText">Show</label>
                    </div>

                    <label id="ErrorMessage">Password doesn't match!</label>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script src="js/account.js"></script>
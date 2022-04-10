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
    $code_login = $_GET['code_login'];
    $code_register = $_GET['code_register'];
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

                    <label id="LMessage" style="display:<?php echo ($code_login) ? 'block' : 'none';?>;
                            color: <?php echo ($code_login >= 5 && $code_login <= 7) ? 'green' : 'red'; ?>">
                        <?php 
                            switch ($code_login)
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
                                case 7:
                                    echo 'Successfully deleted account!';
                                    break;
                                case 8:
                                    echo 'You have deleted this account. If you want to activate again, contact us!';
                                    break;
                            }
                        ?>
                    </label>
                    <button type="submit" class="btn">Login</button>
                    <a href="email_verification.php">Forget password?</a>
                </form>

                <form id="RegisterForm" action="private/do_register.php" method="post" onsubmit="return verifyPassword()">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="surname" placeholder="Surname" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="password" placeholder="Password" id="RPassword" required>
                    <input type="password" placeholder="Confirm Password" id="RCPassword" required>

                    <div class="show-pass">
                        <input type="checkbox" id="RShowPass">
                        <label for="RShowPass" id="ShowPassText">Show</label>
                    </div>

                    <label id="ErrorMessage" style="display: <?php echo $code_register ? 'block' : 'none';?>">
                        <?php
                        switch ($code_register) {
                            case 1: echo 'Already account exists with this email!'; break;
                        }
                        ?>
                    </label>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script src="js/account.js"></script>
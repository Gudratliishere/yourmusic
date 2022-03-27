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
    <?php include 'header.php'; ?>
    <div class="container account-container">
        <div class="blur">

            <div class="form-container" id="FormContainer">
                <div class="form-btn">
                    <span id="Login">Login</span>
                    <span id="Register">Register</span>
                    <hr id="Indicator">
                </div>

                <form id="LoginForm">
                    <input type="email" placeholder="E-mail" required>
                    <input type="password" placeholder="Password" id="LPassword" required>

                    <div class="show-pass">
                        <input type="checkbox" id="LShowPass">
                        <label for="LShowPass" id="ShowPassText">Show</label>
                    </div>

                    <label id="LMessage">Message will be shown here!</label>
                    <button type="submit" class="btn">Login</button>
                    <a href="#">Forget password?</a>
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
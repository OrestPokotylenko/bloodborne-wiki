<div class="login-background">
    <div id="loginForm" class="container position-absolute border rounded bg-dark top-50 start-50 translate-middle form-container w-auto">
        <form class="d-flex flex-column justify-content-between align-items-center login" method="post" action="../../includes/login.php">
            <div class="form-group w-75">
                <input type="text" id="username" name="username" placeholder="Enter username or email">
            </div>
            <div class="form-group w-75">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="text-container w-50">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button" id="showForgotPasswordButton1">Forgot Password?</button>
                <button type="button" id="showSignUpButton1">Create New Account</button>
            </div>
        </form>
        <div id="gSignIn" class="mt-4 w-100 d-flex justify-content-center"></div>
    </div>
    <div id="signUpForm" class="container position-absolute mt-5 mx-auto border rounded bg-dark top-50 start-50 translate-middle form-container w-auto d-none">
        <form class="d-flex flex-column justify-content-between align-items-center h-100" method="post" action="../../includes/signup.php">
            <div class="form-group w-75">
                <input type="email" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group w-75">
                <input type="text" id="newUsername" name="username" placeholder="Enter username">
            </div>
            <div class="form-group w-75">
                <input type="password" id="newPassword" name="password" placeholder="Password">
            </div>
            <div class="form-group w-75">
                <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Repeat password">
            </div>
            <div class="text-container w-50">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button" id="showForgotPasswordButton2">Forgot Password?</button>
                <button type="button" id="showLoginButton1">Login</button>
            </div>
        </form>
    </div>

    <div id="forgotPasswordForm" class="container position-absolute border rounded bg-dark top-50 start-50 translate-middle p-5 shadow-lg w-auto d-none">
        <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="../../includes/forgot-password.php">
            <div class="form-group w-75 my-3">
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="text-container d-flex flex-column align-items-center w-100 my-3">
                <button type="submit" name="submit" class="w-50">Reset Password</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button" id="showSignUpButton2">Create New Account</button>
                <button type="button" id="showLoginButton2">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="https://accounts.google.com/gsi/client" async defer></script>
<script src="../../assets/js/login.js"></script>
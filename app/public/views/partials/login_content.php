<script src="../../assets/js/login.js"></script>

<div class="login-background">
    <div id="loginForm" class="container position-absolute  border rounded bg-dark top-50 start-50 translate-middle form-container w-auto">
        <form class="d-flex flex-column justify-content-between align-items-center login" method="post" action="../../includes/login.php">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group w-75">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="text-container w-50">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button">Forgot Password?</button>
                <button type="button" id="signUpButton">Create New Account</button>
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
                <input type="text" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group w-75">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group w-75">
                <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Repeat password">
            </div>
            <div class="text-container w-50">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button">Forgot Password?</button>
                <button type="button" id="loginButton">Login</button>
            </div>
        </form>
    </div>
</div>
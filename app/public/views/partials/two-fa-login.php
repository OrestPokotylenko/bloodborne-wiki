<div class="login-background">
    <div id="2faForm" class="container position-absolute border rounded bg-dark top-50 start-50 translate-middle w-auto">
        <form class="d-flex flex-column justify-content-center align-items-between" method="post" action="../../includes/2fa.php">
            <div class="form-group w-75 my-5">
                <input type="text" id="code" name="code" placeholder="Enter 2FA Code" required>
            </div>
            <div class="text-container d-flex flex-column align-items-center w-100 my-5">
                <button type="submit" name="submit">Verify</button>
            </div>
        </form>
    </div>
</div>
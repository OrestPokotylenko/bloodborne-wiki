<main class="flex-fill">
    <h1>Main page</h1>

    <?php
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
        $user = $_SESSION['user'];
        echo "Logged in as: " . $user->username;
    }
    ?>

</main>
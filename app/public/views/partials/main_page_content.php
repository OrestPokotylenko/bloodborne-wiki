<?php
?>
<main class="flex-fill">
    <h1>Main page</h1>

    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "Logged in as: " . $username;
    }
    ?>

    <a href="../../includes/logout.php">Logout</a>

</main>
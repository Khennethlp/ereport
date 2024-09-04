<?php
session_start();

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or homepage
    header("Location: index.php");
    exit();
}
?>
<li class="nav-item">
    <form action="" method="post">
        <button type="submit" name="logout" class="nav-link b-border" style="background: none; border: none; padding: 0; margin: 0;">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p class="text">Sign out</p>
        </button>
    </form>
</li>



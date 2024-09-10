<?php
// session_start();

if (isset($_POST['logout'])) {
    session_unset();
    // Destroy the session
    session_destroy();

    // Redirect to the login page or homepage
    header("Location: /e-report/pages/superAdmin/index.php");
    exit();
}
?>
<li class="nav-item">
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <button type="submit" name="logout" class="nav-link b-border" style="background: none; border: none; padding: 0; margin: 0;">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p class="text">Sign out</p>
        </button>
    </form>
</li>



<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated'] === true) {
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {

        header('Location: ./user-list.php');
    } else {

        header('Location: ./index.php');
    }
    echo $_SESSION['role'];
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venly | Venue Booking System</title>
    <link rel="stylesheet" href="dist/css/vendor.css">
    <link rel="stylesheet" href="dist/css/themes.css">
</head>

<body>
    <div class="login-box">
        <div class="login-form border-primary-500 p-3 bg-primary-100">
            <h2 class="text-20 fw-bold color-primary-800 mb-3">Register</h2>

            <form autocomplete="off" action="backend/user/add-user.php" method="post">
                <label class="text-14 color-primary-700" for="username">Username:</label>
                <input class="bg-transparent border-primary-600 mb-1" type="text" minlength="3" id="username"
                    name="username" required>
                <div class="username-error error-text mb-3"></div>

                <label class="text-14 color-primary-700" for="email">Email:</label>
                <input class="bg-transparent border-primary-600 mb-1" type="email" id="email" name="email" required>
                <div class="email-error error-text mb-3"></div>

                <label class="text-14 color-primary-700" for="phone">Phone:</label>
                <input class="bg-transparent border-primary-600 mb-1" maxlength="10" pattern="\d{10}" type="text"
                    id="phone" name="phone" required>
                <div class="phone-error error-text mb-3"></div>

                <label class="text-14 color-primary-700" for="password">Password:</label>
                <input class="bg-transparent border-primary-600 mb-1" type="password" id="password" name="password"
                    required>
                <div class="password-error error-text mb-3"></div>


                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="error-text">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']);
                }
                ?>

                <input type="submit" class="fw-bold text-16 submit-btn bg-primary-600 color-primary-800 mb-3"
                    value="Register">
            </form>
            <p class="text-14 color-primary-700">Already have an account? <a href="login.php"
                    class="text-decoration-underline color-primary-800">Login</a></p>
            <a href="index.php" class="text-14 text-center d-block text-decoration-underline color-primary-800">HOME</a>
        </div>
    </div>
    <script>
        document.getElementById('phone').addEventListener('input', function() {
    // Remove any non-digit characters
    this.value = this.value.replace(/\D/g, '');

    // If the length exceeds 10, truncate it
    if (this.value.length > 10) {
        this.value = this.value.substring(0, 10);
    }
});
    </script>
</body>

</html>
<?php include 'inc/admin-header.php' ?>

<?php
include("backend/db.php");
// Get the ID from the URL
$id = $_GET['id'];

// Query the venue table to retrieve the venue details
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the venue details
    $row = $result->fetch_assoc();
}
?>
<div class="main px-3 w-100">
    <div class="header d-flex justify-content-between mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">Edit <?php echo $row['username']; ?></h2>

        <!-- <button class="primary-btn">Add Venue</button> -->
    </div>

    <form action="backend/user/update-user.php" method="post">
        <div class="row row-gap-3 mb-3">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Username</label>
                            <input type="text" class="w-100" required name="username"
                                value="<?php echo $row['username']; ?>">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Email</label>
                            <input type="text" class="w-100" required name="email" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Phone</label>
                            <input type="number" class="w-100" required name="phone"
                                value="<?php echo $row['phone']; ?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['edit_error'])) {
            echo '<div class="error-text">' . $_SESSION['edit_error'] . '</div>';
            unset($_SESSION['edit_error']);
        }
        ?>
        <button type="submit" class="primary-btn d-inline-flex justify-content-center align-items-center">Update
            user</button>
    </form>
</div>
</div>
</body>

</html>
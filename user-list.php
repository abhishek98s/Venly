<?php include 'inc/admin-header.php' ?>

<div class="main px-3 w-100">
    <div class="header d-flex justify-content-between mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">User List</h2>

        <!-- <button class="primary-btn">Add Venue</button> -->
    </div>

    <div class="row row-gap-3">
        <?php
        include("backend/db.php");
        $sql = "SELECT id, username FROM users 
        EXCEPT 
        SELECT id, username FROM users WHERE role = 'admin'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="edit-user.php?id=<?php echo $row['id']; ?>">
                        <div class="user-box d-flex gap-2 align-items-center position-relative border-primary-500 p-3">
                            <button
                                class="delete-btn position-absolute top-0 end-0 delete-btn me-2 mt-1 bg-transparent border-0"
                                data-id="<?php echo $row['id']; ?>">
                                <figure class="icon-info p-1">
                                    <img src="images/icons/icon-delete.svg" alt="icon-delete">
                                </figure>
                            </button>
                            <figure>
                                <img src="images/icons/icon-user.svg" alt="icon-user">
                            </figure>
                            <div class="name color-primary-700"><?php echo $row['username']; ?></div>
                        </div>
                    </a>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>
</div>

<script>
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const venueId = button.getAttribute('data-id');

            fetch(`backend/user/delete-user.php?id=${venueId}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('User deleted successfully');
                    } else {
                        console.log('Error deleting user');
                    }
                    location.reload()
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
<?php include 'inc/admin-footer.php' ?>
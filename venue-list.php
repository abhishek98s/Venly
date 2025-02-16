<?php include 'inc/admin-header.php' ?>

<div class="main px-3 w-100">
    <div class="header d-flex justify-content-between mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">Venue List</h2>

        <a href='./add-venue.php' class="primary-btn d-inline-flex justify-content-center align-items-center">Add
            Venue</a>
    </div>

    <div class="row row-gap-3">
        <?php
        include("backend/db.php");
        $sql = "SELECT id, name, location FROM venue";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="edit.php?id=<?php echo $row['id']; ?>">
                        <div class="venue-box position-relative border-primary-500 p-3">
                            <div class="title fw-bold text-18 color-primary-800"><?php echo $row['name']; ?></div>
                            <div class="location color-primary-700"><?php echo $row['location']; ?></div>

                            <a href="#" class="delete-btn position-absolute top-0 end-0 delete-btn me-2 mt-1"
                                data-id="<?php echo $row['id']; ?>">
                                <figure class="icon-info p-1">
                                    <img src="images/icons/icon-delete.svg" alt="icon-delete">
                                </figure>
                            </a>
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

            fetch(`backend/delete-venue.php?id=${venueId}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Venue deleted successfully');
                    } else {
                        console.log('Error deleting venue');
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
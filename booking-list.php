<?php include 'inc/admin-header.php' ?>

<div class="main px-3 w-100">
    <div class="header mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">Booking List</h2>
        
        <br>
        <div class="d-flex gap-2 align-items-center justify-content-between w-100">
            <div class="fs-6">Show bookings</div>

            <div class="">
                <input class="week-ago" type="number">
                <span>week ago</span>
            </div>
        </div>
    </div>

    <div class="row row-gap-3">
        <?php
        include("backend/db.php");

        $sql = "
    SELECT b.*, u.username, v.name AS venue_name
    FROM bookings b
    INNER JOIN users u ON b.user_id = u.id
    INNER JOIN venue v ON b.venue_id = v.id
";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-6">
                    <div class="user-box border-primary-500 position-relative p-3">
                        <div class="position-absolute top-0 start-0 mt-2 ms-2">
                            <?php echo date('Y-m-d', strtotime($row['booking_date'])); ?>
                        </div>
                        <div class="pt-4 mb-2 d-flex flex-column align-items-center position-relative">
                            <figure class="mb-2">
                                <img src="images/icons/icon-user.svg" alt="icon-user">
                            </figure>
                            <div class="name color-primary-700"><?php echo $row['username']; ?></div>
                        </div>
                        <p class="text-14 color-primary-700 mb-1 text-center fw-bold"><?php echo $row['venue_name']; ?></p>
                        <p class="text-14 color-primary-700 text-center"><?php echo $row['booking_message']; ?></p>

                        <a href="#" class="delete-btn position-absolute top-0 end-0 delete-btn me-2 mt-1"
                            data-id="<?php echo $row['id']; ?>">
                            <figure class="icon-info p-1">
                                <img src="images/icons/icon-delete.svg" alt="icon-delete">
                            </figure>
                        </a>
                    </div>
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
<script>
    // Get all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Add event listener to each button
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Get the venue ID from the button's data-id attribute
            const venueId = button.getAttribute('data-id');

            // Send DELETE request to delete the venue
            fetch(`backend/booking/delete-booking.php?id=${venueId}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Venue deleted successfully, update the UI
                        console.log('Venue deleted successfully');
                        // You can also reload the page or update the UI here
                    } else {
                        // Error deleting venue, display error message
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
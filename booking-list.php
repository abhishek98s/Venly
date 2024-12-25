<?php include 'inc/admin-header.php' ?>

<div class="main px-3 w-100">
    <div class="header d-flex justify-content-between mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">Booking List</h2>

        <!-- <button class="primary-btn">Add Venue</button> -->
    </div>

    <div class="row row-gap-3">
        <?php
        include("backend/db.php");
        $sql = "SELECT * FROM bookings";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Loop through the results and populate the HTML template
            while ($row = $result->fetch_assoc()) {
                $user_sql = "SELECT username FROM users WHERE id = ?";
                $stmt = $conn->prepare($user_sql);
                $stmt->bind_param("i", $row['user_id']);
                $stmt->execute();
                $user_result = $stmt->get_result();

                if ($user_result->num_rows > 0) {
                    while ($user_row = $user_result->fetch_assoc()) {


                        $venue_sql = "SELECT * FROM venue WHERE id = ?";
                        $stmt = $conn->prepare($venue_sql);
                        $stmt->bind_param("i", $row['venue_id']);
                        $stmt->execute();
                        $venue_result = $stmt->get_result();
                        $venue_row = $venue_result->fetch_assoc()
                            ?>
                        <div class="col-6">
                            <div class="user-box border-primary-500 position-relative p-3">
                                <div class="position-absolute top-0 start-0 mt-2 ms-2"><?php echo
                                    date('Y-m-d', strtotime($row['booking_date']));
                                ?></div>
                                <div class=" pt-4 mb-2 d-flex flex-column align-items-center align-items-center position-relative">
                                    <figure class="mb-2">
                                        <img src="images/icons/icon-user.svg" alt="icon-user">
                                    </figure>
                                    <div class="name color-primary-700"><?php echo $user_row['username'] ?></div>
                                </div>
                                <p class="text-14 color-primary-700 mb-1 text-center fw-bold"><?php echo $venue_row['name'] ?></p>
                                <p class="text-14 color-primary-700 text-center"><?php echo $row['booking_message'] ?></p>

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
                }
            }
        } else {
            echo "0 results";
        }
        // Close the database connection
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
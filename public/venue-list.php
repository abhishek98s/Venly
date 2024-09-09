<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venly | Venue Booking System</title>
    <link rel="stylesheet" href="dist/css/vendor.css">
    <link rel="stylesheet" href="dist/css/themes.css">
</head>

<body>
    <div class="d-flex w-100">

        <aside class="sidebar-wrapper">
            <header class="p-2 d-flex justify-content-between align-items-center">
                <figure>
                    <img src="images/logo.svg" alt="logo">
                </figure>

                <a href="#">
                    <figure>
                        <img src="images/icons/icon-menu.svg" alt="logo">
                    </figure>
                </a>
            </header>

            <div class="pt-4 w-100">
                <ul class="w-100 ps-2">
                    <li class="w-100 active px-2">
                        <a href="venue-list" class="d-block py-3 color-primary-700 text-16">Venue</a>
                    </li>
                    <li class="w-100 px-2">
                        <a href="user-list" class="d-block py-3 color-primary-700 text-16">User list</a>
                    </li>
                    <li class="w-100 px-2">
                        <a href="booking-list" class="d-block py-3 color-primary-700 text-16">Booking list</a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main px-3 w-100">
            <div class="header d-flex justify-content-between mb-5 align-items-end">
                <h2 class="text-24 fw-bold color-primary-800">Venue List</h2>

                <a href='./add-venue.php'
                    class="primary-btn d-inline-flex justify-content-center align-items-center">Add
                    Venue</a>
            </div>

            <div class="row row-gap-3">
                <?php
                include("backend/db.php");
                $sql = "SELECT id, name, location FROM venue";
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result->num_rows > 0) {
                    // Loop through the results and populate the HTML template
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

                // Close the database connection
                $conn->close();
                ?>
            </div>
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
                fetch(`backend/delete-venue.php?id=${venueId}`, {
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
</body>

</html>
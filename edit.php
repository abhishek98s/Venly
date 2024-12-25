<?php include 'inc/admin-header.php' ?>

        <?php
        include("backend/db.php");
        // Get the ID from the URL
        $id = $_GET['id'];

        // Query the venue table to retrieve the venue details
        $sql = "SELECT * FROM venue WHERE id = '$id'";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch the venue details
            $row = $result->fetch_assoc();
        }
        ?>
        <div class="main px-3 w-100">
            <div class="header d-flex justify-content-between mb-5 align-items-end">
                <h2 class="text-24 fw-bold color-primary-800">Edit <?php echo $row['name']; ?></h2>

                <!-- <button class="primary-btn">Add Venue</button> -->
            </div>

            <form action="backend/update-venue.php" method="post">
                <div class="row row-gap-3 mb-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Name</label>
                                    <input type="text" class="w-100" required name="name"
                                        value="<?php echo $row['name']; ?>">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Location</label>
                                    <input type="text" class="w-100" required name="location"
                                        value="<?php echo $row['location']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Email</label>
                                    <input type="email" class="w-100" required name="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">No of person</label>
                                    <input type="number" class="w-100" required name="no_of_person"
                                        value="<?php echo $row['no_of_person']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="text-16 mb-2">About</label>
                        <textarea type="text bg-transparent" name="about" class="w-100"
                            required><?php echo $row['about']; ?></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="text-16 mb-2">Facility</label>
                        <textarea type="text bg-transparent" name="facility" class="w-100"
                            required><?php echo $row['facility']; ?></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="text-16 mb-2">Map link</label>
                        <textarea type="text bg-transparent" name="map_link" class="w-100"
                            required><?php echo $row['map_link']; ?></textarea>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="text-16 mb-2">Pricing</label>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label class="text-16 mb-2 fw-bold color-primary-800">Food</label>
                                <input type="number" class="w-100" required name="food"
                                    value="<?php echo $row['food_price']; ?>">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="text-16 mb-2 fw-bold color-primary-800">Service</label>
                                <input type="number" class="w-100" required name="service"
                                    value="<?php echo $row['service_price']; ?>">
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
                <button type="submit" class="primary-btn d-inline-flex justify-content-center align-items-center">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
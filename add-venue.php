<?php include 'inc/admin-header.php' ?>


<div class="main px-3 w-100">
    <div class="header d-flex justify-content-between mb-5 align-items-end">
        <h2 class="text-24 fw-bold color-primary-800">Add New Venue</h2>

        <!-- <button class="primary-btn">Add Venue</button> -->
    </div>

    <form enctype="multipart/form-data" action="backend/add-venue.php" method="post">
        <div class="row row-gap-3 mb-3">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Name</label>
                            <input type="text" class="w-100" required name="name">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Location</label>
                            <input type="text" class="w-100" required name="location">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">Email</label>
                            <input type="email" class="w-100" required name="email">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="text-16 mb-2 color-primary-800">No of person</label>
                            <input type="number" class="w-100" required name="no_of_person">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label class="text-16 mb-2">About</label>
                <textarea type="text bg-transparent" name="about" class="w-100" required></textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="text-16 mb-2">Facility</label>
                <textarea type="text bg-transparent" name="facility" class="w-100" required></textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="text-16 mb-2">Map link</label>
                <textarea type="text bg-transparent" name="map_link" class="w-100" required></textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="text-16 mb-2">Pricing</label>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="text-16 mb-2 fw-bold color-primary-800">Food</label>
                        <input type="number" class="w-100" required name="food">
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="text-16 mb-2 fw-bold color-primary-800">Service</label>
                        <input type="number" class="w-100" required name="service">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="text-16 mb-2">Image</label>
                <label for="image" class="box image-wrapper d-flex justify-content-center align-items-center">
                    <input id="image" class="" name="image" required type="file">
                    <!-- <figure class="icon-info">
                                <img src="images/icons/icon-add-image.svg" alt="icon-add-image">
                            </figure> -->
                </label>
            </div>
        </div>

        <?php
        if (isset($_SESSION['insert_venue_error'])) {
            echo '<div class="error-text">' . $_SESSION['insert_venue_error'] . '</div>';
            // unset($_SESSION['insert_venue_error']);
        }
        ?>

        <button type="submit" class="primary-btn d-inline-flex justify-content-center align-items-center">Add
            Venue</button>
    </form>
</div>
</div>
</body>

</html>
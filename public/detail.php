<?php include 'inc/header.php' ?>

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
<section class="sc-venue-detail">
    <div class="booking-wrapper position-fixed start-0 end-0 top-0 bottom-0">
        <div class="booking-box bg-primary-10 border-primary-600">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h3 class="title mb-0 fw-bold text-24 color-primary-800">Book Vandy</h3>

                <button onclick="toggleModal()" class="bg-transparent border-0">
                    <figure class="flex-center info-wrapper icon-close-model">
                        <img src="images/icons/icon-close.svg" alt="icon-close">
                    </figure>
                </button>
            </div>

            <div class="info-wrapper d-flex align-items-center gap-2 mb-2">
                <figure class="icon-info">
                    <img src="images/icons/icon-location.svg" alt="icon-location">
                </figure>
                <span class="text-16 color-primary-700"><?php echo $row['location']; ?></span>
            </div>
            <div class="info-wrapper d-flex align-items-center gap-2 mb-2">
                <figure class="icon-info">
                    <img src="images/icons/icon-email.svg" alt="icon-location">
                </figure>
                <span class="text-16 color-primary-700"><?php echo $row['email']; ?></span>
            </div>
            <div class="info-wrapper d-flex align-items-center gap-2 mb-5">
                <figure class="icon-info">
                    <img src="images/icons/icon-people.svg" alt="icon-location">
                </figure>
                <span class="text-16 color-primary-700"><?php echo $row['no_of_person']; ?></span>
            </div>

            <div class="message-wrapper">
                <div class="text-14  color-primary-800 mb-2">Message</div>
                <textarea class="mesage-input border-primary-300 w-100 rounded-12 bg-transparent"
                    type="text"></textarea>
            </div>
        </div>
    </div>
    <div class="banner-wrapper d-flex justify-content-center align-items-center position-relative">
        <div class="overlay h-100 position-absolute start-0 end-0 top-0 bottom-0 z-2"></div>

        <figure class="h-100 position-absolute start-0 end-0 top-0 bottom-0 z-1">
            <img src="images/banner.png" alt="banner">
        </figure>

        <h1 class="text-56 fw-bold position-relative color-primary-10  z-3"><?php echo $row['name']; ?></h1>
    </div>


    <div class="container">
        <div class="detail-wrapper">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col">
                    <div class=" pe-5  me-4">
                        <div class="about-wrapper mb-5">
                            <h2 class="text-24 fw-bold color-primary-800 mb-3">About</h2>
                            <p class="text-16 color-primary-700"><?php echo $row['about']; ?></p>
                        </div>

                        <div class="facility-wrapper mb-5">
                            <h2 class="text-24 fw-bold color-primary-800 mb-3">Facility</h2>
                            <p class="text-16 color-primary-700">
                                <?php echo $row['facility']; ?>
                            </p>
                        </div>

                        <div class="pricing-wrapper">
                            <h2 class="text-24 fw-bold color-primary-800 mb-3">Pricing</h2>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <div class="d-flex align-items-end gap-2">
                                        <figure class="icon-info m-0">
                                            <img src="images/icons/icon-service.svg" alt="">
                                        </figure>

                                        <span class="text-16 color-primary-700">Service</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-16 color-primary-700"><?php echo $row['service_price']; ?>/day</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-end gap-2">
                                        <figure class="icon-info m-0">
                                            <img src="images/icons/icon-food.svg" alt="">
                                        </figure>

                                        <span class="text-16 color-primary-700">Food</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-16 color-primary-700"><?php echo $row['food_price']; ?>/person</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 mb-5">
                    <div class="info-wrapper d-flex align-items-center gap-2 mb-3">
                        <figure class="icon-info">
                            <img src="images/icons/icon-location.svg" alt="icon-location">
                        </figure>
                        <span class="text-16 color-primary-700"><?php echo $row['location']; ?></span>
                    </div>
                    <div class="info-wrapper d-flex align-items-center gap-2 mb-3">
                        <figure class="icon-info">
                            <img src="images/icons/icon-email.svg" alt="icon-location">
                        </figure>
                        <span class="text-16 color-primary-700"><?php echo $row['email']; ?></span>
                    </div>
                    <div class="info-wrapper d-flex align-items-center gap-2 mb-3">
                        <figure class="icon-info">
                            <img src="images/icons/icon-people.svg" alt="icon-location">
                        </figure>
                        <span class="text-16 color-primary-700"><?php echo $row['no_of_person']; ?></span>
                    </div>

                    <?php

                    if (isset($_SESSION['isAuthenticated'])) {
                        echo '<button onclick="toggleModal()" id="booking-model-btn"
                            class="primary-btn fw-bold color-primary-800 bg-primary-600 mt-3 border-0 ">Book Now</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<iframe
    src="<?php echo $row['map_link']; ?>"
    class="w-100" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php include 'inc/footer.php' ?>
<?php include 'inc/header.php' ?>

<?php
include("backend/db.php");

$sqll = "DELETE FROM bookings 
WHERE STR_TO_DATE(booking_date, '%Y-%m-%d %H:%i:%s') < NOW() + INTERVAL 0 DAY 
LIMIT 1;";
$result = $conn->query($sqll);


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

$booking_sql = "SELECT * FROM bookings WHERE venue_id = ?";
$booking_result = $conn->prepare($booking_sql);
$booking_result->bind_param("i", $id);
$booking_result->execute();
$booking_result = $booking_result->get_result();

// Check if the query was successful
if ($booking_result->num_rows > 0) {
    // Fetch the venue details
    $booking_row = $booking_result->fetch_assoc();
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

            <div class="row">
                <div class="col-6">Total price</div>
                <div class="col-6 total-price fw-bold mb-2" id="total_price"></div>
            </div>

            <form action="backend/booking/add-booking.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="venue_id" value="<?php echo $_GET['id'] ?>">

                <input type="date" id="booking_date" required name="booking_date" min="<?php echo date('Y-m-d'); ?>">

                <div class="message-wrapper">
                    <div class="text-14  color-primary-800 mb-2">Message</div>
                    <textarea name="booking_message" required
                        class="mesage-input border-primary-300 w-100 rounded-12 bg-transparent" type="text"></textarea>
                </div>
                <button type="submit" id="booking-model-btn"
                    class="w-100 py-2 fw-bold color-primary-800 bg-primary-600 mt-3 border-0 ">Book Now</button>
            </form>
        </div>
    </div>
    <div class="banner-wrapper d-flex justify-content-center align-items-center position-relative">
        <div class="overlay h-100 position-absolute start-0 end-0 top-0 bottom-0 z-2"></div>

        <figure class="h-100 position-absolute start-0 end-0 top-0 bottom-0 z-1">
            <img src="<?php echo $row['img_path']; ?>" alt="banner">
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
                                    <div class="text-16 color-primary-700">
                                        <span id="service_price">
                                            <?php echo $row['service_price']; ?>
                                        </span>
                                        /day
                                    </div>
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
                                    <div class="text-16 color-primary-700">
                                        <span id="food_price">
                                            <?php echo $row['food_price']; ?>
                                        </span>
                                        /person
                                    </div>
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
                        <span id="capacity" class="text-16 color-primary-700"><?php echo $row['no_of_person']; ?></span>
                    </div>

                    
                    <?php
                    if (isset($_SESSION['isAuthenticated']) && !isset($booking_row['venue_id'])) {
                        echo '<input placeholder="no of person" type="number" class="w-100" id="no_of_person" required
                            name="name">
                        <button onclick="toggleModal()" id="booking-model-btn"
                            class="primary-btn max-w-unset fw-bold color-primary-800 bg-primary-600 mt-3 border-0 ">Book Now</button>';
                    }
                    if (isset($_SESSION['isAuthenticated']) && isset($booking_row['venue_id']) && (isset($booking_row['user_id']) == $_SESSION['id'])) {
                        echo '<button onclick="toggleModal()" disabled id="booking-model-btn"
                        class="primary-btn max-w-unset bg-transparent fw-bold color-primary-800 w-100 bg-primary-600 mt-3 border-0 ">Booked</button>';

                        if ($booking_row['user_id'] === $_SESSION['id'] && $booking_row['venue_id' ] == $id) {

                            echo '<button
                            data-id="' . $booking_row['id'] . '" class="delete-btn d-block primary-btn bg-transparent border-error max-w-unset fw-bold color-primary-800 color-error mt-3">Cancel Order</button>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<iframe src="<?php echo $row['map_link']; ?>" class="w-100" width="600" height="450" style="border:0;"
    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<script>

    // disable the previous data from today
    const currentDate = new Date();
    const tomorrow = new Date(currentDate.getTime() + 24 * 60 * 60 * 1000);
    const minDate = tomorrow.toISOString().split('T')[0];

    document.getElementById('booking_date').min = minDate;


    // Get all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Add event listener to each button for cancel
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Get the venue ID from the button's data-id attribute
            const venueId = button.getAttribute('data-id');
            console.log(venueId)
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
<?php include 'inc/footer.php' ?>
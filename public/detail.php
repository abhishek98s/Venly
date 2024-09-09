<?php include 'inc/header.php' ?>

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
                <span class="text-16 color-primary-700">Jial, Seattle</span>
            </div>
            <div class="info-wrapper d-flex align-items-center gap-2 mb-2">
                <figure class="icon-info">
                    <img src="images/icons/icon-email.svg" alt="icon-location">
                </figure>
                <span class="text-16 color-primary-700">dianslybanquet@gmail.com</span>
            </div>
            <div class="info-wrapper d-flex align-items-center gap-2 mb-5">
                <figure class="icon-info">
                    <img src="images/icons/icon-people.svg" alt="icon-location">
                </figure>
                <span class="text-16 color-primary-700">500</span>
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

        <h1 class="text-56 fw-bold position-relative color-primary-10  z-3">The Evergreen Banqute</h1>
    </div>


    <div class="container">
        <div class="detail-wrapper">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col">
                    <div class=" pe-5  me-4">
                        <div class="about-wrapper mb-5">
                            <h2 class="text-24 fw-bold color-primary-800 mb-3">About</h2>
                            <p class="text-16 color-primary-700">The Evergreen Event Space is a versatile and modern
                                venue
                                located in the heart of the city. Featuring high ceilings, abundant natural light,
                                and a
                                minimalist aesthetic, the space can be easily transformed to suit a variety of
                                events,
                                from
                                corporate conferences to lavish weddings. The main hall can accommodate up to 300
                                guests,
                                with the option to divide the space into two smaller rooms for more intimate
                                gatherings.
                                Equipped with state-of-the-art audiovisual equipment and a catering-ready kitchen,
                                the
                                venue
                                provides everything needed to bring your event vision to life. Outdoor patios and
                                gardens
                                offer picturesque backdrops for cocktail receptions and photo opportunities. On-site
                                event
                                coordinators are available to assist with all the planning details, ensuring a
                                seamless
                                and
                                stress-free experience. Conveniently located with ample parking, the Evergreen Event
                                Space
                                is an ideal choice for those seeking a modern, flexible, and well-appointed venue.
                                Book
                                your
                                event today and let us help you create an unforgettable experience.</p>
                        </div>

                        <div class="facility-wrapper mb-5">
                            <h2 class="text-24 fw-bold color-primary-800 mb-3">Facility</h2>
                            <p class="text-16 color-primary-700">
                                The Evergreen Event Space boasts a modern and adaptable facility designed to cater
                                to a wide range of events. The main hall features high ceilings, large windows
                                allowing for ample natural light, and a sleek, minimalist decor that can be easily
                                customized to match any event's aesthetic. In addition to the main hall, the venue
                                also offers two smaller breakout rooms that can be utilized for more intimate
                                gatherings or as green rooms. The on-site catering kitchen is fully equipped,
                                allowing event organizers to work with preferred caterers or take advantage of the
                                venue's in-house culinary services. Ample parking is available, and the venue's
                                convenient location in the heart of the city makes it easily accessible for both
                                hosts and guests.
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
                                    <div class="text-16 color-primary-700">25000/day</div>
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
                                    <div class="text-16 color-primary-700">1500/person</div>
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
                        <span class="text-16 color-primary-700">Jial, Seattle</span>
                    </div>
                    <div class="info-wrapper d-flex align-items-center gap-2 mb-3">
                        <figure class="icon-info">
                            <img src="images/icons/icon-email.svg" alt="icon-location">
                        </figure>
                        <span class="text-16 color-primary-700">dianslybanquet@gmail.com</span>
                    </div>
                    <div class="info-wrapper d-flex align-items-center gap-2 mb-3">
                        <figure class="icon-info">
                            <img src="images/icons/icon-people.svg" alt="icon-location">
                        </figure>
                        <span class="text-16 color-primary-700">500</span>
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
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387194.0622236789!2d-74.30932477148002!3d40.69701929469058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z4KSo4KWN4KSv4KWCIOCkr-Cli-CksOCljeCklSDgpLbgpLngpLAsIOCkqOCljeCkr-ClgiDgpK_gpYvgpLDgpY3gpJUsIOCkuOCkguCkr-ClgeCkleCljeCkpCDgpLDgpL7gpJzgpY3gpK8g4KSF4KSu4KWH4KSw4KS_4KSV4KS-!5e0!3m2!1sne!2snp!4v1724479867335!5m2!1sne!2snp"
    class="w-100" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php include 'inc/footer.php' ?>
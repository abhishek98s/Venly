<?php include 'inc/header.php' ?>

<div class="container">
    <main class="sc-wrapper">
        <div
            class="headline-wrapper d-flex flex-column row-gap-4 flex-md-row justify-content-between align-items-center">
            <div class="left-wrapper">
                <h1 class="text-32 fw-bold color-primary-800">
                    Effortlessly book and manage your event venues.
                </h1>
                <div class="description text-16 color-primary-700">
                    Discover the perfect space for your next gathering. Streamline your venue booking process with our
                    all-in-one
                    solution.
                </div>
            </div>

            <div class="right-wrapper">
                <div class="row">
                    <div class="col-wrapper col-6 col-sm-3 col-md-6">
                        <figure>
                            <img class="crounded-12" src="./images/image-1.png" alt="images/image-1">
                        </figure>
                    </div>


                    <div class="col-wrapper col-6 col-sm-3 col-md-6">
                        <figure>
                            <img class="crounded-12" src="./images/image-2.png" alt="images/image-1">
                        </figure>
                    </div>


                    <div class="col-wrapper col-6 col-sm-3 col-md-6">
                        <figure>
                            <img class="crounded-12" src="./images/image-3.png" alt="images/image-1">
                        </figure>
                    </div>

                    <div class="col-wrapper col-6 col-sm-3 col-md-6">
                        <figure>
                            <img class="crounded-12" src="./images/image-4.png" alt="images/image-1">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="sc-birthday sc-wrapper">
        <div class="sc-title fw-bold color-primary-800 text-24">Venues for your next Occassion</div>

        <div class="birthday-place-wrapper">
            <div class="row row-gap-4">
                <?php
                include("backend/db.php");
                $sql = "SELECT id, name, location, img_path FROM venue limit 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="d-block">

                                <figure class="image-wrapper mb-2">
                                    <img class="crounded-4"
                                        src="<?php echo isset($row['img_path']) && !empty($row['img_path']) ? $row['img_path'] : 'images/image-1.png'; ?>"
                                        alt="<?php echo isset($row['img_path']) && !empty($row['img_path']) ? $row['img_path'] : '/images/image-1.png'; ?>">
                                </figure>

                                <div class="title fw-bold text-18 color-primary-800"><?php echo $row['name']; ?></div>
                                <div class="location text-16 color-primary-700"><?php echo $row['location']; ?></div>
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
    </section>
</div>
<?php include 'inc/footer.php' ?>
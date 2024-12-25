<?php include 'inc/header.php' ?>

<section class="sc-venue-list">
    <div class="container">
        <div class="sc-title fw-bold color-primary-800 text-24">All venue</div>

        <div class="row row-gap-4">

            <?php
            include("backend/db.php");
            $sql = "SELECT id, name, location, img_path FROM venue";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="detail.php?id=<?php echo $row['id']; ?>" class="d-block">
                            <figure class="image-wrapper mb-2">
                                <img class="crounded-4"
                                    src="<?php echo isset($row['img_path']) && !empty($row['img_path']) ? $row['img_path'] : 'images/image-1.png'; ?>"
                                    alt="<?php echo isset($row['img_path']) && !empty($row['img_path']) ? $row['img_path'] : '/images/image-1.png'; ?>">
                            </figure>

                            <div class="title fw-bold text-16 color-primary-800"><?php echo $row['name']; ?></div>
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

<?php include 'inc/footer.php' ?>

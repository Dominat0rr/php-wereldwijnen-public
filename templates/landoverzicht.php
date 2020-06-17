<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php if ($singleLand != null) { ?>
            <dl>
                <dt>Id:</dt>
                <dd><?php echo $singleLand->id; ?></dd>
                <dt>Naam:</dt>
                <dd><?php echo $singleLand->naam; ?></dd>
                <dt>Aantal soorten:</dt>
                <dd><?php echo $aantalSoorten; ?></dd>
            </dl>
        <?php } ?>

<?php include 'includes/footer.php'; ?>
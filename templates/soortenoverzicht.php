<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php  
            if ($soorten != null) {
            foreach($soorten as $soort): ?>
            <div class="row marketing">
                <div class="col-md-10">
                <h5><?php echo $soort->naam; ?></h5>
                <br><br>
                </div>
                <div class="col-md-2">
                    <a href="soort.php?id=<?php echo $soort->id; ?>" class="btn btn-success">Bekijk soort</a>
                </div>
            </div>
        <?php 
            endforeach; 
            }
        ?>

    <?php echo $links; ?>

<?php include 'includes/footer.php'; ?>
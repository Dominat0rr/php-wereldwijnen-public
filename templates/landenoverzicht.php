<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php  
            if ($landen != null) {
            foreach($landen as $land): ?>
            <div class="row marketing">
                <div class="col-md-10">
                <h5><?php echo $land->naam; ?></h5>
                <img src=<?php echo "./images/" . $land->id . ".png"?> alt="">
                <br><br>
                </div>
                <div class="col-md-2">
                    <a href="land.php?id=<?php echo $land->id; ?>" class="btn btn-success">Bekijk land</a>
                </div>
            </div>
        <?php 
            endforeach; 
            }
        ?>

    <?php echo $links; ?>

<?php include 'includes/footer.php'; ?>
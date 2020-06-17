<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php  
            if ($wijnen != null) {
            foreach($wijnen as $wijn): ?>
            <div class="row marketing">
                <div class="col-md-10">
                <h5><?php echo $wijn->jaar; ?></h5>
                <!-- <p><?php echo $wijn->id; ?></p> -->
                <p>Beoordeling: <?php echo $wijn->beoordeling; ?></p>
                <p>Prijs: €<?php echo $wijn->prijs; ?></p>
                <br><br>
                </div>
                <div class="col-md-2">
                    <a href="wijn.php?id=<?php echo $wijn->id; ?>" class="btn btn-success">Bekijk wijn</a>
                </div>
            </div>
        <?php 
            endforeach; 
            }
        ?>

        <?php echo $links; ?>

<?php include 'includes/footer.php'; ?>
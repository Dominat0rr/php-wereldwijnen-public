<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php if ($soort != null) { ?>
            <dl>
                <dt>Id:</dt>
                <dd><?php echo $soort->id; ?></dd>
                <dt>Naam:</dt>
                <dd><?php echo $soort->naam; ?></dd>
                <dt>Aantal wijnen:</dt>
                <dd><?php echo $aantalWijnen; ?></dd>
            </dl>
        <?php } ?>
        <br>
        <h3>Wijnen: </h3>
        <br>
        <?php  
            if ($wijnen != null) {
            foreach($wijnen as $wijn): ?>
            <div class="row marketing">
                <div class="col-md-10">
                <h5><?php echo $wijn->jaar; ?></h5>
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
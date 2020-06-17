<?php include 'includes/header-w-subheader.php'; ?>

        <h3 class="title"><?php echo $title; ?></h3>
        <?php if ($wijn != null) { ?>
            <dl>
                <dt>Id:</dt>
                <dd><?php echo $wijn->id; ?></dd>
                <dt>Jaar:</dt>
                <dd><?php echo $wijn->jaar; ?></dd>
                <dt>Beoordeling:</dt>
                <dd><?php echo $wijn->beoordeling; ?></dd>
                <dt>Prijs:</dt>
                <dd>€<?php echo $wijn->prijs; ?></dd>
            </dl>

            <form action="bestelAantal.php" method="POST">
                <input type="hidden" name="wijnId" value="<?php echo $wijn->id; ?>">
                <h5>Toevoegen aan winkelmandje:</h5>
                <div class="form-group">
                    <label>Aantal</label>
                    <input type="number" class="form-control" name="aantal" style="width:200px;">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
            </form>
            <br>
        <?php } ?>

<?php include 'includes/footer.php'; ?>
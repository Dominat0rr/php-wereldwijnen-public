<?php include 'includes/header.php'; ?>

    <?php

    if (isset($bestelbonId)) {
        echo "<h3>Je winkelwagentje is bevestigd als bestelbon  $bestelbonId</h3>";
    }
    else {
        echo "<h3>Sorry, er ging iets fout!</h3>";
    }

    ?>

<?php include 'includes/footer.php'; ?>
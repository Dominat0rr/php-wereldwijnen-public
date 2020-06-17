<?php include 'includes/header.php'; ?>
        <br><br>
        <h3><?php echo $title ?></h3>
        <div>
                <?php
                        if ($mandje_wijnen == null || $wijnen == null) {
                                echo "<h3>Je Mandje is momenteel leeg</h3>";
                        } 
                        else {
                                echo 
                                "<table class='table table-striped'>
                                <thead>
                                <tr>
                                    <th>Wijn</th>
                                    <th>Prijs</th>
                                    <th>Aantal</th>
                                    <th>Te betalen</th>
                                </tr>
                                </thead>
                                <tbody>";

                                $totaalBedrag = 0;
                                foreach($wijnen as $wijn) {
                                        $prijsPerWijn = $wijn->prijs * $wijn->aantal;
                                        $totaalBedrag += $prijsPerWijn;
                                        echo "<tr>
                                        <td> $wijn->jaar </td>
                                        <td> €$wijn->prijs </td>
                                        <td> $wijn->aantal </td>
                                        <td> €$prijsPerWijn </td>
                                        </tr>";
                                }

                                echo 
                                "</tbody>
                                </table>";

                                echo "
                                <h4 class='pull-right'>Totaal: €$totaalBedrag </h4>
                                <br><br>";
                        }

                ?>

        <form action="bestellingPlaatsen.php" method="POST">
                <button type="submit" class="btn btn-primary" name="submit">Bestelling plaatsen</button>
                <br><br>
            </form>
        </div>
<?php include 'includes/footer.php'; ?>
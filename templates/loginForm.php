<?php include 'includes/header.php'; ?>
        <br><br>
        <h3 class="login-title"><?php echo $title ?></h3>
        <div class="login-form">
            <form class="form-horizontal" action="./login.inc.php" method="post">
                <div class="form-group">
                    <?php
                        if (isset($_GET["username"])) {
                            echo '<input type="text" name="gebruikersnaam" value="' . $_GET["username"] . '" style="width:250px;">';
                        } else {
                            echo '<input type="text" name="gebruikersnaam" placeholder=" Gebruikersnaam" style="width:250px;">';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <input type="password" name="wachtwoord" placeholder=" Wachtwoord" style="width:250px;">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="login-submit" style="width:250px;">Login</button>
                </div>     
            </form>
        </div>
<?php include 'includes/footer.php'; ?>
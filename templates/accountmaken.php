<?php include 'includes/header.php'; ?>

<div class="container mt-3">
        <div class="row">
            <div class="col-md-6 m-auto ">
                <h1 class="text-center">Account aanmaken</h1>
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyfields") {
                                echo '<p class="text-center danger">Gelieve elk veld in te vullen!</p>';
                            }
                            else if ($_GET["error"] == "invalidusername") {
                                echo '<p class="text-center danger">Geen geldige gebruikersnaam!</p>';
                            }
                            else if ($_GET["error"] == "invalidpassword") {
                                echo '<p class="text-center danger">Paswoorden komen niet overeen!</p>';
                            }
                            else if ($_GET["error"] == "usernametaken") {
                                echo '<p class="text-center danger">Username is already taken!</p>';
                            }
                        }
                        else if (isset($_GET["signup"]) == "success") {
                            echo '<p class="text-center success">Signup successful!</p>';
                        }
                    ?>

                    <br>
                    <form action="./signup.inc.php" method="POST">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" class="form-control" name="voornaam" value="<?php  if (isset($_GET["voornaam"])) echo $_GET["voornaam"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Familienaam</label>
                            <input type="text" class="form-control" name="familienaam" value="<?php if (isset($_GET["familienaam"])) echo $_GET["familienaam"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Straatnaam</label>
                            <input type="text" class="form-control" name="straatnaam" value="<?php if (isset($_GET["straatnaam"])) echo $_GET["straatnaam"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Huisnummer</label>
                            <input type="text" class="form-control" name="huisnummer" value="<?php if (isset($_GET["huisnummer"])) echo $_GET["huisnummer"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" class="form-control" name="postcode" value="<?php if (isset($_GET["postcode"])) echo $_GET["postcode"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gemeente</label>
                            <input type="text" class="form-control" name="gemeente" value="<?php if (isset($_GET["gemeente"])) echo $_GET["gemeente"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gebruikersnaam</label>
                            <input type="text" class="form-control" name="gebruikersnaam" value="<?php if (isset($_GET["username"])) echo $_GET["username"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Paswoord</label>
                            <input type="text" class="form-control" name="paswoord" required>
                        </div>
                        <div class="form-group">
                            <label>Paswoord</label>
                            <input type="text" class="form-control" name="paswoord-repeat" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="signup-submit">Aanmaken</button>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>
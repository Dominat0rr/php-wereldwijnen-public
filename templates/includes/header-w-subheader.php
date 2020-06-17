<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Wereldwijnen</title>
</head>
<body>
    <div class="container">
      <div class="header">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Wereldwijnen</a>
        <div class="container-inline">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./landen.php">Landen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./soorten.php">Soorten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./wijnen.php">Wijnen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./mandje.php">Mandje</a>
                </li>
            </ul>
        </div>

        <!-- <div class="navbar-nav ml-auto">
            <form method="post" action="./logout.php">
                <input class="btn btn-danger" type="submit" value="Afmelden">
            </form>
        </div> -->

        <div class="navbar-nav ml-auto navbar-login-logout">
            <?php
                if (isset($_SESSION["usedId"])) {
                    echo '
                    <form method="post" action="./logout.php">
                        <input class="btn btn-danger" type="submit" value="Afmelden">
                    </form>
                    ';
                } else {
                    // echo '
                    // <form class="form-group-login" action="includes/login.inc.php" method="post">
                    //     <input type="text" name="mailusername" placeholder="Gebruikersnaam...">
                    //     <input type="password" name="password" placeholder="Wachtwoord...">
                    //     <button class="btn btn-primary btn-login" type="submit" name="login-submit">Login</button>
                    // </form>
                    // <a class="btn btn-light" href="signup.php">Registreer</a>
                    // ';
                    
                    echo '
                    <a class="btn btn-primary btn-login" href="./login.php">Aanmelden</a>
                    <a class="btn btn-light" href="signup.php">Registreer</a>
                    ';
                }


            ?>
        </div>
      </div>

      <div class="jumbotron">
        <h1>Wereldwijnen</h1>
        <ul class="menu-flags">
            <?php foreach($landenHeader as $landHeader): ?>
                <li><a href="<?php echo "index.php?land=" . $landHeader->id; ?>"><img src="<?php echo './images/' . $landHeader->id . '.png'; ?>"></a></li>
            <?php endforeach; ?>
        </ul>
        <br>
        <h4>Zoeken op land: </h4>
        <form class="form" action="index.php" method="GET">
            <select id="selection" name="land" class="form-control" style="width:200px;">
                <?php foreach($landenHeader as $landHeader): ?>
                    <option class="option-flag" style="background-image:url(<?php echo './images/' . $landHeader->id . '.png'; ?>);" value="<?php echo $landHeader->id; ?>"><?php echo $landHeader->naam; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit" class="btn btn-lg btn-success">ZOEK</button>
        </form>
        <br>
    </div>
    <?php displayErrorMessage(); ?>
<?php 
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Studio | Cenovnik</title>

    <link rel="shortcut icon" href="./assets/cslogo.png" type="image/x-icon">
    <link rel="icon" href="./assets/cslogo.png" type="image/x-icon">
    <!-- Bootstrap cdn -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <!--CSS sheet -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://kit.fontawesome.com/49ff4a7b2e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./script.js"></script>
    <script src="./vrtiLogo.js"></script>
</head>
<body class="index-bg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top p-1 pl-2 pr-2" id="scrollnav">
    <a class="navbar-brand" href="./index.php" title = "Home"><img src="./assets/cslogo.jpg" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./galerija.php">Galerija</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="./cenovnik.php">Cenovnik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./o nama.php">O nama</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-0">
            <?php
                if (isset($_SESSION["korisnicko_ime"])) {
                    $loggenOnUser = $_SESSION["korisnicko_ime"];
                    echo '
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action text-decoration-none"><span class=" mr-2" ><span style="color:lime;">●</span>&nbsp;&nbsp;<i class="fa fa-user-o"></i>&nbsp;&nbsp;'.$loggenOnUser.' </span></a>
                            <ul class="dropdown-menu bg-dark dropdown_menu-animate">
                                <li class="dropdown_item"><a href="./login.php"><i class="fa fa-user-o"></i> Profile</a></li>
                                <li class="dropdown_item"><a href="#"><i class="fa fa-calendar-o"></i> Calendar</a></li>
                                <li class="dropdown_item"><a href="#"><i class="fa fa-sliders"></i> Settings</a></li>
                                <li class="dropdown_item"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                        ';
                } else {
                    echo "  <li class='nav-item'>
                                <a class='nav-link' href='./login.php'>&#x2022;&nbsp;Login/Registracija</a>
                            </li>";
                }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="./igrica.php">Igrica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./rezultati.php">Tabela</a>
            </li>
        </ul>
    </div>
    </nav>

    <div class="">

    </div>
    <div>
    <a href="./igrica.php">
        <img src="./assets/cslogo.jpg" id="suga" title="Play the game?">
    </a>
    </div>
    <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>
        <p> asd </p>

    <div class="footer" id="scrollfoot">
        <?php include("footer.php")?>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>

</body>
</html>
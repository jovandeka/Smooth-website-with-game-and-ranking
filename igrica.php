<?php 
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en" style="cursor: crosshair;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Studio | Igrica</title>

    <link rel="shortcut icon" href="./assets/cslogo.png" type="image/x-icon">
    <link rel="icon" href="./assets/cslogo.png" type="image/x-icon">
    <!-- Bootstrap cdn -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <!--CSS sheet -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://kit.fontawesome.com/49ff4a7b2e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./script.js"></script>
    <script src="./fora.js"></script>
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
            <li class="nav-item">
                <a class="nav-link" href="./cenovnik.php">Cenovnik</a>
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
            <li class="nav-item active">
                <a class="nav-link active" href="./igrica.php">Igrica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./rezultati.php">Tabela</a>
            </li>
        </ul>
    </div>
    </nav>
    <div id="tajmer">00:00:00</div>
    <div id="IgraBrojac">Broj uhvacenih:</div>
    <div id="IgraText">Uhvati me ako možeš &#128540;</div>
    <div>
        <img src="./assets/dead.png" id="uhvacen">
        <img src="./assets/slice.gif" id="slice">
        <img src="./assets/blood.gif" id="blood">
        <img src="./assets/cslogo.jpg" id="sugaIgra">
    </div>

    <?php
        if (isset($_SESSION["korisnicko_ime"])) {
            $loggenOnUser = $_SESSION["korisnicko_ime"];
            echo '
                <section class="container-fluid" id="upis">
                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-3 col-12">
                        <form class="upis-form-container" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                        <h3 class="text-center pb-3 text-nowrap font-weight-bold" >Rangiraj svoje vreme</h3>
                            <div class="form-group text-center">
                                <label for="vreme">Ostvareno vreme u sekundama:</label>
                                <input type="text" class="form-control bg-success text-center font-weight-bold text-white" id="vreme" name="txtVreme" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="UpisBtn">Upiši u tabelu</button>
                            </form>
                        </div>
                    </div>
                </section>
                ';
        } else {
            echo '  
                <section class="container-fluid" id="upis">
                    <div class="row justify-content-end">
                        <div class="col-sm-6 col-md-3 col-12">
                        <form class="upis-form-container" action="./login.php" >
                            <p class="text-center pb-3 text-nowrap font-weight-bold" >Uloguj se i rangiraj svoje vreme!</p>
                            <button type="submit" class="btn btn-primary btn-block" name="dugme">OK</button>
                        </form>
                        </div>
                    </div>
                </section>
                ';
        }
        ?>
    <?php
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $txtEmail = $_SESSION['email'];
        $txtNick = $_SESSION['korisnicko_ime'];
        $txtVreme = $_POST['txtVreme'];

        $sql1="SELECT * FROM korisnik WHERE email = '$txtEmail' AND korisnicko_ime = '$txtNick'";

        $res=mysqli_query($conn,$sql1);

        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_assoc($res);
            $id = $row['id_korisnika'];

            if($txtEmail==isset($row['email'])){
                $sql2 = "INSERT INTO vreme (id_korisnika, fldVreme) VALUES ( '$id', '$txtVreme')";
                $rs2 = mysqli_query($conn, $sql2);
                if($rs2){
                    echo '<script>alert("'.$txtNick.',"+" "+ "vaš rezultat je upisan.")</script>';
                    echo "<script>document.location = './rezultati.php'</script>";
                }  
            }
        }
        else{
            echo '<script>alert("Pogrešan Email ili Lozinka! Da li ste registrovani?")</script>';
            }
        }
    ?>

    <div class="footer" id="scrollfoot">
        <?php include("footer.php")?>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>

</body>
</html>
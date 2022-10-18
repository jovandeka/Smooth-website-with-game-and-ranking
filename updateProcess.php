<?php

    session_start(); 

    include "connection.php";

    if(isset($_POST['updateNick'])) {

        global $conn;
        $nickNovi = $_POST['nickNovi'];
        $email = $_SESSION['email'];

        if(empty($nickNovi)) { ?>
            <script> 
                    window.alert("Polje za korisničko ime mora biti popunjeno!");
                    window.location="profil.php";
             </script>
        <?php
        }

        $query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$nickNovi'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {?>
                <script>
                    window.alert("Korisničko ime je već zauzeto, pokušajte ponovo.");
                    window.location="profil.php";
                </script>
            <?php
        }
        else{
            $query2 = "UPDATE korisnik SET korisnicko_ime = '$nickNovi' WHERE email = '$email'";
            $result2 = mysqli_query($conn, $query2);
            if($result2){
                $_SESSION['korisnicko_ime'] = $nickNovi;
                ?>
                <script>
                    window.alert("Uspešno ste ažurirali korisničko ime!");
                    window.location="profil.php";
                </script>
            <?php
            }
            else{?>
                <script>
                    window.alert("Došlo je do greške! pokušajte kasnije");
                    window.location="profil.php";
                </script>
            <?php
            }
        }
    }

    if(isset($_POST['updatePass'])) {

        global $conn;
        $lozinkaNova = $_POST['lozinkaNova'];
        $email = $_SESSION['email'];

        if(empty($lozinkaNova)) { ?>
            <script> 
                    window.alert("Polje za lozinku mora biti popunjeno!");
                    window.location="profil.php";
             </script>
        <?php
        }

        $query3 = "SELECT * FROM korisnik WHERE email = '$email'";
        $result3 = mysqli_query($conn, $query3);
        if(mysqli_num_rows($result3) > 0) { 
            $query4 = "UPDATE korisnik SET lozinka = '$lozinkaNova' WHERE email = '$email'";
            $result4 = mysqli_query($conn, $query4);
            if($result4){
                $_SESSION['lozinka'] = $lozinkaNova;
                ?>
                <script>
                    window.alert("Uspešno ste ažurirali lozinku!");
                    window.location="profil.php";
                </script>
            <?php
            }
            else{?>
                <script>
                    window.alert("Došlo je do greške! pokušajte kasnije");
                    window.location="profil.php";
                </script>
            <?php
            }
        }
        else{?>
            <script>
                window.alert("Došlo je do greške sa bazom podataka! pokušajte kasnije");
                window.location="profil.php";
            </script>
        <?php
        }
    }
?>
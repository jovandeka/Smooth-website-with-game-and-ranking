<?php

    include "connection.php";

    if(isset($_POST['regBtn'])) {

        global $conn;
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $psw = $_POST['lozinka'];
        $_SESSION['loggedin'] = false;

        if(empty($nick) || empty($email) || empty($psw)) { ?>
            <script> 
                    window.alert("Sva polja moraju biti popunjena");
                    window.location="registracija.php";
             </script>
        <?php
        }

        $query = "SELECT * FROM korisnik WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) { ?>
                <script>
                    window.alert("Već postoji nalog sa ovom Email adresom!");
                    window.location="registracija.php";
                </script>
            <?php
        }
        else{
            $query2 = "SELECT * FROM korisnik WHERE korisnicko_ime = '$nick'";
            $result2 = mysqli_query($conn, $query2);
            if(mysqli_num_rows($result2) > 0) {?>
                <script>
                    window.alert("Korisničko ime je već zauzeto, pokušajte ponovo.");
                    window.location="registracija.php";
                </script>
            <?php
            }
            else{
                $query3 = "INSERT INTO korisnik (email, korisnicko_ime, lozinka) VALUES ('$email', '$nick', '$psw');";
                $result3 = mysqli_query($conn, $query3);
                if($result3){?>
                    <script>
                        window.alert("Uspešno ste se registrovali!");
                        window.location="login.php";
                    </script>
                <?php
                }
                else{?>
                    <script>
                        window.alert("Došlo je do greške! pokušajte kasnije");
                        window.location="registracija.php";
                    </script>
                <?php
                }
            }
        }
    }
?>
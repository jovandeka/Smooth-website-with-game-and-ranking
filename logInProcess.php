<?php

    include "connection.php";

    if(isset($_POST['logInBtn'])) {

        global $conn;
        $email = $_POST['email'];
        $psw = $_POST['lozinka'];
        $_SESSION['loggedin'] = false;

        if(empty($email) || empty($psw)) { ?>
            <script> 
                    window.alert("Sva polja moraju biti popunjena");
                    window.location="login.php";
             </script>
        <?php
        }

        $query = "SELECT * FROM korisnik WHERE email = '$email'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            if($row['lozinka'] == $psw) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
                $_SESSION['id_korisnika'] = $row['id_korisnika'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['lozinka'] = $row['lozinka'];
                ?>
                <script> window.location="./index.php"; </script>
                <?php
            }

            else { ?>
                <script>
                    window.alert("Pogresna lozinka ili email");
                    window.location="login.php";
                </script>
            <?php
            }

        }

        else { ?>
            <script>
                window.alert("Korisnik ne postoji, registrujte se.");
                window.location="login.php";
            </script>;
        <?php
        }

    }

?>
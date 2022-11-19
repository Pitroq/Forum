<?php
    session_start();
    if (isset($_SESSION['loginIn'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
    <script>
        function showPass(){
            var btn = document.getElementById("pass");
            
            if(btn.type == "password"){
                btn.type = "text";
            }else if(btn.type == "text"){
                btn.type = "password";
            }
            
        }
    </script>
</head>
<body>
    <header>
        <section id="search">
            Forum.pl
        </section>
        <section id="login">
            <a class="loginOption" href="register.php">Zarejestruj</a>
            <a class="loginOption" href="login.php">Zaloguj</a>
        </section>
        <nav>
            <a class="option" href="index.php">Strona główna</a>
            <a class="option" href="questionAdd.php">Zadaj pytanie</a>
            <a class="option" href="questionRandom.php">Losowe pytanie</a>
        </nav>
    </header>
    <article>
        <p style="font-size: 30px">Zarejestruj się </p>
        <form style="color: white" id="registerForm" action="" method="POST">
            <p>Login: <input type="text" name="login" pattern="[A-Za-z].{3,}" minlength="5" placeholder="nie może zaczynac sie liczbą" required></p>    
            <p>E-mail: <input type="email" name="email" required></p>
            <p>Hasło: <input id="pass" type="password" name="pass" minlength="5" required><input value="Pokaż" onClick="showPass();" type="button"></p>
            <p><input id="formBtn" name="sub" type="submit" value="Zarejestruj się"></p>  
            
            <?php
                if(isset($_POST['sub'])){
                    $loginExist = true;
                    $emailExist = true;

                    $login = $_POST['login'];
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $email = $_POST['email'];

                    include("connect.php");

                    $query1 = mysqli_query($connect, "SELECT COUNT(*) as count FROM uzytkownicy WHERE login = '$login';");
                    $result1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
                    foreach($result1 as $r){
                        if ($r['count'] > 0){
                            echo "<span style='font-size: 18px;'>Konto o podanych loginie już istnieje</span>";
                        }
                        else{
                            $loginExist = false;
                        }
                    }
                    $query2 = mysqli_query($connect, "SELECT COUNT(*) as count FROM uzytkownicy WHERE email = '$email';");
                    $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                    foreach($result2 as $r){
                        if ($r['count'] > 0){
                            echo "<span style='font-size: 18px;'></p>Konto na podanym emailu już istnieje</span>";
                        }
                        else{
                            $emailExist = false;
                        }
                    }
                    if(($emailExist == false) && ($loginExist == false)){
                        $query3 = mysqli_query($connect, "INSERT INTO uzytkownicy VALUES(NULL,'$login', '$pass', '$email');");
                        header('Location: index.php');
                    }

                    mysqli_close($connect);
                    

                }
            ?>
            <p id="formLog">Masz już konto?
            <u><a href="login.php">Zaloguj się</a></u>
        </form>
    </article>
    <footer></footer>

</body>
</html>
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
    <link rel="stylesheet" href="login.css">
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
        <p style="font-size: 30px">Zaloguj się </p>
        <form style="color: white" id="loginForm" action="" method="POST">
            <p>Login: <input type="text" name="login" required></p>
            <p>Hasło: <input type="password" name="pass" required></p>
            <p><input id="formBtn" type="submit" value="Zaloguj się"></p>
            
            <?php
                @$login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
                @$pass = $_POST['pass'];


                if((isset($login)) && (isset($pass))){
                    include("connect.php");
                    $query = mysqli_query($connect, "SELECT * FROM uzytkownicy WHERE login = '$login'");
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    foreach($result as $r){
                        
                        if(password_verify($pass, $r['haslo'])){
                            
                            $_SESSION['userLogin'] = $login;
                            $_SESSION['userId'] = $r['idUzytkownika'];
                            $_SESSION['loginIn'] = true;
                        
                            header('Location: index.php');
                        }
                        else{
                        echo "<span style='font-size: 18px;'>Niepoprawny login lub hasło</span></p>";
                        }
                        
                    }
                    

                    mysqli_close($connect);
                }
                

            ?>
            <p id="formReg">Nie masz konta?
            <u><a href="register.php">Zarejestruj się</a></u>
        </form>
        
    </article>
    <footer></footer>

</body>
</html>
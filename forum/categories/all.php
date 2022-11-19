<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="category.css">

</head>
<body>
    <header>
        <section id="search">
            Forum.pl
        </section>
        <section id="login">
            <?php
                if (isset($_SESSION['loginIn'])){
                    echo "
                        <a class='loginOption' href='logout.php'>Wyloguj</a>
                        <a class='loginOption' href='../user.php'>{$_SESSION['userLogin']}</a>
                    ";
                }
                else{
                    echo "
                        <a class='loginOption' href='../register.php'>Zarejestruj</a>
                        <a class='loginOption' href='../login.php'>Zaloguj</a>
                    ";

                }
            ?>
        </section>
        <nav>
            <a class="option" href="../index.php">Strona główna</a>
            <a class="option" href="../questionAdd.php">Zadaj pytanie</a>
            <a class="option" href="../questionRandom.php">Losowe pytanie</a>
        </nav>
    </header>
    <article>
        <div style="font-size: 30px; width:700px; float:left; height:100px"><p>Kategoria: Wszystkie</p></div>
        <div style="font-size: 30px; width:200px; padding: 15px;float:right; height:70px"><img style="float:right;"width="65px" src="../img/another.png"></div>
        <br><br><br><br><br><br><br>
        <?php
            include("../connect.php");
            $query = mysqli_query($connect, "SELECT idPytania, login, tytul, tresc, kategoria, data FROM pytania INNER JOIN uzytkownicy ON pytania.idUzytkownika = uzytkownicy.idUzytkownika;");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach($result as $r){

                echo "
                <div class='question'>
                    <div id='questionTitle'>
                        <strong><a style='color: black;' href='../question.php?id={$r['idPytania']}'>".ucfirst($r['tytul'])."</a></strong>                
                    </div>
                    <div id='questionAuthor'>
                        {$r['login']} 
                    </div>
                    <div id='questionCategory'>
                        Kategoria / język: {$r['kategoria']} 
                    </div>
                    <div id='questionRate'>
                        {$r['data']} 
                    </div>
                </div>
            
                ";

            }

            

            mysqli_close($connect);
        ?>
    </article>
    <footer></footer>

</body>
</html>
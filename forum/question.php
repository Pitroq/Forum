<?php
    session_start();

    if(!isset($_GET['id'])){
        header("Location: question.php?id=0");
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
    <link rel="stylesheet" href="question.css">
    <style>
        #textareaContent{
            resize: vertical;
            width: 80%;
            margin-left: 50px;
            height: 100px;
            font-size: 19px;
        }
    </style>
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
                        <a class='loginOption' href='user.php'>{$_SESSION['userLogin']}</a>
                    ";
                }
                else{
                    echo "
                        <a class='loginOption' href='register.php'>Zarejestruj</a>
                        <a class='loginOption' href='login.php'>Zaloguj</a>
                    ";
                }
            ?>
        </section>
        <nav>
            <a class="option" href="index.php">Strona główna</a>
            <a class="option" href="questionAdd.php">Zadaj pytanie</a>
            <a class="option" href="questionRandom.php">Losowe pytanie</a>
        </nav>
    </header>
    <article id="article">
        <div id="articleBox">
        <?php
            @$questionId = $_GET['id'];

            include("connect.php");
            $query = mysqli_query($connect, "SELECT idPytania, login, tytul, tresc, kategoria, data FROM pytania INNER JOIN uzytkownicy ON pytania.idUzytkownika = uzytkownicy.idUzytkownika WHERE idPytania = '$questionId';");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach($result as $r){

                echo "
                <div class='question'>
                    <div id='questionTitle'>
                        <strong>".ucfirst($r['tytul'])."</strong>                
                    </div>
                    <div id='questionAuthor'>
                        Autor: {$r['login']} 
                    </div>
                    <div id='questionContent'>
                        ".ucfirst($r['tresc'])."
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
        ?>

        </div>   
        <div id="comments">
        <p>Komentarze:</p>
            <?php
                $query = mysqli_query($connect, "
                    SELECT uzytkownicy.login, komentarze.tresc, komentarze.data FROM komentarze 
                    INNER JOIN uzytkownicy ON komentarze.idUzytkownika = uzytkownicy.idUzytkownika  
                    INNER JOIN pytania ON komentarze.idPytania = pytania.idPytania
                    WHERE komentarze.idPytania = $questionId;");
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach($result as $r){
                    //date("Y-m-d");

                    echo "
                    <div id='comment' class='comment'>

                        <div id='commentAuthor'>Autor: {$r['login']}</div>
                        <div id='commentData'>{$r['data']}</div>
                        <br><br>
                        <div id='commentContent'>{$r['tresc']} </div>
                    
                    </div>
                    ";

                }
                mysqli_close($connect);
            ?>
            <script>
                if (document.getElementById('comment') === null){
                    document.write("<center><b>Nie ma jeszcze żadnych komentarzy</b></center>");
                } 
            
            </script>
            <br>
            <?php
                @$questionId = $_GET['id'];

                if (isset($_SESSION['loginIn'])){
                    echo "
                        <p>Dodaj komentarz:</p>
                        

                        <form action='comment.php?id=$questionId' method='POST'>
                            <textarea name='content' id='textareaContent' minlength='10' required></textarea>
                            <p><input value='Dodaj komentarz' name='sub' style='float:right; height: 40px; width: 120px;' type='submit'></p>

                        </form>

                    ";
                }
                else{
                    echo "
                        <u><p><a style='color:black; font-size:25px;' href='login.php'>Zaloguj się aby dodać komentarz</a></p></u>
                    ";
                }
            ?>
            <br><br>
        </div>
        <script>
            if (document.getElementById("articleBox").innerHTML == false){
                document.getElementById("comments").innerHTML = "";
                document.write("<br><center><h3>Coś poszło nie tak. Przepraszamy za utrudnienia<br><br><u><a href='index.php' style='color:black;'>Wróć na stronę główną</a></u></h3></center><br>");
            }
        </script>
        
    </article>
    <footer></footer>
</body>
</html>
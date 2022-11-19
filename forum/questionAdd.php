<?php
    session_start();
    if (!isset($_SESSION['loginIn'])){
        header('Location: login.php');
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
    <style>
        #textareaContent{
            resize: vertical;
            width: 90%;
            margin-left: 50px;
            height: 300px;
            font-size: 19px;
        }
        #questionBox{
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 2%;
            box-sizing: border-box;
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
    <article>
        <div id="questionBox">
            <p style="font-size: 30px">Zadaj pytanie: </p>
            <form action="" method="POST">
                <p>Tytuł/Temat: <input name="title" style="width: 80%;font-size: 17px; " type="text" minlength="5" required></p>
                <p>Treść:</p> <textarea name="content" id="textareaContent" minlength="17" required></textarea>
                <p>Kategoria/Język
                    <select style="font-size: 17px;" name="category">
                        <option value="Python">Python</option>
                        <option value="C">C/C++</option>
                        <option value="C#">C#</option>
                        <option value="PHP">PHP</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="Java">Java</option>
                        <option value="HTML/CSS">HTML/CSS</option>
                        <option value="Bazy danych">Bazy danych</option>
                        <option value="GameDev">GameDev</option>
                        <option value="Inne" selected>Inne</option>
                    </select>
                </p>
                <p><input value="Zadaj pytanie" name="sub" style="float:right; height: 40px; width: 100px;" type="submit"></p>
            </form>
            <?php
                if(isset($_POST['sub'])){

                    $title = $_POST['title'];
                    $content = $_POST['content'];  
                    $category = $_POST['category'];
                    $userId = $_SESSION['userId'];
                    $data = date('Y-m-d');
                    include("connect.php");

                    $query = mysqli_query($connect, "INSERT INTO pytania VALUES(NULL, '$userId', '$title', '$content', '$category', '$data')");
                    mysqli_close($connect);
                    header('Location: index.php');

                }
            ?>
            <br><br>
        </div>
    </article>
    <footer></footer>
</body>
</html>
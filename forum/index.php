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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
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
    <article style="height: 1600px">
        <p style="font-size: 30px">Kategorie/Języki: </p>
        <div class="categoryList">
            <?php
                include("connect.php");
            ?>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/another.png"></div>
                <div class="categoryInfo">
                    Wszystkie
                </div>
                <div class="categoryInfo2">
                    <p>
                    <?php
                        $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania;");
                        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach($result as $r){
                            echo $r['count'];
                        }
                    ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/all.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/python.png"></div>
                <div class="categoryInfo">
                    Python
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='Python';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/python.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/c.png"></div>
                <div class="categoryInfo">
                    C/C++
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='C';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/c.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/csharp.webp"></div>
                <div class="categoryInfo">
                    C#
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='C#';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/csharp.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/php.png"></div>
                <div class="categoryInfo">
                    PHP
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='PHP';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/php.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/javascript.webp"></div>
                <div class="categoryInfo">
                    JavaScript
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='JavaScript';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/javascript.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/java.webp"></div>
                <div class="categoryInfo">
                    Java
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='Java';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/java.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/html.webp"></div>
                <div class="categoryInfo">
                    HTML/CSS
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='HTML/CSS';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/html-css.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/database.png"></div>
                <div class="categoryInfo">
                    Bazy danych
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='Bazy danych';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/databases.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/gamedev.png"></div>
                <div class="categoryInfo">
                    GameDev
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='GameDev';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/gamedev.php">Wyświetl</a></p>
                </div>
            </div>
            <div class="category">
                <div class="categoryImg"><img width="65px" src="img/another.png"></div>
                <div class="categoryInfo">
                    Inne
                </div>
                <div class="categoryInfo2">
                    <p>
                        <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) as count FROM pytania WHERE Kategoria='Inne';");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            foreach($result as $r){
                
                                echo $r['count'];
                            }
                        ?>
                    pytań<br>
                    <br><p><a class="categoryBtn" style="color: black; font-size: 25px" href="categories/another.php">Wyświetl</a></p>
                </div>
            </div>
            <?php
                mysqli_close($connect);
            ?>
        </div>
    </article>
    <footer></footer>
</body>
</html>
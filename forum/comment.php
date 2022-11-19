<?php
    session_start();

    include("connect.php");
    $questionId = $_GET['id'];
    $userId = $_SESSION['userId'];
    $content = $_POST['content'];
    $data = date('Y-m-d');

    $query = mysqli_query($connect, "INSERT INTO komentarze VALUES(NULL,$questionId, $userId, '$content', '$data')");
    header("Location: question.php?id=$questionId");

?>
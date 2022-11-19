<?php
    include("connect.php");

    $query = mysqli_query($connect, "SELECT idPytania FROM pytania");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $i = 0;
    foreach($result as $r){
        $collumns[$i] = $r['idPytania']; 
        $i = $i + 1;
    }
    //wypisywanie tablicy:
    //for($i=0; $i<=count($collumns)-1; $i++){
    //    echo "$collumns[$i]"."<br>";
    //}
    $randQuestion = $collumns[array_rand($collumns)]; //losuje numer elementu tablicy i wypisuje element tablicy o tym numerze
    
    header("Location: question.php?id=$randQuestion");

    mysqli_close($connect);
?>
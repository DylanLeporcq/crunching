<?php
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films

$NBmovies = count($top);
$test = 0;
$test2 = 0;
$test3 = 0;
$test4 = 0;
$filmrecent="";
$filmvieux="";
$vieuxdate=0;
$recentdate=0;
$mostcat = "";
$mostreal = "";
$topPrice= "152.9";
$topLoc="177.84";


foreach ($top as $key =>$value){
    $movie = $value['im:name']['label'];
    if ($movie == "Gravity") {
        $test = $key;
    }
}

foreach ($top as $key => $value){
    $film = $value['im:name']['label'];
    $artist = $value['im:artist']['label'];
    if ($film == "The LEGO Movie"){
        $test2 = $artist;
    }
}

foreach ($top as $key => $value){
    $date = $value['im:releaseDate']['label'];
    if ($date < 2000){
        $test3++;
    }
}

foreach ($top as $key => $value){
    $youngOld[$value ['im:name'] ['label']] = substr($value ['im:releaseDate']['label'], 0, 10) . "<br>";
}
foreach ($youngOld as $key => $value){
    if ($value == max($youngOld)){
        $filmrecent=$key;
        $recentdate=max($youngOld);
    }
    if ($value == min($youngOld)){
        $filmvieux=$key;
        $vieuxdate=min($youngOld);
    }
}

foreach ($top as $key => $value) {
    $array[] = $value['category']['attributes']['label'];
    $arrayCount = array_count_values($array);
}

foreach ($arrayCount as $key => $value) {
    if ($value == max($arrayCount)) {
        $mostcat =  $key;
    }
}


foreach ($top as $key => $value){
    $director[] = $value['im:artist']['label'];
    $arrayCount = array_count_values($director);


foreach ($arrayCount as $key => $value){
    if ($value == max($arrayCount)){
        $mostreal = $key;
    }
}}


/*foreach ($top as $key => $value){
    if($key < 10){
        $sum += $value['im:price']['attributes']['amount'];
    }
    $topPrice=$sum;
}*/


foreach ($top as $key => $value){
    $array = explode (" ", $value['im:releaseDate']['attributes']['label']);//explode = "explose" une string de plusieurs mots à chaques espaces " " pour en faire un array.
    $month[] = $array[0];
    $arrayCount = array_count_values($month);
}
foreach ($arrayCount as $key => $value){
    if ($value == max($arrayCount)){
        echo "=> " . $key . " : " . $value . " sorties" . "<br>";
    }
}


foreach ($top as $key => $value){
    $price = $value['im:price']['attributes']['amount'];

    if ($price <8 && $movie < 10){
        $movie = $value['im:name']['label'];
        echo "(Position " . $key . ") " . $movie . " => " . (($price*10)/10) . "$ " . "<br>";
    }
}

?>
<span>Le classement des 10 premiers films est :  <br><?php
    foreach ($top as $key =>$value){
        if ($key < 10){
            echo $key+1 . " : " . $value['im:name']['label']."<br>";
        }
    } ?></span>
<br>
<span>Gravity est classé <?php echo $test ?>ème</span>
<br>
<span><?php echo $test2 ?> a réalisé le film LEGO</span>
<br>
<span><?php echo $test3 ?> films sont sortis avant 2000</span>
<br>
<span> <?php echo $filmrecent ?> est le plus le plus récent, sorti en <?php echo $recentdate ?>. Alors que <?php echo $filmvieux ?> est le fils le plus vieux, sorti en <?php echo $vieuxdate ?>.</span>
<br>
<span><?php echo $mostcat ?> est la catégorie de film la plus présentée</span>
<br>
<span><?php echo $mostreal ?>  est le réalisateur le plus présent au top100</span>
<br>
<span>Cela couterait <?php echo $topPrice ?>€ d'acheter le top10 sur iTunes. Et <?php echo $topLoc ?>€ pour le louer</span>
<br>
<span><?php echo "e"; ?> est le mois où il y a eu le plus de sorties</span>
<br>
<span>Les 10 meilleurs films en ayant un budget limité est :</span>
<?php
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\r\n", $string);


$q1 = count($dico);
$q2 = 0;
$q3 = 0;
$q4 = 0;


for($i=0; $i<$q1; $i++)
{
    if (strlen($dico[$i]) === 15) {
        $q2++;
    } if (strpbrk($dico[$i], "w")){
        $q3++;
    }
}


for($i=0; $i<$q1; $i++)
{
    if (substr(trim($dico[$i]), -1, 1)=="q") {
        $q4++;
    }
}


?>

<span>Le dictionnaire contient <?php echo $q1?> mots</span>
<br>
<span> <?php echo $q2?>  mots font 15 caractères</span>
<br>
<span> <?php echo $q3?> mots contiennent la lettre W</span>
<br>
<span> <?php echo $q4?> mots terminent par la lettre Q</span>

<?php
$doc = new DOMDocument('1.0');
$doc->load("BSIT3EG1G2.xml");

$heroes = $doc->getElementsByTagName("hero");
$check = 0;
$search = strtolower($_GET["search"]);

foreach($heroes as $hero){
    $heroName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
    $heroLower = strtolower($heroName);

    if(str_contains($heroLower, $search)==true){
        echo $heroName;
        echo "<br/>";
    }
}
?>
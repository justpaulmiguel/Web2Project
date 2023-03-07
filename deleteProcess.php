<?php
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
$doc->preserveWhiteSpace = false;
$doc->load('BSIT3EG1G2.xml');

$heroName = $_GET["heroName"];

$heroes = $doc->getElementsByTagName("hero");

foreach($heroes as $herotmp){
    $heroPast = $herotmp->getElementsByTagName("heroName")->item(0)->nodeValue;
    
    if($heroPast == $heroName){
        $doc->getElementsByTagName("heroes")->item(0)->removeChild($herotmp);
        $doc->save('BSIT3EG1G2.xml');
        echo"Record Deleted Successfully. <br/> <a href='delete.php'>Back<a>";
        break;
    }     
}
?>
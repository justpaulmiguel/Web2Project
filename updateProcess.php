<?php
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
$doc->preserveWhiteSpace = false;
$doc->load('BSIT3EG1G2.xml');

$heroName = $_POST["heroName"];

$heroes = $doc->getElementsByTagName("hero");

foreach($heroes as $herotmp){     
    $heroPast = $herotmp->getElementsByTagName("heroName")->item(0)->nodeValue;
    
    if($heroPast == $heroName){
        $oldProfile = $herotmp->getElementsByTagName("heroPic")->item(0)->nodeValue;
        break;
    }
}

//$heroRole = $_POST["role"];
$heroRole = implode('/', $_POST["heroRole"]);
$advisedLane = $_POST["advisableLane"];
$skinNum = $_POST["skinNum"];
$winRate = $_POST["winRate"];
$releaseYear = $_POST["releaseYear"];

$hero = $doc->createElement("hero");
$name = $doc->createElement("heroName", $heroName);
$role = $doc->createElement("role", $heroRole);
$lane = $doc->createElement("advisableLane", $advisedLane);
$skinNo = $doc->createElement("numberOfSkin", $skinNum);
$wr = $doc->createElement("winRate", $winRate);
$year = $doc->createElement("releaseYear", $releaseYear);

if ($_FILES['heroPic']['error'] == UPLOAD_ERR_NO_FILE) {
    $heroPic = $doc->createElement("heroPic");
    $cData = $doc->createCDATASection($oldProfile);
    $heroPic->appendChild($cData);
} else {
    $pic = base64_encode(file_get_contents(addslashes($_FILES["heroPic"]["tmp_name"])));;
    $heroPic = $doc->createElement("heroPic");
    $cData = $doc->createCDATASection($pic);
    $heroPic->appendChild($cData);
}

$hero->appendChild($name);
$hero->appendChild($role);
$hero->appendChild($lane);
$hero->appendChild($skinNo);
$hero->appendChild($wr);
$hero->appendChild($year);
$hero->appendChild($heroPic);

$doc->getElementsByTagName("heroes")->item(0)->replaceChild($hero, $herotmp);
$doc->save("BSIT3EG1G2.xml");
echo "Record Updated...<a href='index.php'>Back</a>";
?>
<?php
$doc = new DOMDocument('1.0');
$doc->load('../BSIT3EG1G2.xml');

$heroes = $doc->getElementsByTagName("hero");
$search = strtolower($_GET["heroName"]);

foreach($heroes as $hero){     
    $heroName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
    $heroLower = strtolower($heroName);   

    if($heroLower==$search){
        $heroRole = $hero->getElementsByTagName("role")->item(0)->nodeValue;
        $releaseYear = $hero->getElementsByTagName("releaseYear")->item(0)->nodeValue;
        $skinNum =  $hero->getElementsByTagName("numberOfSkin")->item(0)->nodeValue;
        $heroLane =  $hero->getElementsByTagName("advisableLane")->item(0)->nodeValue;
        $winRate =  $hero->getElementsByTagName("winRate")->item(0)->nodeValue;
        $heroPic = $hero->getElementsByTagName("heroPic")->item(0)->nodeValue;
        break;
    } 
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>'.ucwords($heroName).'&apos;s Information</title>'
    ?>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div class="w-screen box-border h-screen bg-custom-mlLightBlue overflow-auto px-5">
        <div class="w-full p-5 h-20">
            <img src="../src/logo.png" alt="logo" class="w-36">
            <a href="../index.html" class="float-right text-slate-200 font-ubuntu text-2xl">Back</a>
        </div>
        <div class="grid grid-cols-1 grid-flow-row md:grid-cols-2 w-full md:w-4/5 m-auto mt-3 min-h-[80vh] max-h[100vh] h-auto p-5 rounded-2xl bg-slate-100 gap-2">
            <div class=" bg-custom-toolbarLight rounded-xl">
                <div class="w-full h-full bg-slate-400 rounded-lg overflow-hidden">
                    <!--<img src="src/cat.jpg" alt="cat" class="object-cover w-full h-full">-->
                    <?php
                     echo '<img src="data:image;base64,'.$heroPic.'" alt="'.$heroName.'" class="object-cover w-full h-full">';
                    ?>
                </div>
            </div>
            <div class="rounded-lg p-5">
                <?php
                    echo' 
                    <h1 class="pb-5 font-ubuntuBold text-custom-mlDarkerBlue text-2xl md:text-4xl lg:text-5xl">'.ucwords($heroName).'</h1>
                    <h2 class="font-ubuntu text-custom-mlLightBlue text-lg md:text-xl lg:text-2xl">WinRate: '.$winRate.'</h2>
                    <h2 class="font-ubuntu text-custom-mlLightBlue text-lg md:text-xl lg:text-2xl">Role: '.$heroRole.'</h2>
                    <h2 class="font-ubuntu text-custom-mlLightBlue text-lg md:text-xl lg:text-2xl">Lane: '.$heroLane.'</h2>
                    <h2 class="font-ubuntu text-custom-mlLightBlue text-lg md:text-xl lg:text-2xl">No.of Skins: '.$skinNum.'</h2>
                    <h2 class="font-ubuntu text-custom-mlLightBlue text-lg md:text-xl lg:text-2xl">Release Year: '.$releaseYear.'</h2>';
                ?>
            </div>
        </div>
        <br/>
    </div>
</body>
</html>
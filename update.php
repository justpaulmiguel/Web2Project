<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="w-full box-border h-screen bg-slate-100">
    <div class="w-full p-5 h-20 bg-slate-100">
            <img src="src/logo2.png" alt="logo" class="w-40">
    </div>
    <div class="flex w-full box-border text-lg text-slate-800 p-2 flex-col">
        <h1 class="flex box-border w-full text-4xl font-semibold pt-2 pb-4 px-4 text-center text-slate-700 justify-center">Update Records</h1>
        <form method="get" action="edit.php" class="grid w-full grid-cols-1 grid-flow-row gap-x-[10px] lg:grid-cols-3 gap-y-0.5 md:grid-cols-2 p-2">

        <?php
                    $doc = new DOMDocument('1.0');
                    $doc->load('BSIT3EG1G2.xml');

                    $heroes = $doc->getElementsByTagName("hero");

                    foreach($heroes as $hero){
                        $heroName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
                        $heroRole = $hero->getElementsByTagName("role")->item(0)->nodeValue;
                        $heroLane = $hero->getElementsByTagName("advisableLane")->item(0)->nodeValue;
                        $numOfSkin = $hero->getElementsByTagName("numberOfSkin")->item(0)->nodeValue;
                        $winRate = $hero->getElementsByTagName("winRate")->item(0)->nodeValue;
                        $release = $hero->getElementsByTagName("releaseYear")->item(0)->nodeValue;
                        $heroPic = $hero->getElementsByTagName("heroPic")->item(0)->nodeValue;

                        echo '
                        <div class="w-full bg-slate-600 h-48 md:h-44 mb-2 rounded-2xl overflow-hidden">
                            <div class="flex h-full flex-row object-contain overflow-hidden p-3 items-center">
                                <img src="data:image;base64,'.$heroPic.'" alt="lolita" class="w-28 h-28 rounded-full m-4">
                                <div class="w-full h-full p-2">
                                    <div class="flex flex-col justify-center text-slate-100">
                                        <h3 class="text-2xl font-bold mb-4">'.$heroName.'</h3>
                                        <button type="submit" name="heroName" value="'.$heroName.'" class="w-1/3 bg-slate-100 text-slate-700 rounded-xl text-2xl">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
        </form>
    </div>
</div>

</body>
</html>
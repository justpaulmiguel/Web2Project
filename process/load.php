<?php
    $doc = new DOMDocument('1.0');
    $doc->load('../BSIT3EG1G2.xml');

    $heroes = $doc->getElementsByTagName("hero");

    foreach($heroes as $hero){
        //capitalize first letter for name = ucwords
        $heroName = ucwords($hero->getElementsByTagName("heroName")->item(0)->nodeValue);
        $heroRole = $hero->getElementsByTagName("role")->item(0)->nodeValue;
        $heroLane = $hero->getElementsByTagName("advisableLane")->item(0)->nodeValue;
        $numOfSkin = $hero->getElementsByTagName("numberOfSkin")->item(0)->nodeValue;
        $winRate = $hero->getElementsByTagName("winRate")->item(0)->nodeValue;
        $release = $hero->getElementsByTagName("releaseYear")->item(0)->nodeValue;
        $heroPic = $hero->getElementsByTagName("heroPic")->item(0)->nodeValue;

        echo '
        <div class="group w-full h-72 bg-transparent rounded-lg overflow-hidden border-custom-mlLight border-[1.5px] bg-custom-gradientTop shadow-sky-900 shadow-md font-ubuntu">
            <img src="data:image;base64,'.$heroPic.'" alt="'.$heroName.'" class="w-full h-full object-cover group-hover:hidden">
            <div id="nameDiv" class="relative bottom-10 text-center bg-slate-800 p-2 text-lg bg-opacity-50 text-slate-300 group-hover:h-full group-hover:bottom-0">
            '.$heroName.'<br/><br/>
            WinRate: '.$winRate.'<br/>
            Role: '.$heroRole.'<br/>
            Lane: '.$heroLane.'<br/>
            Skins: '.$numOfSkin.'<br/>
            Release: '.$release.'<br/>
            </div>
        </div>';
    }
?>
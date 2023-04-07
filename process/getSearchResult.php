<?php
$doc = new DOMDocument('1.0');
$doc->load("../BSIT3EG1G2.xml");

$heroes = $doc->getElementsByTagName("hero");
$check = 0;
$search = strtolower($_GET["q"]);

foreach($heroes as $hero){
    $heroRawName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
    if(str_contains($heroRawName, $search)==true){
        $check = 1;
        //capitalize
        $heroName = ucwords($hero->getElementsByTagName("heroName")->item(0)->nodeValue);
        echo ' <button name="heroName" value="'.$heroRawName.'" class="w-full pl-4 pr-10 h-12 outline-none text-left border-custom-mlLight border-x-2 hover:bg-slate-400 bg-slate-300 last-of-type:rounded-b-md first-of-type:rounded-t-md first-of-type:border-t-2 last-of-type:border-b-2 odd:bg-slate-100">'.$heroName.'</button>';
    }
}
//output if no records found
if($check!=1){
    echo '<p class="font-ubuntu text-lg text-slate-200">No records found</p>';
}

?>
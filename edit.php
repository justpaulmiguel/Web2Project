<?php
    $doc = new DOMDocument('1.0');
    $doc->load('BSIT3EG1G2.xml');

    $heroes = $doc->getElementsByTagName("hero");
    $heroFrom = $_GET["heroName"];

    $doc = new DOMDocument('1.0');
    $doc->load("BSIT3EG1G2.xml");

    $heroes = $doc->getElementsByTagName("hero");
    $check = 0;
    $search = strtolower($_GET["heroName"]);

    foreach($heroes as $hero){     
        $heroName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
        $heroLower = strtolower($heroName);   

        if($heroLower==$search){
            $heroRole = $hero->getElementsByTagName("role")->item(0)->nodeValue; 
                    
                if(str_contains($heroRole, "Mage")==true){
                    $mage = 'true';
                }else{
                    $mage = 'false';
                }

                if(str_contains($heroRole, "Fighter")==true){
                    $fighter = 'true';
                }else{
                    $fighter = 'false';
                }

                if(str_contains($heroRole, "Tank")==true){
                    $tank = 'true';
                }else{
                    $tank = 'false';
                }

                if(str_contains($heroRole, "Assassin")==true){
                    $assassin = 'true';
                }else{
                    $assassin = 'false';
                }

                if(str_contains($heroRole, "Support")==true){
                    $support = 'true';
                }else{
                    $support = 'false';
                }

                if(str_contains($heroRole, "Marksman")==true){
                    $marksman = 'true';
                }else{
                    $marksman = 'false';
                }

                $releaseYear = $hero->getElementsByTagName("releaseYear")->item(0)->nodeValue;
                $skinNum =  $hero->getElementsByTagName("numberOfSkin")->item(0)->nodeValue;
                $advisableLane =  $hero->getElementsByTagName("advisableLane")->item(0)->nodeValue;
                $winRate =  $hero->getElementsByTagName("winRate")->item(0)->nodeValue;
                $oldProfile = $hero->getElementsByTagName("heroPic")->item(0)->nodeValue;
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
    <title>Edit Record</title>
    <link rel="stylesheet" href="css/main.css">
    <?php
    echo
    '<script type="text/javascript">

        function checkInput(){
            var inputName = document.getElementById("heroName").value.toLowerCase();
            console.log(inputName);
            
            if(inputName.trim()!==""){
                var http = new XMLHttpRequest();
                console.log(inputName);

                http.onreadystatechange = function(){
                    if(http.readyState == 4 && http.status === 200){
                        console.log("request ready.");

                        var text = "";
                        var xmldoc = http.responseXML;
                        var names = xmldoc.getElementsByTagName("hero");
                        var inputBox = document.getElementById("errorMessageCont");
                        for(var name of names){
                            //name.childNodes[1].childNodes[0].nodeValue;
                            var registeredName = name.childNodes[1].childNodes[0].nodeValue;
                            if(inputName == registeredName){                               
                                if(registeredName == "'.$search.'"){
                                    break;    
                                }else{
                                    inputBox.innerHTML="* Already exists.";
                                    document.getElementById("submitBtn").disabled = true;
                                    break;
                                }                               
                            }else{
                                inputBox.innerHTML="";
                                document.getElementById("submitBtn").disabled = false;
                            }
                        }
                    }
                };
                http.open("GET", "BSIT3EG1G2.xml", true);
                http.send();
            }
        }
    </script>';
?>
</head>
<body onload="hi()">
    <div class="w-full box-border h-screen bg-slate-700">
        <div class="w-full p-5 h-20 bg-slate-700">
            <img src="src/logo.png" alt="logo" class="w-40">
            <a href="index.html" class="relative float-right text-slate-200 bottom-2 text-2xl p-2">Back</a>
        </div>
        <div class="flex w-full text-lg text-slate-800 flex-col items-center">
            <div class="flex h-max items-left flex-col p-7 w-full md:w-1/2 lg:w-1/3 bg-slate-100 rounded-2xl shadow-slate-400">
                <h1 class="text-3xl font-bold mb-4 text-center">Edit Record</h1>
                <!--Form register new record-->
                <form action="./process/updateProcess.php" method="post" enctype="multipart/form-data">
                    <label for="heroName" class="text-xl font-semibold">Hero Name<span id="errorMessageCont" class="relative float-right top-7 right-1 bg-gradient-to-t from-slate-100 to-white text-sm text-red-600"></span></label>
                    <br/>
                    <input type="text" onkeyup="checkInput()" name="heroName" id="heroName" class="outline-none border-slate-100 border-2 bg-white w-full p-2 rounded-2xl my-2">
                    <br/>
                    <label for="role[]" class="block text-xl font-semibold my-2">Role</label>
                    <div class="grid w-full grid-cols-4 grid-flow-row gap-y-1 gap-x-2">
                        <input type="checkbox" name="heroRole[] row-span-1" value="Tank" id="Tank" class="outline-none">
                        <label for="Tank"> Tank</label>
                        <input type="checkbox" name="heroRole[] row-span-1" value="Fighter" id="Fighter" class="outline-none">
                        <label for="Fighter">Fighter</label>
                        <input type="checkbox" name="heroRole[] row-span-1" value="Marksman" id="Marksman" class="outline-none"> 
                        <label for="Marksman">Marksman</label>
                        <input type="checkbox" name="heroRole[] row-span-1" value="Mage" id="Mage" class="outline-none">
                        <label for="Mage">Mage</label>
                        <input type="checkbox" name="heroRole[] row-span-1" value="Support" id="Support" class="outline-none">
                        <label for="Support">Support</label>
                        <input type="checkbox" name="heroRole[] row-span-1" value="Assassin" id="Assassin" class="outline-none ">
                        <label for="Assassin">Assassin</label>
                    </div>                        
                    
                    <div class="grid w-full grid-cols-2 grid-flow-row gap-y-1 gap-x-2">
                        <label for="advisableLane" class="block text-xl font-semibold my-2">Advised Lane</label>
                        <label for="winRate" class="block text-xl font-semibold my-2">Win Rate</label>
                        <select name="advisableLane" id="advisableLane" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">
                            <option selected disabled>Select Lane</option>
                            <option value="Roam">Roam</option>
                            <option value="Exp Lane">Exp Lane</option>
                            <option value="Gold Lane">Gold Lane</option>
                            <option value="Middle Lane">Middle Lane</option>
                            <option value="Jungle">Jungle</option>
                        </select>
                        <input type="text" name="winRate" id="winRate" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">
                        <label for="skinNum" class="block text-xl font-semibold my-2">Skin Number</label>
                        <label for="releaseYear" class="block text-xl font-semibold my-2">Release Year</label>
                        <input type="number" name="skinNum" id="skinNum" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">              
                        <input type="number" name="releaseYear" id="releaseYear" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">
                    </div>             
                    <label for="heroPic" class="block text-xl font-semibold my-2">New Profile Pic</label>
                    <input type="file" name="heroPic" id="heroPic" accept=".png, .jpg, .jpeg, .webp">
                    <br/><br/>
                    <div class="flex w-full justify-center">
                        <?php
                        echo'<button id="submitBtn" type="submit" name="heroPastName" value="'.$heroName.'" class="w-2/4 p-3 disabled:bg-slate-300 outline-none rounded-xl text-2xl text-slate-50 font-semibold bg-slate-500">Update</button>'
                        ?>
                    </div>          
                </form> 
            </div>
        </div>
    </div>
    <?php
        echo'
        <script type="text/javascript">
            function hi(){
                var heroName = document.getElementById("heroName");
                heroName.value = "'.$heroName.'";

                var Fighter = document.getElementById("Fighter");
                Fighter.checked = '.$fighter.';
                var Mage = document.getElementById("Mage");
                Mage.checked = '.$mage.';
                var Support = document.getElementById("Support");
                Support.checked = '.$support.';
                var Tank = document.getElementById("Tank");
                Tank.checked = '.$tank.';
                var Assassin = document.getElementById("Assassin");
                Assassin.checked = '.$assassin.';
                var Marksman = document.getElementById("Marksman");
                Marksman.checked = '.$marksman.';

                var releaseYear = document.getElementById("releaseYear");
                releaseYear.value = '.$releaseYear.';

                var skinNum = document.getElementById("skinNum");
                skinNum.value = "'.$skinNum.'";

                var winRate = document.getElementById("winRate");
                winRate.value = "'.$winRate.'";

                var advisableLane = document.getElementById("advisableLane");
                advisableLane.value = "'.$advisableLane.'";
            }
        </script>';
    ?>
</body>
</html>
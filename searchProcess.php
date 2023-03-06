<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="w-full box-border h-screen bg-slate-100">
        <div class="w-full p-5 h-20 bg-slate-100">
            <img src="src/logo2.png" alt="logo" class="w-40">
        </div>
        <div class="flex w-full h-[calc(100%-18rem)] box-border text-lg text-slate-800 px-10 py-4 flex-col">
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
                    $check++;
                }           
            }

            if($check!=0){
                echo '<h1 class="w-full text-3xl font-bold text-slate-600 mb-4">'.$check.' Search Results for "'.$search.'"</h1>';
            }
        ?>

        <form action="edit.php" method="get">
            <?php
                foreach($heroes as $hero){
                    $heroName = $hero->getElementsByTagName("heroName")->item(0)->nodeValue;
                    $heroLower = strtolower($heroName);

                    if(str_contains($heroLower, $search)==true){
                        echo'<button type="submit" name="hero" value="'.$heroName.'" class="text-xl font-semibold text-violet-900 underline">'.$heroName.'</button>';
                        echo '<br/><hr class="w-1/3 border-slate-500 mb-3"/>';
                    }
                }
            ?>
        </form>

        <a href="search.php" class="block w-28 text-center rounded-md p-2 mt-14 text-slate-100 bg-slate-600">Go Back</a>
        </div>
    </div>
</body>
</html>

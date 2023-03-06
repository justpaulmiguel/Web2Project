<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="w-full box-border h-screen bg-slate-100">
        <div class="w-full p-5 h-20 bg-slate-100">
            <img src="src/logo2.png" alt="logo" class="w-40">
        </div>
        <div class="flex w-full h-[calc(100%-18rem)] box-border text-lg text-slate-800 p-2 flex-col items-center justify-center mt-4">
            <form action="searchProcess.php" method="get" class="flex w-full items-center justify-center">
                <div class="flex w-2/4 outline-none rounded-md border-sky-400 border-2">
                    <input type="text" name="search" id="search" class="w-full h-full text-2xl p-4 outline-none bg-transparent">
                    <button type="submit" class="py-4 px-10 bg-sky-400 text-white text-2xl font-bold">Search</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
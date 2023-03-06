<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="w-full box-border h-screen bg-slate-700">
        <div class="w-full p-5 h-20 bg-slate-700">
            <img src="src/logo.png" alt="logo" class="w-40">
        </div>
        <div class="flex w-full text-lg text-slate-800 flex-col items-center">
            <div class="flex h-max items-left flex-col p-7 w-full md:w-1/2 lg:w-1/3 bg-slate-100 rounded-2xl shadow-slate-400">
                <h1 class="text-3xl font-bold mb-4 text-center">Create New Record</h1>
                <!--Form register new record-->
                <form action="createProcess.php" method="post" enctype="multipart/form-data">
                    <label for="heroName" class="text-xl font-semibold">Hero Name</label>
                    <br/>
                    <input type="text" name="heroName" class="outline-none border-slate-500 border-2 bg-white w-full p-2 rounded-2xl my-2">
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
                        <input type="text" name="winRate" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">
                        <label for="skinNum" class="block text-xl font-semibold my-2">Skin Number</label>
                        <label for="releaseYear" class="block text-xl font-semibold my-2">Release Year</label>
                        <input type="number" name="skinNum" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">              
                        <input type="number" name="releaseYear" class="outline-none border-slate-500 border-2 bg-white w-3/4 p-2 rounded-2xl my-2">
                    </div>             
                    <label for="heroPic" class="block text-xl font-semibold my-2">Profile Pic</label>
                    <input type="file" name="heroPic" id="heroPic" accept=".png, .jpg, .jpeg, .webp">
                    <br/><br/>
                    <div class="flex w-full justify-center">
                        <button type="submit" class="w-2/4 p-3 outline-none rounded-xl text-2xl text-slate-50 font-semibold bg-slate-500">Create</button>
                    </div>          
                </form> 
            </div>
        </div>
    </div>
</body>
</html>
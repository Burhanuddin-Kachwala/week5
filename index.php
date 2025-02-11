<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form action="index2.php" method="post" class="bg-white p-6 rounded shadow-md w-full max-w-sm space-y-4">
    <?php
    session_start();
    if(isset($_SESSION['login'])){
        $val="login";
    }else{
        $val="register";
    }    
    
?>
<h2 class="text-2xl text-center capitalize"><?= $val;?></h2>
        <div>
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div>
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div>
            <input type="submit" value="Submit" name=<?= $val;?> class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">
        </div>

        <?php
        if($val=="login"){
            
        ?>
        <div>
            <input type="submit" value="Logout" name='logout' class="w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">
        </div>
        <?php
    }
    ?>
    </form>

   
</body>
</html>

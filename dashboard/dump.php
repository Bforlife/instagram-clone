<?php

    require 'phpHeaderFiles.php';

foreach($posts as $countLike){
$countLike = $commentObj->countLike($countLike->id);
print_r($countLike);

}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="myid" ></div>
    


    <script>
     const el = document.getElementById('myid');
     el.innerHTML = 'This is dom';
    //  el.style.display="none";
    el.style="border:1px solid blue;background-color:yellow;color:black";
    </script>
</body>
</html>
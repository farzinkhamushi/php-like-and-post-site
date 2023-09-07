<?php
require("../clases/functions.php");
$uri = $_SERVER['REQUEST_URI'];
if($uri == '/photos/404/index.php'){
    redirect("/photos/404/");
    //require(' .... ');
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
    <div class="container">
        <p>Not found</p>
        <br>
        <p>Error 404</p>
    </div>
</body>
<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    body{
        width: 100%;
    }
    .container{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    p{
        font-size: 2rem;
        font-weight: bold;
        color: white;
        background-color: tomato;
        border-radius: 8px;
        padding: 8px;
    }
</style>
</html>


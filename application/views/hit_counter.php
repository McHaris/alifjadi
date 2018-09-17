<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HIt Counter</title>    
<style>
div.hita
{
	font-text:arial;
	background-color:black;color:white;width:100px; text-align:center;
}
div.hitb
{
	background-color:blue;color:white;width:100px;
}
</style>

</head>
<body>
<div class="hita">
<div class="hitb">
<h2>Visitor</h2>
</div> 
<h1><?php $count_my_page = ("hitcounter.txt"); $hits = file($count_my_page); $hits[0] ++; $fp = fopen($count_my_page , "w"); fputs($fp , "$hits[0]"); fclose($fp); echo $hits[0]; ?></h1>
</div>
  
 </body>
</html>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $count=0;

 while(!feof($f)) {
  $ch=fgetc($f);
if($ch=="A"||$ch=="E"||$ch=="I"||$ch=="O"||$ch=="U"||$ch=="a"||$ch=="e"||$ch=="i"||$ch=="o"||$ch=="u"){
$count++;
}
    
 }
 echo $count;
        ?>
    </body>
</html>

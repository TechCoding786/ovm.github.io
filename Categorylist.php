<?php
   session_start();
  $msg="";
    if(isset($_POST['t2']))
    {
        $cname=$_POST['t1'];
        $link= mysqli_connect("localhost","root","","votingdb");
        $qry = "insert into category(cname) values ('$cname')";
        mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)>0)
            $msg="record has been submited!!!";
        else 
            $msg="record has not been submitted";
            
        mysqli_close($link);
    }
        
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<doctype lang="html">
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="veiwport" content="width=divice-width,initial-scale=1"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#32a89d">
        <div class="container-fluid">
            <?php
               include("menubar.php");
            ?>
            <form method="POST">
            <div class="row">
                <div class="col-sm-6"style="color:white"><label><h2>Add New Category</h2></label> <hr>
                    <div class="row">
                        <div class="col-sm-6"><label>Category Name</label></div>
                         <div class="col-sm-6"><input class="form-control" required type="text" name="t1" value=""/></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3"><input type="submit" name="t2" value="Add Category"style="background-color:tomato"/></div>
                    </div> 
                </div>
                
                <div class="col-sm-6"style="color:white"><label><h2>Category List</h2></label><hr>
                    
                    <?php
                                $link = mysqli_connect("localhost","root","","votingdb");
                                $qry = "select* from category";
                                $resultset =  mysqli_query($link,$qry);
                                if(mysqli_num_rows($resultset)>0)
                                {
                                 echo"<div class='table-responsive'>";
                                 echo"<table class='table' border='2'>";                               
                                 echo"<tr style='color:yellow'>";
                                   echo"<th>Categoryid</th><th>category Name</th><th></th>";
                                 echo"</tr>";
                                 
                                 while($r = mysqli_fetch_array($resultset))
                                 {
                                   echo"<tr>"; 
                                   echo"<td>$r[0]</td>";
                                   echo"<td>$r[1]</td>";
                                   echo"<td><a class='btn btn-danger' href='deletecategory.php?id=$r[0]'>delete</a></td>";
                                   echo"</tr>";
                                 }
                                 echo"</table>";
                                 echo"</div>";
                                }
                                else{
                                    echo"<h2 style='color:red'>Error  Add category......</h2>";
                                }
                                mysqli_close($link);
                    ?>
                                   
                </div>
               
            </div>
                <?php
                     echo $msg;
                ?>
                </form>
        </div>    
        
    </body>
</html>

<?php
  session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
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
               <div class="row">
                <div class="col-sm-12"> 
                    <h2 style="color:white";>View Result</h2>
                    <hr style="height:3px; background-color:white"><br><!-- comment -->
                 
                 <div class="row">
                    <div class="col-sm-3"></div>
                      <div class="col-sm-6">
                       <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 form-label">Choose Election</label><!-- comment -->
                                <div class="col-sm-6">
                                    <select class="form-control" name="etype">
                                        <option>choose Election Type</option><!-- comment -->
                                        <?php
                                        $link = mysqli_connect("localhost","root","","votingdb");
                                        $qry = "select  * from election";
                                        $result = mysqli_query($link,$qry);
                                        while($r = mysqli_fetch_array($result))
                                        {
                                            echo "<option value='$r[0]'>$r[1]</option>";
                                        }
                                        mysqli_close($link);
                                        ?>
                                                
                                    </select>
                                </div>
                                     <div class="col-sm-3">
                                    <input type="submit" name="btnshow" value="show" class="btn btn-danger"/>
                                    </div> 
                            </div>
                           
                        </div>
                 </div>
                <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?php
                        if(isset($_POST['btnshow']))
                        {
                            $link=mysqli_connect("localhost","root","","votingdb");
                            $qry = "select x,y, cname from (Select count(voting_result.c_id) as x,(select c_name from candidate where c_id=voting_result.c_id) as y, (select cid from candidate where c_id=voting_result.c_id) as z from voting_result where pid=$_POST[etype] GROUP BY c_id) xy join category on category.cid=xy.z  ;";
  
                             $result = mysqli_query($link, $qry);
                            echo "<table class='table table-hover' style='background-color:white'>";
                            echo "<tr><th>Candidate Name</th><th>Total Votes</th><th>Category</th></tr>";
                            while($r = mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                echo "<td>$r[1]</td>";
                                echo "<td>$r[0]</td>";
                                echo"<td>$r[2]</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            mysqli_close($link);
                        }
                        ?>
                <div class="col-sm-4"></div>
            </div>
         </div>
     </div><!-- comment -->
    </div>
  </div>
    </body>
</html>

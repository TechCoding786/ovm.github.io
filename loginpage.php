<?php
    session_start();
   $msg="";
   if(isset($_POST['s1']))
   {
       $id = $_POST['t1'];
       $pwd = $_POST['t2'];
       $link =mysqli_connect("localhost","root","","votingdb");
       $qry ="select * from voter where voter_id =$id and voter_pwd='$pwd'";
       $result = mysqli_query($link,$qry);
       if(mysqli_num_rows($result)>0)
       {
           $r = mysqli_fetch_assoc($result);
           $_SESSION['uname']=$r['voter_name'];
           $_SESSION['utype']=$r['voter_type'];
           $_SESSION['vid']=$r['voter_id'];
           header("location:Cast_yourVote.php");
       }
       else{ 
           $msg ="<font color='red'>Invalid password and Username</font>";
       }
           mysqli_close($link);
       
   }
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
            <form method="post">
            <div class="row">
                <div class="col-sm-12"></div>
            </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6"style="color:white">
                        <label><h2>Online voting System</h2></label>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-sm-6" style="background-color:white;width:70%;color:black">
                        <p>In "ONLINE VOTING SYSTEM" a Voter can use his/her voting right online without any difficulty.He/She has to be registered first for him/her to vote.Registration is mainly done by the system administrator for security reasons. the System Administrator register the voter on a special site of the System visited by him only by simple filling a registration form to register voter.<br> After Registration,the Voter is assigned a secret Voter ID with which he/she can use to log into the system and enjoy services provide by the system such as voting. Ifinvalid/valid details are submitted, then the citizen is not Resgisterd to Vote.</p>
                    </div>                   
                </div>
               </div>
            <div class="col-sm-6"style="background-color:white;margin-top:100px;color:black">
                <div class="row">
                    <div class="col-sm-6"><label>Voter_ID</label></div><br>
                    <div class="col-sm-6"><input class="form-control" required type="number" name="t1" value=""/></div>
                </div>    
                <div class="row">
                    <div class="col-sm-6"><label>Password</label></div><br>
                    <div class="col-sm-6"><input class="form-control" required type="password" name="t2" value=""/></div>
                </div> 
                <div class="row">
                    <div class="col-sm-6"><label>Remember me</label></div>
                    <div class="col-sm-6"><input type="checkbox" name="t3" value=""/></div>
                </div>  
                 <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"><input type="submit" name="s1" value="login" style="background-color:blue"/></div>
                </div>    
                
                <?php echo $msg; ?>
                
            </div>
           </div> 
                </form>
        </div>     
    </body>
</html>

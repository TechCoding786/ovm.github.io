<?php
  session_start();
      $msg ="";
      if(isset($_POST['t4']))
      {
          $name=$_POST['t1'];
          $pwd=$_POST['t2'];
          $aadhar= $_POST['t3'];
          $gen=$_POST['g2'];
          $type=$_POST['t5'];
          $link = mysqli_connect("localhost","root","","votingdb");
          $qry ="insert into voter(voter_name,voter_pwd,voter_aadhar,voter_gender,voter_type)
              values('$name','$pwd',$aadhar,'$gen','$type')";
          mysqli_query($link,$qry);
          if(mysqli_affected_rows($link)>0)
              $msg ="Voter Register successfully !!!!";
          else {
              $msg ="Error in voter registration....";
          }
              mysqli_close($link);
              
         
      }
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<!doctype lang="html">
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <meta name="veiwport" content="width=divice-width,initial-scale=1"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
              function ValidateForm()
              {
                  flag= true;
                  pwd = document.getElementById("q1").value;
                  if(pwd.length<8){
                      flag = false;
                     document.getElementById("a1").innerHTML ="Password contain atleast 8 charecter";
                      
                  }
                  else if(pwd.length>=8)
                  {
                       alph=0;
                      digit=0;
                      symbol=0;
                      for(i=0;i<pwd.length;i++)
                      {
                          ch = pwd.charAt(i);
                        if((ch>='A' && ch<='Z')||(ch>='a' && ch<='z'))
                          alph++;
                        else if(ch>= '0' && ch<='9')
                           digit++;
                         else
                           symbol++;
                      }
                      if(digit>=1 && alph>=1 && symbol>=1)
                      {
                        document.getElementById("a1").innerHTML ="";  
                      }
                      else
                      {
                        document.getElementById("a1").innerHTML ="Password contain atleast 1 character 1 digit 1 Symbol";
                        flag = false;       
                      }    
                  }
                  else
                      document.getElementById("a1").innerHTML ="";
                  aadhar = document.getElementById("q2").value;
                  if(aadhar.length !=12){
                      document.getElementById("a2").innerHTML ="Invalid Adhar Number!!!";
                      flag = false;
                  }
                  else
                      document.getElementById("a2").innerHTML ="";
                  return flag;
              }
              function validateAadhar()
              {
                  id = document.getElementById("q2").value;
                  obj = new XMLHttpRequest();
                  obj.open("get","validateAadhar.php?t3="+id,true);
                  obj.send();
                  obj.onreadystatechange = function(){
                      if(obj.readyState==4 && obj.status==200)
                      {
                          document.getElementById("a2").innerHTML=obj.responseText;
                      }    
                  }
              }   
        </script>
    </head>
    <body style="background-color:#32a89d">
        <div class="container-fluid"style="color:white">
            <?php
               include("menubar.php");
            ?>
            <h2> New Voter Registration<hr></h2>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
	     <form class="form-horizontal" method="POST" onsubmit="return ValidateForm()">	
                     
                 
                    
                     <div class="form-group">
                          <div class="col-sm-4"><label>Name</label></div>
                          <div class="col-sm-8"><input class="form-control"  type="text" name="t1" value/></div>
                     </div>
                     <div class="form-group">
                          <div class="col-sm-4"><label>Password</label></div>
                          <div class="col-sm-8"><input id="q1" class="form-control"  type="password" name="t2" value=""/></div>
                                                <label id="a1" style="color:red"></label>
                     </div>
                     <div class="form-group">
                          <div class="col-sm-4"><label>Adhar Number</label></div>
                          <div class="col-sm-8"><input id="q2" onchange="validateAadhar()" class="form-control"  type="Number" name="t3" value=""/></div>
                                                <label id="a2" style="color:red"></label>
                     </div>
                     <div class="form-group">
                         <div class="col-sm-4"><label>Gender</label></div>
                         <div class="col-sm-8"><input  type="radio" name="g2" value="male" /><label>Male</label><input type="radio" name="g2" value="female" /><label>female</label></div>
                     <div class="form-group">
                          <div class="col-sm-4"></div>
                          <div class="col-sm-2"><input class="form-control" type="submit" name="t4" value="Register" style="background-color:red"/></div>
                     </div>
                         <div class="form-group">
                          <div class="col-sm-4"><label>User Type</label></div>
                          <div class="col-sm-8"><input class="form-control" type="text" name="t5" value=""/></div>
                     </div>
                         <br>
                        <?php echo $msg;?>
                      </div>   
                     </form>
                    </div>
                    </div>
                 </div>    
    </body>
</html>

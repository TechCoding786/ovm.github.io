<?php
    $aadhar = $_GET['t3'];
    $link = mysqli_connect("localhost","root","","votingdb");
    $qry = "select * from voter where voter_aadhar = $aadhar";
    $resultset = mysqli_query($link,$qry);
      if(mysqli_num_rows($resultset)==0)
                  echo "<font color='Green'>Available</font>";
      else 
            echo "<font color='red'>Already Exist!!!</font>"; 
    mysqli_close($link);        

?>



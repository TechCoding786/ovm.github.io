<?php
    $vid = $_GET['id'];
     $link = mysqli_connect("localhost","root","","votingdb");
     $qry = "delete from voter where voter_id=$vid";
     mysqli_query($link,$qry);
     mysqli_close($link);
     header("location:viewRegisterVoter.php");
?>


<?php
session_start();
$msg = "";
if (isset($_POST['t4'])) {
    $name = $_POST['t1'];
    $path = "";
    if ($_FILES['t2']['error'] == 0) {
        $from = $_FILES['t2']['tmp_name'];
        $to = $_SERVER['DOCUMENT_ROOT']."/E_voting/evoting/pics/".$_FILES['t2']['name'];
        move_uploaded_file($from,$to);
        $path = "pics/".$_FILES['t2']['name'];
    }
    $catg = $_POST['category'];
    $pid = $_POST['pid'];
    $link = mysqli_connect("localhost", "root", "", "votingdb");
    $qry = "insert into candidate(c_name,c_image,cid,pid) values('$name','$path',$catg,$pid)";
    mysqli_query($link, $qry);
    if (mysqli_affected_rows($link)>0)
        $msg = "candidate register successfully";
    else {
        $msg = "Error in registion";
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

            <div class="row">
                <div class="col-sm-6"><label><h2>Candidate Form</h2></label><hr>
                    <br>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>"/>

                        <div class="form-group">
                            <div class="col-sm-4"><label>Candidate Name</label></div>
                            <div class="col-sm-8"><input class="form-control" type="text" name="t1" values=""/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label>Candidate image</label></div>
                            <div class="col-sm-8"><input class="form-control" type="file" name="t2" values=""/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label>Select Category</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="category">
                                    <option>------</option>
                           <?php
                                   $link = mysqli_connect("localhost", "root", "", "votingdb");
                                   $qry = "select * from category";
                                   $resultset = mysqli_query($link, $qry);
                                   if (mysqli_num_rows($resultset)>0) 
                                   {
                                       while ($r = mysqli_fetch_array($resultset)) 
                                       {
                                              echo "<option value='$r[0]'>$r[1]</option>";
                                        }
                                    }
                                   mysqli_close($link);
                          ?>
                                </select>     
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2"><input style="background-color:red" class="form-control" type="submit" name="t4" values="save"/></div>
                        </div>       
                                   <?php echo $msg; ?>
                    </form>       
                </div>
                <div class="col-sm-6"><label><h2>veiw Candidate</h2></label><hr></div>
            </div>


        </div>

    </body>
</html>

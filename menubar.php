<div class="row">
            <nav class="navbar navbar-default " style="background-color:#fcad03";color:black">
                <div class="navbar-header"><label> e-voting
                        <?php
                           if(isset($_SESSION['uname']))
                           {
                               echo "welcome".$_SESSION['uname'];
                           }
                        ?>
                    </label> </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="loginpage.php">Home</a></li>
                    
                    
                    <?php
                      if(isset($_SESSION['utype']))
                      {
                         echo "<li><a href='Cast_yourVote.php'>Vote</a></li>";
                         if($_SESSION['utype']=='admin')
                         {
                                echo"<li class='dropdown'>";
                                echo"<a href='#' class='dropdown-toggle btn' data-toggle='dropdown'>Admin";
                                echo"<span class='caret'></span></a>";
                                echo"<ul class='dropdown-menu'>";
                                echo"<li><a href='categorylist.php'>Category List</a></li>";
                                echo"<li><a href='viewVoting.php'>voting List</a></li>";
                                echo"<li><a href='viewRegisterVoter.php'>View Voters</a></li>";
                                echo"<li><a href='AddNewVoter.php'>Add new Voter</a></li>";
                           
                                echo"</ul>";
                                echo"</li>";
                         }    
                      }             
                       ?>             
                     
                     
                    <li><a href="viewresult.php">View Result</a></li>
                    <?php
                         if(isset($_SESSION['uname']))
                         {  
                                  echo"<li><a href='logout.php'>Logout</a></li>";
                         }                    
                    ?>        
                </ul>   
            </nav>
          </div>
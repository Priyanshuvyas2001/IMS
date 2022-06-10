 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
       
            $q = "select * from tbl_permission_role where role_id='".$row1['group_id']."'";
            $ress=$conn->query($q);
           
             $name = array();
            while($row=mysqli_fetch_array($ress)){
          $sql = "select * from tbl_permission where id = '".$row['permission_id']."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
             array_push($name,$row1[1]);
             }
             $_SESSION['name']=$name;
             $useroles=$_SESSION['name'];

 ?>

 
        <div class="left-sidebar">
            
            <div class="scroll-sidebar">
                
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="index.php" aria-expanded="false"><i class="fa fa-window-maximize"></i>Dashboard</a>
                        </li>

                        <?php if(isset($useroles)){  if(in_array("manage_attendence",$useroles)){ ?> 
                         <!-- <li class="nav-label">Attendence</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-clock-o"></i><span class="hide-menu">Attendence Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_attendence",$useroles)){ ?> 
                                <li><a href="add_attendence.php">Attendence</a></li>
                            <?php } } ?>
                                <li><a href="view_attendence.php">View Attendence</a></li>
                               
                            </ul>
                        </li>
                    <?php } } ?>

                        <?php if(isset($useroles)){  if(in_array("manage_teacher",$useroles)){ ?> 
                         <!-- <li class="nav-label">Teacher</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Teacher Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_teacher",$useroles)){ ?> 
                                <li><a href="add_teacher.php">Add Teacher</a></li>
                            <?php } } ?>
                                <li><a href="view_teacher.php">View Teacher</a></li>
                            </ul>
                        </li>
                    <?php } } ?> 

                         <?php if(isset($useroles)){  if(in_array("manage_student",$useroles)){ ?> 
                         <!-- <li class="nav-label">Student</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Student Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_student",$useroles)){ ?> 
                                <li><a href="add_student.php">Add Student</a></li>
                            <?php } } ?>
                                <li><a href="view_student.php">View Student</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                         <?php if(isset($useroles)){  if(in_array("manage_subject",$useroles)){ ?> 
                         <!-- <li class="nav-label">Subject</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">Subject Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_subject",$useroles)){ ?> 
                                <li><a href="add_subject.php">Add Subject</a></li>
                            <?php } } ?>
                                <li><a href="view_subject.php">View Subject</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                      

                    

                     <?php if(isset($useroles)){  if(in_array("manage_class",$useroles)){ ?> 
                         <!-- <li class="nav-label">Class</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Class Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_class",$useroles)){ ?> 
                                <li><a href="add_class.php">Add Class</a></li>
                            <?php } } ?>
                                <li><a href="view_class.php">View Class</a></li>
                            </ul>
                        </li>
                    <?php } } ?>
                   
                    <?php if(isset($useroles)){  if(in_array("manage_class",$useroles)){ ?> 
                         <!-- <li class="nav-label">Class</li> -->
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-bank"></i><span class="hide-menu">Library Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_class",$useroles)){ ?> 
                                <li><a href="../Library/adminlogin.php">Admin/Librarian</a></li>
                            <?php } } ?>
                                <li><a href="../Library/index.php#ulogin">Student/Teacher</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                  <?php if(isset($useroles)){  if(in_array("manage_user",$useroles)){ ?> 
                         <li class="nav-label">Users</li> 
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">User Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_user",$useroles)){ ?> 
                                <li><a href="add_user.php">Add Users</a></li>
                            <?php } } ?>
                                <li><a href="view_user.php">View Users</a></li>
                            </ul>
                        </li>
                    <?php } } ?>

                    <?php if($_SESSION["username"]=='admin') { ?>
                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">User Permissions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="assign_role.php">assign role</a></li>
                               <li><a href="view_role.php">View Role</a></li>
                            </ul>
                        </li>

                         <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <?php //if($_SESSION["username"]=='user' || $_SESSION["username"]=='admin') { ?>
                               <li><a href="manage_website.php">Appearance Management</a></li>
                             <?php //} ?>
                              <li><a href="email_config.php">Email Management</a></li>
                               
                               <!--  <li><a href="sms_config.php">SMS Management</a></li> -->
                            </ul>
                        </li> 
                    <?php } ?>

                  <?php if(isset($useroles)){  if(in_array("manage_attendence",$useroles)){ ?> 
                         <li class="nav-label">Reports</li> 
                        <li>  <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu">Report Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php if(isset($useroles)){  if(in_array("add_attendence",$useroles)){ ?> 
                                <li><a href="today_attendence.php">Today's Attendence</a></li>
                            <?php } } ?>
                                <li><a href="report_attendence.php">Attendence Report</a></li>
                            </ul>
                        </li>
                    <?php } } ?>
                    <li class="nav-label">About</li> 
                        <li>  <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">About</span></a>
                            <ul aria-expanded="false" class="collapse">
                            
                            </ul>
                        </li>


    
                    </ul>   
                </nav>
               
?>
<a href="https://m.me/freelancer.from.india" target="_blank"class="float2"><link rel="stylesheet" ><i class="fab fa-facebook-messenger fa-7x" style="font-size:4em;"></i></a>
<div class="label-container2" id="hideMe"><div class="label-text2">Contact me by Messenger</div><i class="fa fa-play label-arrow2" ></i></div>
            </div>
           
        </div>
        
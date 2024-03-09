<?php

session_start();
$jsid=$_SESSION['jsid'];
include_once('../config.php');
$q1=mysqli_query($db1,"select * from application WHERE user_id=$jsid");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Applied Jobs</title>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
               
                <li class="active"><a href="#"> View Applied Job </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       
                        <li><a href="#">View Applied Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_selected.php">View Selected Jobs</a></li>
                    </ul>
                </li>
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<body>
<div class="container">
    <h3 class="text-center" style="margin-top: 50px; color: #265a88">You Applied for these jobs</h3>
    <div class='page-header' style='background:skyblue'></div>
     <?php if(mysqli_num_rows($q1)>0) { ?>

        <?php
        while($row=mysqli_fetch_array($q1)) {
			$i=1;
            $job_id=$row['job_id'];
            $q2=mysqli_query($db1,"select * from jobs where jobid = $job_id");
            while ( $result = mysqli_fetch_array($q2) ) {
				
                $comp=mysqli_query($db1,"select * from employer WHERE eid = $result[eid]");
                $rowcomp=mysqli_fetch_array($comp);
             
               
            
               echo "<h4> Employer: <a href='view_emp.php?id=".$rowcomp['eid']."'>".$rowcomp['ename']."</a></h4>";
               echo "<p>". substr($result['jobdesc'],0,120) ." .......</p>";
               echo "<h4>Job Posted on: " . $result['postdate'] ."</h4>";
               echo "<h4> Applied on: " . $row['date_applied']."</h4>";
                
            }
            echo "<hr style='background:blue;'>";
           $i=$i+1;
        }
        ?>
</table>
    <?php } else {  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt applied for any jobs yet!</p>
        </div> </div>";
        }
     ?>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../location/location.js"></script>
</html>

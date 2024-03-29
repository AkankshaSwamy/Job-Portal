<?php

session_start();
include_once('../config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selected Jobs</title>
    

    <title>View Employer</title>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
               
                <li class="active"><a href="#"> Selected Jobs </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      
                        <li><a href="view_applied.php">View Applied Jobs</a></li>
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
</div>
<body>
<div class="container">
    <h3 class="text-center" style="margin-top: 50px;">You have got selection for these job</h3>
   
    <div class="page-header" style="background: midnightblue"></div>
        <?php
        $q=mysqli_query($db1,"select * from selection where user_id=$_SESSION[jsid]");
        if(mysqli_num_rows($q)==0){
            echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You are not selected for any jobs yet!</p>
        </div> </div>";
        }
        else {
            echo "<table class=' table'> <th style='width:150px'>Employer</th><th>Job Title</th><th>Job Detail</th><th>Selection Date</th><th>Action</th>";
            while ($qrow = mysqli_fetch_array($q)) {
                $qdet=mysqli_query($db1,"select * from jobs where jobid=$qrow[job_id]");
                $jdet=mysqli_fetch_array($qdet);
                $qcom=mysqli_query($db1,"select * from employer where eid=$jdet[eid]");
                $com=mysqli_fetch_array($qcom);
                echo "<tr>";
                echo "<td> <a href='view_emp.php?id=".$com['eid']."'>".$com['ename']."</a>";
                echo "<td><a  href='view_jobs.php?jid=" . $jdet['jobid'] . "'>".$jdet['title']."</td>";
                echo "<td>".substr($jdet['jobdesc'],0,120)."........</td>";
                echo "<td>".$qrow['date']."</td>";
               
            }
        }
        ?>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>

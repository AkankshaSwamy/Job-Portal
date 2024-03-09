<?php
include_once('../config.php');

// Data retrieved begins here
$email = $_POST['email'];
$password = $_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['name'];
$phone = $_POST['phone'];
$experience = $_POST['experience'];
$skills = $_POST['skills'];
$ug = $_POST['ugcourse'];
$pg = $_POST['pgcourse'];
$countryid = $_POST['country'];
$stateid = $_POST['state'];
$cityid = $_POST['city'];
$type = "jobseeker";

mysqli_select_db($db2,"location");

$query1=mysqli_query($db2,"select name from countries WHERE id = '$countryid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query1);
$country= $row['name'];

$query2=mysqli_query($db2,"select name from states WHERE id = '$stateid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query2);
$state= $row['name'];
//echo $state;

$query3=mysqli_query($db2,"select name from cities WHERE id = '$cityid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query3);
$city= $row['name'];

$location=$country.",".$state.",".$city;



// Insert data into the login table
$query4 = "INSERT INTO login (email, password, usertype, status) VALUES ('$email', '$hash', '$type', 1)";
    $result1 = mysqli_query($db1,$query4) or die("Cant Register , The user email may be already existing");
// Get the log_id of the inserted row

// Insert data into the jobseeker table
$query5 = "INSERT INTO jobseeker (log_id, name, phone, location, experience, skills, basic_edu, master_edu)
           VALUES ((SELECT log_id FROM login WHERE email='$email'), '$name', '$phone', '$location', '$experience', '$skills', '$ug', '$pg')";

if (!mysqli_query($db1, $query5)) {
    echo("Error description: " . mysqli_error($db1));
} else {
    header('location:index.php?msg=registered');
}
?>

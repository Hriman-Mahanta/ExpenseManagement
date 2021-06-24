<?php
require "common.php";
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];
$select_query="SELECT id FROM users WHERE email='$email'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
if(mysqli_num_rows($select_query_result)>0)
{
    echo "<script>alert('Email Already Exists')</script>";
    echo "<script>location.href='../signup.php'</script>";
}
else
{
    $insert_query="INSERT INTO users(name,email,password,phone) VALUES('$name','$email','$password','$phone')";
    $user_registration_submit=mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $_SESSION['userid']= mysqli_insert_id($con);
    echo "<script>location.href='../homepage.php'</script>";
}
?>
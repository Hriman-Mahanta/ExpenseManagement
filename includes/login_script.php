<?php
require "common.php";
$email = $_POST['email'];
$password = md5($_POST['password']);
$select_query="SELECT id, password FROM users WHERE email='$email'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
if(mysqli_num_rows($select_query_result)==0)
{
    echo "<script>alert('You are not registered. Please Sign Up.')</script>";
    echo "<script>location.href='../signup.php'</script>";
}
else if($password!=$row['password'])
{
    echo "<script>alert('Your entered password is incorrect')</script>";
    echo "<script>location.href='../login.php'</script>";
}
else    
{
    $_SESSION['userid']= $row['id'];
    echo "<script>location.href='../homepage.php'</script>";
}
?>
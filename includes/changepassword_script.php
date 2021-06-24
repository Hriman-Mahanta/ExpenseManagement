<?php
require "common.php";
$oldpassword = md5($_POST['oldpassword']);
$newpassword = md5($_POST['newpassword']);
$confirmpassword = md5($_POST['confirmpassword']);
$select_query="SELECT password FROM users WHERE password='$oldpassword'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
if(mysqli_num_rows($select_query_result)==0)
{
    echo "<script>alert('Please enter your old password correctly')</script>";
    echo "<script>location.href='../changepassword.php'</script>";
}
else if($newpassword!=$confirmpassword)
{
    echo "<script>alert('Please re-enter your new password correctly')</script>";
    echo "<script>location.href='../changepassword.php'</script>";
}
else    
{
    $update_query="UPDATE users SET password='$newpassword' WHERE password='$oldpassword'";
    $update_query_result= mysqli_query($con, $update_query) or die(mysqli_error($con));
    echo "<script>location.href='../homepage.php'</script>";
}
?>
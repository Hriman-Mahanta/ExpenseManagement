<?php
require "common.php";
$title = $_POST['title'];
$from = $_POST['from'];
$to = $_POST['to'];
$plan_id=$_SESSION['planid'];
$update_query="UPDATE plans SET title='$title', from_date='$from', to_date='$to' WHERE id='$plan_id'";
$update_query_result=mysqli_query($con, $update_query) or die(mysqli_error($con));
$select_query="SELECT number_of_people from plans WHERE id='$plan_id'";
$select_query_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$numberofpeople=$row['number_of_people'];
$person=$_POST['person'];
for($i=1;$i<=$numberofpeople;$i++)
{
    $j=$i-1;
    $update_query2="UPDATE plans SET person$i='$person[$j]' WHERE id='$plan_id'";
    $update_query_result2=mysqli_query($con, $update_query2) or die(mysqli_error($con));
}
echo "<script>location.href='../homepage.php'</script>";
?>
<?php
require "common.php";
$initialbudget = $_POST['initialbudget'];
$numberofpeople = $_POST['numberofpeople'];
if($numberofpeople<0 || $initialbudget<0)
{
    echo "<script>alert('Please enter positive numbers')</script>";
}
else
{
    $user_id=$_SESSION['userid'];
    $insert_query="INSERT INTO plans(initial_budget, number_of_people, remaining_amount) VALUES('$initialbudget','$numberofpeople','$initialbudget')";
    $insert_query_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $_SESSION['planid']= mysqli_insert_id($con);
    $plan_id=mysqli_insert_id($con);
    $insert_query2="INSERT INTO users_plans(user_id, plan_id) VALUES('$user_id','$plan_id')";
    $insert_query_result2=mysqli_query($con, $insert_query2) or die(mysqli_error($con));
    echo "<script>location.href='../plandetails.php'</script>";
}
?>
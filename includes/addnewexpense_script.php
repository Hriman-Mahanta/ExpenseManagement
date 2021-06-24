<?php
require "common.php";
$title = $_POST['title'];
$date = $_POST['date'];
$amount_spent = $_POST['amountspent'];
$select = $_POST['select'];
$plan_id=$_SESSION['planid'];
$insert_query="INSERT INTO expenses(expense_name, date, amount_spent, member) VALUES('$title','$date','$amount_spent','$select')";
$insert_query_result=mysqli_query($con, $insert_query) or die(mysqli_error($con));
$_SESSION['expenseid']= mysqli_insert_id($con);
$_SESSION['amountspent']= $amount_spent;
$expense_id= mysqli_insert_id($con);
$insert_query2="INSERT INTO plans_expenses(plan_id,expense_id) VALUES('$plan_id','$expense_id')";
$insert_query_result2=mysqli_query($con, $insert_query2) or die(mysqli_error($con));

function GetImageExtension ($imagetype)
{
    if (empty($imagetype)) 
        return false ;
    switch ($imagetype)
    {
        case 'image/bmp' : return '.bmp' ;
        case 'image/gif' : return '.gif' ;
        case 'image/jpeg' : return '.jpg' ;
        case 'image/png' : return '.png' ;
        default : return false ;
    }
}

if(!empty($_FILES[ "uploadedimage" ][ "name" ])) 
{
    $file_name=$_FILES[ "uploadedimage" ][ "name" ];
    $temp_name=$_FILES[ "uploadedimage" ][ "tmp_name" ];
    $imgtype=$_FILES[ "uploadedimage" ][ "type" ];
    $ext= GetImageExtension($imgtype);
    $imagename=date( "d-m-Y" ). "-" .time().$ext;
    $target_path = "img/" .$imagename;
    if (move_uploaded_file($temp_name, $target_path))
    {
        $insert_query3="INSERT INTO expenses(image) VALUES('$temp_name')";
        $insert_query_result3=mysqli_query($con, $insert_query3) or die(mysqli_error($con));
    }
}
echo "<script>location.href='../viewplan.php'</script>";
?>
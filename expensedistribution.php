<?php
require "includes/common.php";
$user_id=$_SESSION['userid'];
$select_query="SELECT plan_id FROM users_plans WHERE user_id='$user_id'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$plan_id=$row['plan_id'];
$select_query2="SELECT initial_budget, number_of_people, remaining_amount, title, from_date, to_date,person1, person2,person3,person4,person5,person6 FROM plans WHERE id='$plan_id'";
$select_query_result2= mysqli_query($con, $select_query2) or die(mysqli_error($con));
$numberofrows=mysqli_num_rows($select_query_result2);
$row2=mysqli_fetch_array($select_query_result2);
$select_from_date=$row2['from_date'];
$from_date=date_create($select_from_date);
$select_to_date=$row2['to_date'];
$to_date=date_create($select_to_date);
$numberofpeople=$row2['number_of_people'];
$select_query3="SELECT expense_id FROM plans_expenses WHERE plan_id='$plan_id'";
$select_query_result3= mysqli_query($con, $select_query3) or die(mysqli_error($con));
$numberofrows3=mysqli_num_rows($select_query_result3);
$row3=mysqli_fetch_array($select_query_result3);
$expense_id=$row3['expense_id'];
$select_query4="SELECT expense_name,date,amount_spent,member FROM expenses WHERE id='$expense_id'";
$select_query_result4= mysqli_query($con, $select_query4) or die(mysqli_error($con));
$row4=mysqli_fetch_array($select_query_result4);
$total_amount=0;
$amountspent=$_SESSION['amountspent'];
$total_amount+=$amountspent;
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Expense Distribution</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <?php
        include "includes/header.php";
        ?>
        <div class="container ">
            <div class="margin_row">
                <center>
                    <div class="panel panel-primary panel-custom" style="width: 60%">
                        <div class="panel-heading">
                            <center>
                                <h3><?php echo $row2['title']?><span class="glyphicon glyphicon-user" style="float: right"><?php echo $row2['number_of_people']?></span></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p style="float: left"><b>Initial Budget</b></p>
                                <p style="float: right">&#8377; <?php echo $row2['initial_budget']?></p>
                            </div>
                            <br><br>
                            <?php for($i=1;$i<=$numberofpeople;$i++)
                            { ?>
                            <div>
                                <p style="float: left"><b><?php echo $row2["person$i"]?></b></p>
                                <p style="float: right">&#8377; <?php echo 0?></p>
                            </div>
                            <br><br>
                            <?php } ?>
                            <div>
                                <p style="float: left"><b>Total amount spent</b></p>
                                <p style="float: right">&#8377; <?php echo $total_amount?></p>
                            </div>
                            <br><br>
                            <div>
                                <p style="float: left"><b>Remaining Amount</b></p>
                                <p style="float: right; color: green">&#8377; <?php echo $row2['initial_budget']-$total_amount?></p>
                            </div>
                            <br><br>
                            <div>
                                <p style="float: left"><b>Individual Shares</b></p>
                                <p style="float: right">&#8377; <?php echo $total_amount/$numberofpeople?></p>
                            </div>
                            <br><br>
                            <?php for($i=1;$i<=$numberofpeople;$i++)
                            { ?>
                            <div>
                                <p style="float: left"><b><?php echo $row2["person$i"]?></b></p>
                                <p style="float: right">&#8377; <?php echo 0?></p>
                            </div>
                            <br><br>
                            <?php } ?>
                            <a href="viewplan.php"><button class="btn btn-custom"><span class="glyphicon glyphicon-arrow-left"></span> Go back</button></a>
                        </div>
                </div>
                </center>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </body>
</html>
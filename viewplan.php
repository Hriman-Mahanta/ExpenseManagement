<?php
require "includes/common.php";
$user_id=$_SESSION['userid'];
$select_query="SELECT plan_id FROM users_plans WHERE user_id='$user_id'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$plan_id=$row['plan_id'];
$select_query2="SELECT initial_budget, number_of_people, title, remaining_amount, from_date, to_date, person1, person2, person3, person4, person5, person6 FROM plans WHERE id='$plan_id'";
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
$numberofrows2=mysqli_num_rows($select_query_result3);
?>
<!DOCTYPE html>

<html>
    <head>
        <title>View Plan</title>
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
        <div class="container">
            <div class="margin_row">
                <div class="panel panel-primary panel-custom" style="float: left; width: 50%">
                        <div class="panel-heading">
                            <center>
                                <h3><?php echo $row2['title']?><span class="glyphicon glyphicon-user" style="float: right"><?php echo $row2['number_of_people']?></span></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p style="float: left"><b>Budget</b></p>
                                <p style="float: right">&#8377; <?php echo $row2['initial_budget']?></p>
                            </div>
                            <br><br>
                            <div>
                                <p style="float: left"><b>Remaining Amount</b></p>
                                <p style="float: right">&#8377; <?php echo $row2['remaining_amount']?></p>
                            </div>
                            <br><br>
                            <div>
                                <p style="float: left"><b>Date</b></p>
                                <p style="float: right"><?php echo date_format($from_date,'d/m/Y')."-".date_format($to_date,'d/m/Y')?></p>
                            </div>
                        </div>
                </div>
                <div style="float: right; margin-right: 180px;" class="margin_row">
                    <a href="expensedistribution.php"><button class="btn btn-block btn-custom">Expense Distribution</button></a>
                </div>
            </div>
        </div>
        <div class="container margin_bottom">
            <?php 
            for($i=1;$i<=$numberofrows2;$i++)
            { ?>
            <div class="panel panel-primary panel-custom" style="float: left; width: 25%; margin: 10px;">
                <?php
                $row3=mysqli_fetch_array($select_query_result3);
                $expense_id=$row3['expense_id'];
                $select_query4="SELECT expense_name,date,amount_spent,member FROM expenses WHERE id='$expense_id'";
                $select_query_result4= mysqli_query($con, $select_query4) or die(mysqli_error($con));
                $row4=mysqli_fetch_array($select_query_result4);
                ?>
                <div class="panel-heading">
                    <center>
                    <h3><?php echo $row4['expense_name']?></h3>
                    </center>
                </div>
                <div class="panel-body">
                    <div>
                        <p style="float: left"><b>Amount</b></p>
                        <p style="float: right">&#8377; <?php echo $row4['amount_spent']?></p>
                    </div>
                    <br><br>
                    <div>
                        <p style="float: left"><b>Paid by</b></p>
                        <p style="float: right"><?php echo $row4['member']?></p>
                    </div>
                    <br><br>
                    <div>
                        <p style="float: left"><b>Paid on</b></p>
                        <p style="float: right"><?php echo $select_date=$row4['date'];
                                                           $date=date_create($select_date);
                                                           date_format($date,'d/m/Y');?></p>
                    </div>
                    <br><br>
                    <div>
                    <?php 
                    if($numberofrows!=0)
                    { ?>
                        <center>You Don't have bill</center>
                    <?php }
                    else
                    { ?>
                        <center><a href="">Show Bill</a></center>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="panel panel-primary panel-custom" style="float: right">
                <div class="panel-heading">
                    <center>
                        <h3>Add New Expense</h3>
                    </center>
                </div>
                <div class="panel-body">
                    <form method="post" action="includes/addnewexpense_script.php">
                        <div class="form-group">
                            <b>Title</b>
                            <input type="text" class="form-control" name="title" placeholder="Expense Name" required="true">
                        </div>
                        <div class="form-group">
                            <b>Date</b>
                            <input type="date" class="form-control" name="date" required="true" min="<?php echo $row2['from_date']?>" max="<?php echo $row2['to_date']?>">
                        </div>
                        <div class="form-group">
                            <b>Amount Spent</b>
                            <input type="number" class="form-control" name="amountspent" placeholder="Amount Spent" required="true">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="select">
                                <?php for($i=1;$i<=$numberofpeople;$i++)
                                { ?>
                                    <option><?php echo $row2["person$i"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <b>Upload Bill</b>
                            <input type="file" class="form-control" name="uploadedimage">
                        </div>
                        <button class="btn btn-info btn-block">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </body>
</html>

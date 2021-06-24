<?php
require "includes/common.php";
$user_id=$_SESSION['userid'];
$select_query="SELECT plan_id FROM users_plans WHERE user_id='$user_id'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$numberofrows=mysqli_num_rows($select_query_result);
$row=mysqli_fetch_array($select_query_result);
$plan_id=$row['plan_id'];
$select_query2="SELECT initial_budget, number_of_people, title, from_date, to_date FROM plans WHERE id='$plan_id'";
$select_query_result2= mysqli_query($con, $select_query2) or die(mysqli_error($con));
$numberofrows2=mysqli_num_rows($select_query_result2);
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Home Page</title>
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
        <?php 
        if($numberofrows2==0)
        { ?>
        <div class="container ">
            <div class="margin_row">
                <h2>You don't have any active plans</h2>
                <center>
                    <div class="panel panel-default panel-custom">
                        <div class="text-margin">
                            <p><a href="createnewplan"><span class="glyphicon glyphicon-plus-sign"></span> Create a New Plan</a></p>
                        </div>
                    </div>
                </center>
            </div>
        </div>
        <?php }
        else
        { ?>
        <div class="container ">
            <div class="margin_row margin_bottom">
                <h2>Your Plans</h2>
                <?php 
                mysqli_data_seek($select_query_result, 0);
                for($i=1;$i<=$numberofrows;$i++)
                { ?>
                    <div class="panel panel-primary panel-custom" style="float: left; width: 25%; margin: 10px">
                        <?php 
                        $row=mysqli_fetch_array($select_query_result);
                        $plan_id=$row['plan_id'];
                        $select_query2="SELECT initial_budget, number_of_people, title, from_date, to_date FROM plans WHERE id='$plan_id'";
                        $select_query_result2= mysqli_query($con, $select_query2) or die(mysqli_error($con));
                        $row2=mysqli_fetch_array($select_query_result2); ?>
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
                                <p style="float: left"><b>Date</b></p>
                                <p style="float: right"><?php $select_from_date=$row2['from_date'];
                                                              $from_date=date_create($select_from_date);
                                                              $select_to_date=$row2['to_date'];
                                                              $to_date=date_create($select_to_date);
                                                              echo date_format($from_date,'d/m/Y')."-".date_format($to_date,'d/m/Y');?></p>
                            </div>
                            <a href="viewplan.php"><button class="btn btn-block btn-custom">View Plan</button></a>
                        </div>
                    </div>
                <?php } ?>
                <hr>
            </div>
            <div class="container-bottom fixed-button">
            <h1><a href="createnewplan.php"><span class="glyphicon glyphicon-plus-sign"></span></a></h1>
        </div>
        <?php } ?>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </body>
</html>
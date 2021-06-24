<?php
require "includes/common.php";
$plan_id=$_SESSION['planid'];
$select_query="SELECT initial_budget, number_of_people FROM plans WHERE id='$plan_id'";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Plan Details</title>
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
            <center>
            <div class="margin">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="includes/plandetails_script.php">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Title</b>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title (Ex. Trip to Goa)" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <b>From</b>
                                    <input type="date" class="form-control" name="from" required="true">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <b>To</b>
                                    <input type="date" class="form-control" name="to" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <b>Initial Budget</b>
                                    <input type="number" class="form-control" name="initialbudget"  placeholder="<?php echo $row['initial_budget'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <b>No. of people</b>
                                    <input type="number" class="form-control" name="numberofpeople" placeholder="<?php echo $row['number_of_people'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php while(1) { ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 1</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 1 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==1)
                                   break;
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 2</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 2 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==2)
                                   break;
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 3</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 3 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==3)
                                   break;
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 4</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 4 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==4)
                                   break;
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 5</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 5 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==5)
                                   break;
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <b>Person 6</b>
                                    <input type="text" class="form-control" name="person[]" placeholder="Person 6 Name" required="true">
                                </div>
                            </div>
                        </div>
                        <?php if($row['number_of_people']==6)
                                   break;
                        ?>
                        <?php } ?>
                        <button class="btn btn-block btn-custom">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            </center>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </body>
</html>

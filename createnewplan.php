<?php
require "includes/common.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Create New Plan</title>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <center>
                            <b>Create New Plan</b>
                        </center>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="includes/createnewplan_script.php">
                            <div class="form-group">
                                <b>Initial Budget</b>
                                <input type="number" class="form-control" name="initialbudget" placeholder="Initial Budget (Ex. 4000)" required="true">
                            </div>
                            <div class="form-group">
                                <b>How many peoples you want to add in your group?</b>
                                <input type="number" class="form-control" name="numberofpeople" placeholder="No. of people (Max. 6 people)" required="true">
                            </div>
                            <button class="btn btn-block btn-custom">Next</button>
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

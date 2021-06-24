<?php
require "includes/common.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Change Password</title>
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
            <center>
                <div class="margin">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>
                            <h2>Change Password</h2>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="includes/changepassword_script.php">
                            <div class="form-group">
                                <b>Old Password</b>
                                <input type="text" class="form-control" name="oldpassword" placeholder="Old Password" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <b>New Password</b>
                                <input type="text" class="form-control" name="newpassword" placeholder="New Password (Min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <b>Confirm New Password</b>
                                <input type="text" class="form-control" name="confirmpassword" placeholder="Re-type New Password" required="true" pattern=".{6,}">
                            </div>
                            <button class="btn btn-info btn-block">Change</button>
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
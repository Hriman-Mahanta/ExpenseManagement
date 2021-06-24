
<!DOCTYPE html>

<html>
    <head>
        <title>Sign Up</title>
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
                            <h2><b>Sign Up</b></h2>
                            </center>
                        </div>
                        <div class="panel-body">
                        <form method="post" action="includes/signup_script.php">
                            <div class="form-group">
                                <b>Name:</b>
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <b>Email:</b>
                                <input type="text" class="form-control" name="email" placeholder="Enter Valid Email" required="true" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
                            </div>
                            <div class="form-group">
                                <b>Password:</b>
                                <input type="text" class="form-control" name="password" placeholder="Password (Min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <b>Phone Number:</b>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter Valid Phone Number (Ex: 8448444853)" required="true" pattern="^\d{10}$">
                            </div>
                        <button class="btn btn-block btn-info">Sign Up</button>
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

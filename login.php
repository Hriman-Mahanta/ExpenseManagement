
<!DOCTYPE html>

<html>
    <head>
        <title>Log In</title>
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
                            <h2>Login</h2>
                            </center>
                        </div>
                        <div class="panel-body">
                        <form method="post" action="includes/login_script.php">
                            <div class="form-group">
                                <b>Email:</b>
                                <input type="text" class="form-control" name="email" placeholder="Email" required="true" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
                            </div>
                            <div class="form-group">
                                <b>Password:</b>
                                <input type="text" class="form-control" name="password" placeholder="Password" required="true" pattern=".{6,}">
                            </div>
                            <button class="btn btn-info btn-block">Login</button>
                        </form>
                        </div>
                        <div class="panel-footer">
                            <p>Don't have an account? <a href="signup.php">Click here to Sign Up</a></p>
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

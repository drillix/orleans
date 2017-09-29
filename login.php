<?php
/**
 * Created by PhpStorm.
 * User: drillix
 * Date: 9/22/2017
 * Time: 11:58 AM
 */

    ob_start();
    session_start();

    $db = mysqli_connect("localhost","root","","mimi");

$message="";

if ( isset($_SESSION['user_id'])!="" ) {
    header("Location: login.php");
    exit;
}
if(!empty($_POST["login"])) {

        $query = mysqli_query($db,"SELECT id,email,password FROM staff WHERE email='". $_POST["email"] ."' and password = '". $_POST["password"]."'"); // Table name, Column Names, WHERE conditions, ORDER BY conditions
        $res   = mysqli_fetch_array($query);

        if($res) {
            $_SESSION["user_id"] = $res['id'];

            header('location:index.php');
        } else {
            $message = "Invalid Username or Password!";
        }

    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form action="login.php" method="post">
                        <fieldset>
                            <p class="alert-danger"><?php if(isset($message)) { echo $message; } ?></p>
                            <br>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="login" name="login" class="btn btn-sm btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="assets/metisMenu/metisMenu.min.js"></script>

<script src="assets/toastr/js/toastr.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php ob_flush();?>
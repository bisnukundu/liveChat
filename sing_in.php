<?php
include_once("functions.php");
if (isset($_SESSION["email_s"])) {
    header("location:index.php");
}
include_once("header.php");
if (isset($_REQUEST["sing_in"])) {
    $email = $_REQUEST["email"];
    $passowrd = $_REQUEST["password"];
    if ($email == "" || $passowrd == "") {
        $msg = "Please Enter your Email and Password";
    } else {
        $check = new Main_Functions();
        $check->Login($email, $passowrd);
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-8 h-100 m-auto">
            <form class="mt-5" action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="row">
                    <div class="col-6"> <button type="submit" class="btn btn-primary btn-block" name="sing_in">Sing In</button></div>
                    <div class="col-6"><a href="sing_up.php" class="btn btn-danger btn-block" name="sing_up">Sing Up</a></div>
                </div>


            </form>
            <?php
            if (isset($msg)) { ?>
                <div class="alert alert-primary mt-5" role="alert">
                    <?php echo $msg; ?>
                </div>

            <?php   }
            ?>
        </div>
    </div>
</div>
<?php
include_once("footer.php");
?>
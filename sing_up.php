<?php 
    include_once("header.php");
    include_once("functions.php");
    
    if(isset($_REQUEST["sing_up"])){
        $fname = $_REQUEST["fname"];
        $lname = $_REQUEST["lname"];
        $email = $_REQUEST["email"];
        $passbk = $_REQUEST["password"] ;
        if($fname == "" || $lname == "" || $email== "" || $password =""){
            echo "Filup this Fill";
        }else{
            $create_data = new Main_Functions();
            $create_data->Create_users($fname,$lname,$passbk,$email); 
        }
        
    }

?>
<div class="container">
        <div class="row">
            <div class="col-8 h-100 m-auto">
                <form class="mt-5" action="" method="POST">
                <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control" id="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" class="form-control" id="lname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="row">
                        <div class="col-6"> <a href="sing_in.php" class="btn btn-primary btn-block" name="sing_in">Sing In</a></div>
                        <div class="col-6"><button type="submit" class="btn btn-danger btn-block" name="sing_up">Sing Up</button></div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <?php 
    include_once("footer.php");
?>
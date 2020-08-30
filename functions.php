<?php
session_start();
class Main_Functions
{
    private  $conn;
    function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=livechate", "root", "");
        if (!$this->conn) {
            echo "Database problem";
            die();
        }
    }
    //Create_users function
    function Create_users($fname, $lname, $password, $email)
    {
        $insert = "insert into user (fname,lname,password,email) values (?,?,?,?)";
        $create_user = $this->conn->prepare($insert);
        $check_email_query = "select * from user where email=?";
        $check_email = $this->conn->prepare($check_email_query);
        $check_email->execute([$email]);
        $e_mail = $check_email->fetch(PDO::FETCH_ASSOC);
        if ($e_mail["email"] != $email) {
            if ($create_user->execute([$fname, $lname, password_hash($password, PASSWORD_DEFAULT), $email])) {
                echo "Data Create Successfully";
                header("location:sing_in.php");
            }
        }else{
            echo "This email is used";
        }
    }

    //Login function
    function Login($user_email, $user_password)
    {
        $show_query = "select * from user where email=?";
        $show = $this->conn->prepare($show_query);
        $show->bindParam(1, $user_email);
        $show->execute();
        if ($show->rowCount() > 0) {
            $data = $show->fetch(PDO::FETCH_ASSOC);
            if (password_verify($user_password, $data["password"])) {
                echo "Login successfully";
                $_SESSION['email_s'] = $data["email"];
                $online_update_query = "update user set is_login =? where email = ?";
                $online_update = $this->conn->prepare($online_update_query);
                $online = "online";
                $online_update->execute([$online, $data["email"]]);
                header("location:index.php");
            } else {
                echo "Password not matching";
            }
        }
    }
};

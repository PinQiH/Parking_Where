<?php
    header("Content-Type:text/html; charset=utf-8");

    //處理註冊
    $conn=require_once("../config.php");


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $nickname=$_POST["nickname"]; 
        
        $phone=$_POST["phone"];
        
        $email=$_POST["email"];
        
        $password=$_POST["password"];
        
        //檢查帳號是否重複
        $check="SELECT * FROM User WHERE email='".$email."'";
        
        if(mysqli_num_rows(mysqli_query($conn,$check))==0)
        {
            $sql="INSERT INTO User (nickname, phone, email, password) VALUES('".$nickname."','".$phone."','".$email."','".$password."')";            
            if(mysqli_query($conn, $sql))
            {
                echo "<script>alert('註冊成功!');
                        window.location.href='../登入/登入.html';
                      </script>";
            }
            else
            {
                echo "<script>alert('Error!');
                        window.location.href='./註冊.html';    
                      </script>";  
                mysqli_error($conn);
            }
        }
        else
        {
            echo "<script>alert('該帳號已有人使用!');
                    window.location.href='./註冊.html';
                  </script>";
        }
        $sql1="select user_id from user where nickname=$nickname";
        $result1=mysqli_query($conn, $sql1);
        while ($record1= mysqli_fetch_row($result1))
        {
            $sql2="INSERT INTO Favorite (user_id) VALUES('".$record1[0]."')";
            mysqli_query($conn, $sql2);
        }
    }
    mysqli_close($conn);    
?>
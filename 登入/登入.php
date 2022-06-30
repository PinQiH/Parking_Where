<?php
    header("Content-Type:text/html; charset=utf-8");

    //處理登入
    // Include config file
    $conn=require_once("../config.php");

    // Define variables and initialize with empty values
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);

    //增加hash可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $sql = "select * from User where email = ? and password = ?";
        
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss',$email,$password);
        $stmt->execute();
        $stmt->bind_result($user_id,$password,$nickname,$email,$phone,$authority,$point,$icon_id,$icon_loot);
       
        if($stmt->fetch())
        {               
            if (session_status() == PHP_SESSION_NONE) 
            {
                session_start();
            }
            $_SESSION["loggedin"] = true;
            $_SESSION["nickname"] = $nickname;
            $_SESSION["authority"] = $authority;
            $_SESSION["email"] = $email;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["phone"] = $phone;
            $_SESSION["point"] = $point;
            $_SESSION["icon_id"] = $icon_id;
            // $_SESSION["icon_loot"] = $icon_loot;
            //echo $_SESSION["nickname"]."<br>".$_SESSION["authority"]."<br>".$_SESSION["email"];
            header("location:../首頁/首頁(1.1.1).php");       
        }
        else
        {
            function_alert("Something wrong"); 
        }        
    }
    else
    {
        function_alert("Something wrong"); 
    }

    // Close connection
    mysqli_close($link);

    function function_alert($message) 
    {        
        // Display the alert box  
        echo "<script>alert('$message');
        window.location.href='../登入/登入.html';
        </script>"; 
        return false;
    } 
?>

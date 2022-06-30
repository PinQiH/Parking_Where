<?php
        header("Content-Type:text/html; charset=utf-8");
        if (session_status() === PHP_SESSION_NONE) 
        {
                session_start();
        }

        if (isset($_SESSION["user_id"]))
        {
                $user_id = $_SESSION["user_id"];
                $authority = $_SESSION["authority"];
        }

        $conn=require_once("../../config.php");

        $sql="select `point`, `authority` from user where `user_id`='$user_id'";
        $result = mysqli_query($conn,$sql);
        while ($record = mysqli_fetch_row($result))
        {
                $record[0] -= 50;
                if ($record[0] < 0)
                {
                        echo "<script>alert('點數不足！');
                                window.location.href='../../點數/確認點數(3.1.1)/確認點數(3.1.1).php';
                　　　        </script>";
                }
                else if($authority == '1')
                {
                        echo "<script>alert('你已是付費會員！');
                                window.location.href='../../點數/確認點數(3.1.1)/確認點數(3.1.1).php';
                　　　        </script>";
                }
                else
                {       
                        if($record[1] == 0){
                                $sqlA="UPDATE user SET `authority` = 1 WHERE `user_id` ='$user_id'";
                                mysqli_query($conn,$sqlA);
                        }
                        $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
                        $result1 = mysqli_query($conn,$sql1);

                        $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','-50','折抵會員費')";
                        $result2 = mysqli_query($conn,$sql2);

                        $_SESSION["authority"] = 1;
                }
        }

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
                echo "<script>alert('折抵成功！');
                        window.location.href='../../點數/確認點數(3.1.1)/確認點數(3.1.1).php';
                　　　</script>";
        }

        mysqli_close($conn);    
?>
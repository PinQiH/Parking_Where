<?php  
  header("Content-Type:text/html; charset=utf-8");
  if (session_status() === PHP_SESSION_NONE) 
  {
          session_start();
  }

  if (isset($_SESSION["user_id"]))
  {
          $user_id = $_SESSION["user_id"];
  }

  $credit=$_POST["credit"];
  $conn=require_once("../../config.php");

  $sql="select `point` from user where `user_id`='$user_id'";
  $result = mysqli_query($conn,$sql);

  while ($record = mysqli_fetch_row($result))
  {
    switch ($credit) 
    {
      case 50:
      $record[0] += 50;    
      $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
      $result1 = mysqli_query($conn,$sql1);
  
      $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','50','儲值成功')";
      $result2 = mysqli_query($conn,$sql2);
      break;

      case 150:
        $record[0] += 150;
        $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
        $result1 = mysqli_query($conn,$sql1);
    
        $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','150','儲值成功')";
        $result2 = mysqli_query($conn,$sql2);
        break;

      case 200:
        $record[0] += 200;     
        $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
        $result1 = mysqli_query($conn,$sql1);
    
        $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','200','儲值成功')";
        $result2 = mysqli_query($conn,$sql2);
        break;

      case 300:
        $record[0] += 300; 
        $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
        $result1 = mysqli_query($conn,$sql1);
    
        $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','300','儲值成功')";
        $result2 = mysqli_query($conn,$sql2);
        break;

      case 500:
        $record[0] += 500;
        $sql1="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
        $result1 = mysqli_query($conn,$sql1);
    
        $sql2="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','500','儲值成功')";
        $result2 = mysqli_query($conn,$sql2);
        break;   
    }
  }

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
          echo "<script>alert('儲值成功！');
                  window.location.href='../../點數/儲值(3.1.1&3.2.1)/儲值.php';
          　　　</script>";
  }

  mysqli_close($conn);   
?>
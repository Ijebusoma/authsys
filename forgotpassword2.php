<?php
include_once "db.php";
if (isset($_POST['submit']))
{
  $username = $_POST['username'];
    $pwd1 = $_POST['password'];
      $pwd2 = $_POST['confirmpassword'];
      $ERROR = "";
      if($pwd1!=$pwd2)
      {
$ERROR = "passwords do not match";
}
      if(empty($username) || empty($pwd1) || empty($pwd2))
      {
        $ERROR = "please fill in all fields";
      }
      $encpwd = hash('md5', $pwd1);
      $query = "SELECT username from user_profile WHERE username = '$username'";
      $result = mysqli_query($dbconn, $query);
      if(mysqli_num_rows($result) == 0)
      {
        $ERROR = "Your username doesn't exist, please check again";
      }
if($ERROR == FALSE)
{
  $query = "UPDATE user_profile SET password = '$encpwd' WHERE username = '$username'";
  $result = mysqli_query($dbconn, $query);
  if($result == true)
  {
    $msg = "successfully updated password";
    echo $msg;
  }
}
}






?>

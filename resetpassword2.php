<?php
include_once "db.php";
if (isset($_POST['submit']))
{
  $username = $_POST['username'];
    $pwd1 = $_POST['password'];
      $pwd2 = $_POST['confirmpassword']; //fetch all data from the form
      $ERROR = ""; //Initialize error variable to null
      if($pwd1!=$pwd2) //ceck if both passwords entered match
      {
$ERROR = "passwords do not match"; //if not, sound an alert :P
}
      if(empty($username) || empty($pwd1) || empty($pwd2)) //CHECK IF any filed is empty
      {
        $ERROR = "please fill in all fields";
      }
      $encpwd = hash('md5', $pwd1); //hash the new password entered
      $query = "SELECT username from user_profile WHERE username = '$username'"; //issue a query to check if the username actually exixts
      $result = mysqli_query($dbconn, $query);
      if(mysqli_num_rows($result) == 0) //IF there's no row with that username
      {
        $ERROR = "Your username doesn't exist, please check again"; //issue error
      }
if($ERROR == FALSE) //if there are no errors
{
  $query = "UPDATE user_profile SET password = '$encpwd' WHERE username = '$username'"; //perfom an update, update the password
  $result = mysqli_query($dbconn, $query);
  if($result == true) //if password update operation is successful
  {
    $msg = "successfully updated password";
    echo $msg;
  }
}
}






?>

<?php
include_once "db.php";
session_start();
if (isset($_POST['submit'])) //check if user has clicked submit

{
  //echo "something";

  //Fetch all data from the form";
  //var_dump($_POST);
  $username = $_POST['username'];
//echo "$username";
$password = hash('md5', $_POST['password']);

$query = "SELECT * FROM user_profile WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($dbconn, $query);
$count = mysqli_num_rows($result); //Count the rows received



if($count == 1) //Check if a row with that data exists in the db
{
echo "successfully logged in";

 $_SESSION['login_user'] = $username;
    }else {
  echo "invalid username or password";
}
}


 ?>

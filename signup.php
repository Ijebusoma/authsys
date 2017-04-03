<?php
include_once "db.php";
if (isset($_POST['submit'])) //check if user has clicked submit

{
  //echo "entering";
  //Fetch all data from the form";
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
if (!empty($email) && !empty($password) && !empty($username)) // check if any field is empty
{
  $query = "SELECT * FROM user_profile WHERE username = '$username'";
  //check the database to see if a similar username exists
  $data = mysqli_query($dbconn, $query);
  $row_count = $data->num_rows;
  if($row_count === 0) // if the username doesn't exists, insert the new record


{
  // create variable to store encrypted password before storing into DB

$query = "INSERT into user_profile (username, email, password) VALUES ('$username',  '$email', md5('$password'))";
 $result = mysqli_query($dbconn, $query);
 if($result === TRUE) // if insertion is successful, echo inserted successfully

{
  echo "you have been successfully registered, you can now login";
  //header("Location:home.php");
}else {
  echo "There was an error while inserting, please try again";
}

 }else {
   ECHO "USERNAME EXISTS"; //inform the user that the username already exists
 }

}else {
  echo "please biko fill in all fields"; //if any value is empty, prompt the user to enter all details
}
}




?>

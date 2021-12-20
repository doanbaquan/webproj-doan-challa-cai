<?php
$servername="localhost";
$username="quan";
$password="1234";
$databasename="streetracrs";

$conn=mysqli_connect($servername,$username,$password,$databasename);
//now check the connection
if(!$conn) 
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['save']))
{
    $firstname = $_POST['First_Name'];
    $email = $_POST['Email'];
    $username = $_POST['Username'];
    $carmodel = $_POST['Car_Model'];
    $speed = $_POST['Speed'];
    $wins = $_POST['Wins'];
    $races = $_POST['Races'];

    $sql_query = "INSERT INTO Leaderboard (First_Name,Email,Username,Car_Model,Speed,Wins,Races)
    VALUES ('$firstname','$email','$username','$carmodel','$speed','$wins','$races')";

    if (mysqli_query($conn, $sql_query))
    {
        echo "Record Submitted Successfully!";
    }
    else
    {
        echo "Error:   " . $sql_query . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

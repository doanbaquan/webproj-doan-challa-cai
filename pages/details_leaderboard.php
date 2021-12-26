<?php
$servername="localhost";
$username="quan";
$password="1234";
$database="streetracrs";

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
        header("Location: ../pages/leaderboard.php");
    }
    else
    {
        echo "Error:   " . $sql_query . "" . mysqli_error($conn);
        header("Location: ../pages/reg_failed.html");
    }

    // closing connection
    $conn->close();
}
?>

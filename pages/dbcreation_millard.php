<?php
//Default setting: no password (user:root)
$conn = new mysqli("localhost", "root", "");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
//Create database
$sql = "CREATE DATABASE streetracrs";
if ($conn->query($sql) === TRUE) {
  echo "Streetracrs created successfully \n";
} 
else {
  echo "Error creating database: " . $conn->error;
}

//Close initial connection
$conn->close();


//Create new connection w/ database
$conn = new mysqli("localhost", "root", "", "streetracrs");

//Check new connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Create table in database streetracrs
$sql = "CREATE TABLE Leaderboard (
First_Name VARCHAR(30) NOT NULL,
Email VARCHAR(50) NOT NULL UNIQUE,
Username VARCHAR(30) NOT NULL UNIQUE,
Car_Model VARCHAR(30) NOT NULL,
Speed INT(255) NOT NULL,
Wins INT(255) NOT NULL,
Races INT(255) NOT NULL
)";

//check table creation
if ($conn->query($sql) === TRUE) {
    echo "Leaderboard created successfully";
    header("Location: ../pages/creation_success_millard.html");
} else {
    echo "Error creating table: " . $conn->error;
}

//close the connection
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {text-align: center}
        p { text-align: center}
        table {
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }
        table, th, td {
            border: 1px solid black;
        }

        th {
            font-weight: bold;
            font-size: 20px;
            font-family: arial;
        }

        td {
            font-size: 20px;
            font-family: arial;
        }

    </style>
    <title>Leaderboard | SD Street Racing</title>
    <link rel="icon" href="../images/SDRACING.png">
    <link rel="stylesheet" href="../css/lightstyle.css">
</head>
<body>
    <div class="topnav">
        <a class="navbar-brand" href="../pages/home.html" style="padding-top: 1%; padding-left: 1%; padding-right: 1%;">
            <img src="../images/SDRACING.png" class="img-fluid" style="vertical-align:bottom;">
        </a>
        <a href="../pages/home.html">Home</a>
        <a href="../pages/racecars.html">Racecars</a>
        <a class="active" href="../pages/leaderboard.php">Leaderboard</a>
    </div>

    <div class="text">

    <h1>Leaderboard</h1>

    <button onclick="document.location='../pages/register.html'">Register for Leaderboard</button>
    <br><br>

    <table>
        <tr>
            <th>Username</th>
            <th>Car Model</th>
            <th>Speed</th>
            <th>Wins</th>
            <th>Races</th>
        </tr>
        <?php
        $servername="localhost";
        $username="quan";
        $password="1234";
        $databasename="streetracrs";
        
        $conn = mysqli_connect($servername,$username,$password,$databasename);

        if(!$conn) {
            die("Connection Failed:" . mysqli_connect_error());
        }

        $sql = "SELECT Username,Car_Model,Speed,Wins,Races from Leaderboard";
        $result = $conn-> query($sql);

        if($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                $tdstardend="</td><td>";
                echo "<tr><td>" . $row["Username"] . $tdstardend . $row["Car_Model"] . $tdstardend . $row["Speed"] . $tdstardend . $row["Wins"] . $tdstardend . $row["Races"] . "</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "NO DATA";
        }
        $conn-> close();
        ?>

    </table>
    <br><br><br><br><br><br><br><br><br><br>
    </div>
</body>
</html>

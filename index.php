<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 20%;
        }
        th {
            background-color: grey;
        }
        td {
            background-color: lightgrey;
        }

    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $newDB = "carsAndTheirYear";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $newDB);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        echo("Connected Successfully<br>");
    }

    //create database
    /*$sql = "CREATE DATABASE carsAndTheirYear";
    if (mysqli_query($conn, $sql)) 
    {
        echo "Database Created Successfully";
    }
    else 
    {
        echo "Error creating db: " . mysqli_error($conn);
    }*/
    
    //create table/relation
    
    /*$sql = "CREATE TABLE cars (
        carName VARCHAR(20) NOT NULL PRIMARY KEY,
        carYear INT NOT NULL)";
    if (mysqli_query($conn, $sql)) {
        echo "Table successfully made";
    }
    else {
        echo "There was en error when making table";
    }*/
    
    
    ?>
    <form action="" method="POST">
        <label for="name">Car name</label><br>
        <input type="text" name="name"><br>
        <label for="mass">Year that it came out</label><br>
        <input type="text" name="mass"><br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
    <table>
        <tr>
            <th>Car</th>
            <th>Year</th>
        </tr>
    <?php 
    //add items
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        (float) $mass = $_POST['mass'];
        try {
        $sql = "INSERT INTO cars (carName , carYear)
        VALUES ('$name', '$mass')";
        mysqli_query($conn, $sql);
        }
        catch(Exception $e){

        }
    }

    
  $sql = "SELECT * FROM cars";
  $result = mysqli_query($conn, $sql);
  if ($result-> num_rows > 0) {
    //output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["carName"]. "</td><td>" . $row["carYear"]. "</td>";
      }
  }
    ?>

    </table>

    
</body>
</html>
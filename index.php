




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "catchup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT idalbum, album_name, album_date FROM album";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "album information: " . $row["idalbum"]. " - Name: " . $row["album_name"]. " " . $row["album_date"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>



<form action="index.php" method="post">
    <p>
        <label for="firstName">ID:</label>
        <input type="text" name="id" id="id">
    </p>
    <p>
        <label for="lastName">Name:</label>
        <input type="text" name="album" id="album">
    </p>
    <p>
        <label for="emailAddress">Date:</label>
        <input type="text" name="date" id="date">
    </p>
    <input type="submit" value="Submit">
</form>


<?php
$link = mysqli_connect("localhost", "root", "root", "catchup");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$idalbum = mysqli_real_escape_string($link, $_REQUEST['id']);
$album_name = mysqli_real_escape_string($link, $_REQUEST['album']);
$album_date = mysqli_real_escape_string($link, $_REQUEST['date']);
 
// attempt insert query execution
$sql = "INSERT INTO album (idalbum, album_name, album_date) VALUES ('$idalbum', '$album_name', '$album_date')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>


</body>
</html>
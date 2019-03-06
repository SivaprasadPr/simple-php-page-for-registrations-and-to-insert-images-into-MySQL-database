<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body align="center">
    <figure>
        <figcaption>
            <div style="color:white;"></div>
             <b>View your data</b>
        

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT count(*) from student";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
        $num=$row1["count(*)"];
        echo "<br><br><br><br><br><i><font size=\"1\"> A total  of ".$num."rows found </font></i>";
    }
} else {
    echo "0 results";}
    $sql = "select * from student";
    $result=mysqli_query($conn,$sql);
    $i=0;
    if (mysqli_num_rows($result)>0)
    {
        echo "<br><table align=\"center\"border =\"1\"> <tr><th>UPRN</th><th>Name</th><th>Department</th></tr>";
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>".$row["UPRN"]."</td><td>".$row["Name"]."</td><td>".$row["Department"]."</td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "oops something went wrong";
    }


mysqli_close($conn);
?>
</figcaption>
    </figure>
    <br><br><a href="indexTest.html">Go back.....</a>
    <br><br><br> <font size="2" face="monospace">(C) Sivaprasad 2019</font>
    </div>
    
</body>
</html>
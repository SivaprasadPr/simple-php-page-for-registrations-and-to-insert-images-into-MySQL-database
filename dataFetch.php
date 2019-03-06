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
$uprn= $_POST['uprn'];
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UPRN,Name,Department FROM student where UPRN='".$uprn."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>Congrats!!! Your data is found </h3><br><br><br>UPRN: " . $row["UPRN"]. " <br><br> Name: " . $row["Name"]. " <br><br>Department :" . $row["Department"]. "<br>";
    }
} else {
    echo "<br>0 results found for your search";
}

mysqli_close($conn);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "select IMG from  photos where uprn='".$uprn."'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
       echo "<br>Image found<br>";
       $img=$row1["IMG"];
       list($width, $height, $type, $attr) = getimagesize("uploads/".$img);
       $newHeight=200;

    
       if($height >= $width)
       {
       
       $r=$height/$newHeight;
       $newWidth=$width/$r;
       }
       else
       {
           $r=$height/$newHeight;
           if($r<1){
               $newWidth=$width*$r;
           }
           else{
               $newWidth=$width/$r;
           }
         
       }
                echo "<img src=\"uploads/".$img."\"  height=\"".$newHeight."\" width=\"".$newWidth."\"\"$attr alt=\"getimagesize() example\" /><br><br>".$height."x".$width."<br><br>";

            }
        }
        else
        echo "<font size=\"1\"><br><br>Your Image is not stored in this server contact admin for any help</font>";
            mysqli_close($conn);
           
?>
</figcaption>
    </figure>
    <br><br><a href="indexTest.html">Go back.....</a>
    <br><br><br> <font size="2" face="monospace">(C) Sivaprasad 2019</font>
    </div>
    
</body>
</html>
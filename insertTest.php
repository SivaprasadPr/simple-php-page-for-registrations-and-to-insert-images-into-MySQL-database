<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <figure>
        <figcaption>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "php";
            $uprn = $_POST['uprn'];
            $name = $_POST['name'];
            $dept = $_POST['dept'];
            $uprn = (int)$uprn;
            $fileName = $_FILES['myfile']['name'];
            $fileSize = $_FILES['myfile']['size'];
            $fileTmpName  = $_FILES['myfile']['tmp_name'];
            $fileType = $_FILES['myfile']['type'];
            $index="dataIndex.html";
            if($fileName!="")
            {
            $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (! in_array($fileExtension,$fileExtensions)) {
            exit("Invalid file type ".$fileExtension." try JPEG , JPG or PNG");
        }
        else if ($fileSize > 500000) {
            exit("Try a file with size less than 500KB");
        }
        $img = $fileName;
        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";
    } 
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            if($fileName != "")
            {
            $sql1 = "INSERT INTO photos values('".$uprn."','".$fileName."')";
            
            if ($conn->query($sql1) === TRUE) {
                $errors = []; // Store all foreseen and unforseen errors here
                $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
            
                if (isset($_POST['submit'])) {
            
                   
            
                      if (empty($errors)) {
                        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            
                        if ($didUpload) {
                            echo "The file " . basename($fileName) . " has been uploaded<br><br><br>";
                        } else {
                            echo "An error occurred somewhere. Try again or contact the admin";
                        }
                    } else {
                        foreach ($errors as $error) {
                            echo $error . "These are the errors" . "\n";
                        }
                    }
                }
            }   
                list($width, $height, $type, $attr) = getimagesize("uploads/".$fileName);
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
                echo "<img src=\"uploads/".$fileName."\"  height=\"".$newHeight."\" width=\"".$newWidth."\"\"$attr alt=\"getimagesize() example\" /><br><br>".$height."x".$width."<br><br>";

                


            } else {
                echo "Oops there is a problem while adding img<br>" ;
            }
        
            $sql = "INSERT INTO student values('".$uprn."','".$name."','".$dept."',null)";
            
            if ($conn->query($sql) === TRUE) {
                echo "Registration complete!!";
            } else {
                echo "Oops there is a problem while registering <br> I think the UPRN might be wrong or <br> you have registered once if so <a href=".$index.">click me!</a> to check";
            }
            
            $conn->close();
            ?>
           <br><br> <a href="indexTest.html">Back to index page??</a>
           <br><br><br> <font size="2" face="monospace">(C) Sivaprasad 2019</font>
           <font size="1" class="font"><br><br><b>NB:-</b> &nbsp;
           In case any errors occur like No such file or directory or div by zero that means your image is not uploaded 
           <b>contact Admin</b> for any queries</font> 
        </figcaption>
    </figure>

    
    
</body>
</html>
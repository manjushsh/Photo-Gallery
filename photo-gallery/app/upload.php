<?php 

  session_start();
  if(!isset($_SESSION['email']))
  {
       header("location:index.php");
  }
  else
    {
       $mail = $_SESSION['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="css/app-style.css">

    <script src="js/responsive.js" type="text/javascript"></script>
</head>
<style>
    input
    {
        padding: 10px;
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    footer
	{
		position:fixed;
		left:0px;
		bottom:0px;
		width:100%;
	}
</style>
<body>

<div class = "ultra">

        <div class="topnav" id="myTopnav">
                <div class="logocont">
                <a href="home.php">
                  <div class="logo" style="text-align:center;">
                  <img src="src/assets/logo-50.png" style="width: auto;height: auto;">
                  </div></a>
                  <div class="logoutlink" style="vertical-align:center;"> 
                  <a href="logout.php">Logout</a>
                  <a href="upload.php">Upload</a>
                  <a href="about.html">Contact Us</a>
                  <a href="help.html">Help</a>
                  </div>
              </div>
                
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div><br><br><br>
        <label for="UploadHeadding" class = "uHead">Choose a photo</label><br><br>


        <div class="container-main" style="text-align:center;">
            <!-- <img src="src\assets\construction.png" width="auto" height="auto"> -->

                <div>

                    <form action="upload.php" method="post" enctype = "multipart/form-data">
                        <input type="file" id="file" class="f11" name = "file1" accept="image/*" required hidden onchange="document.getElementById('fileS').value = this.value"><br>
                        <button class="btn" id="filebutton"  onclick="document.getElementById('file').click()">+</button><br/><br>
                        <input type="text" id="fileS" class="f11" placeholder = "No image is choosen!" disabled><br><br>
                        <input type="submit" value="UPLOAD" name = "loadUp">
                    </form>

                </div><br>
        </div>

    <?php 
            $serverName = 'localhost';
            $userName = 'root';
            $password = '';
            $databaseName = 'silverly';

            // Connect to DB
            $con = mysqli_connect($serverName,$userName,$password,$databaseName); //or die("Error in connecting!");

            // Check the connection

            if(!$con){
            die("Error in connecting!".mysqli_connect_error());
            }
            else{
            //echo("Connected! <br><br>");
            }
        try{
			if(isset($_POST["loadUp"]))
            {               
                $filetemp = $_FILES["file1"]["tmp_name"];
                $filename = $_FILES["file1"]["name"];
                $temp = explode(".",$filename);
                $ext = end($temp);
                $txt2 = time().'.'.$ext;
                $filetype = $_FILES["file1"]["type"];
                $filepath = "src/assets/usrPics/$txt2";
                move_uploaded_file($filetemp,$filepath);
                $res = mysqli_query($con,"INSERT INTO img1(email, image) VALUES ('$mail','$filepath')"); //  , 'date('Y-m-d H:i:s')'
                // $res = mysqli_query($con,"INSERT INTO img1(email, image) VALUES ('$email','$cpath')");
                if(!$res)
                    {
                        echo "<script type = 'text/javascript'>window.alert('Something went wrong! Please try again later.');</script>";
                    }
                else
                    {
                       echo "<script type = 'text/javascript'>window.alert('Uploaded Successfully!');</script>";
                       echo "<br>Uploaded as: $txt2<br><br> <img src = '$filepath' width = '200' height = 'auto'>";
                    }
            }
        }
        catch(SQLException $e)
        {
            echo $e;
        }
        mysqli_close($con);
        ?>
        
        <footer>&copy; MS and Group. All rights reserved.
        <!-- <button action = "#">Go to top</button> -->
        </footer>
</div>
</body>
</html>
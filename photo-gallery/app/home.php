<?php 
  session_start();
  if(!isset($_SESSION['email']))
  {
       header("location:index.php");
  }
  else
  {
       //echo $_SESSION['email'];
       echo "
       
       <div id = 'lbl' style='background-color:#1b9b26; width:99.3%;padding:5px;'><label style='color: white; font-size:20px;'> Logged in as ".$_SESSION['email']." </label></div>
       <script type='text/javascript'>
       window.setTimeout(function() {
           var label = document.getElementById('lbl');
           if (label != null) {
               label.style.display = 'none';
           }
       }, 3500);
   </script>
       
       ";}
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#db5945"> <!--Color for toolbar in chrome. -->
    <title>Home</title>

    <!--  CSS -->
    <link rel="stylesheet" href="css/app-style.css">
    <link rel="shortcut icon" href="src/assets/icon-title.ico" />

    <!-- scripts -->
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="app.js"></script>
    <script src="js/responsive.js" type="text/javascript"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="src/components/photo/dataFetch.ctrl.js"></script>
  
  </head>
  <body>
    <div class="body-back">
      <div ng-app="PhotoApp">

      <!-- Testing AngularJS and binding..<br><br>
      <div ng-controller="PhotoCtrl">
          <input type="text" ng-model="binding" />
           views 
     <p>{{ binding }}</p> -->


     <!-- Nav Bar -->
        
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
        </div>

          <!-- <br>Database Connection:  -->
        <!-- PHP database try. --><br><br>

<form method="get">
    <div class = "mailIn">
      <input type="email" name="mail" placeholder = "Enter E-Mail">
      <input type="button" class = "disp" value="SEARCH" name = "imShow" onclick = "window.alert('We are still working on this feature..');">
    </div>


        <?php
          // Initialize variables
          $serverName = 'localhost';
          $userName = 'root';
          $password = '';
          $databaseName = 'silverly';

          // Connect to DB
          $con = mysqli_connect($serverName,$userName,$password,$databaseName); //or die("Error in connecting!");

          // Check the connection
          if(!$con){
            echo "Error in connecting!";
          }
          else
          {
            //echo("Connected! <br><br>");
          }
          // Fetch query

            $sql = "SELECT * FROM img1";
            if($result = mysqli_query($con,$sql))
            {
              while ($row = mysqli_fetch_assoc($result)) {
                $imgData[] = $row;
              }
             // echo json_encode($imgData);

              $jsonString = file_get_contents('src/components/photo/data.json');
              $data = json_decode($jsonString, true);

              //write to json file
              $fp = fopen('src/components/photo/data.json', 'w+');
              fwrite($fp, json_encode($imgData,JSON_UNESCAPED_SLASHES));
              fclose($fp);
            }
            mysqli_close($con);
          

        ?>
        </form>
      <div id="container" ng-controller="PhotoCtrl">   <!--  Complete page    -->
        <br>
        <div class="imageComplete">   <!--   Image+Like bar   ng-repeat="variable in tablename" -->

              <ul>
                <li ng-repeat="media in images">
                  <div class="imgsub" id="imgsub">
                  <br><b><label class="usrlabel">{{media.email}}</label></b>
                  <div class="imagedb" id="imgdb">
                  <img ng-src= "{{media.image}}" />
                  </div>
                  <!-- <br><hr width="50%"> -->
                    <div class="desc">
                      <p></p>
                      <input type = "hidden" class="dummy" value="{{$index}}">
                      <input type="button" class="likebutton" name= "{{$index}}" id="{{$index}}" ng-click="like($index)" ng-dblclick="dislike($index)" title="Like this image"/>
                      <input type="button" class="sharebutton" onClick="share()" title="Share this image" />
                      <a class="downloadImg" download="Wallpaper{{media.id}}.jpg" href="{{media.image}}" title="Download this image">
                        <input type="button" class="downbutton"/><br>
                      </a>
                      <!-- &nbsp;Number of likes --><br>
                    </div>
                </div> <br><br>
                </li><br><br>
              </ul>         
        </div>     
        </div>
      </div>
      <footer>&copy; Silvery and Group. All rights reserved.

      <!-- <div id="b1">
                <a class="buttonnext" href="#">Go to Top</a>
                </div> -->
      </footer>
    </div>
  </body>
</html>
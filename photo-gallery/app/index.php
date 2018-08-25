<!DOCTYPE html>
    
<html>
    <head>
        <title>Login or Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN or SIGN UP </title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="shortcut icon" href="src/assets/icon-title.ico" />

    </head>
    <body background="src/assets/backBlur1.png">
        <div class="logo" style="text-align:center;">
            <img src="src/assets/logo-50.png" style="width: auto;height: auto;">
        </div><br><br>
        <form name="f1" method = "POST">

        
            <div class="container">
                <div class="info">
                    <label class="loghead">Login to Silverly</label><br/><br/>
                    <input type="email" placeholder="Email" id="username" name = "email1" required> <br> 
                    <input type="password" placeholder="Password" id="password" name = "password1" required>  <br><br>
                    <input type="submit" value="Sign In" name = "sin"><br/><br>
                </div>
            </div><br><br>
        </form>

        <form action="index.php" method="POST">

            <div class="container">
            <label class="loghead">Register to Silverly</label><br/><br/>
            <input type="text" placeholder="Name" id="name" name = "name" required><br/>
            <input type="email" placeholder="Email" id="email" name = "email" required><br/>
            <input type="password" placeholder="Password" id="password" name = "password" required><br/>
            <input type="password" placeholder="Confirm Password" id="password" required><br/>
            <input type="radio" name="gender" value="0" required> Male&nbsp;
            <input type="radio" name="gender" value="1" required> Female<br><br/>
            <input type="checkbox" name="terms" value="1" checked required> Agree TERMS & CONDITIONS<br><br/>
            <input type="submit" value="Sign Up" name = "sup"><br/><br>
            </div><br>
            </form>

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
             else
             {
                //echo("Connected! <br><br>");
             }

             if(isset($_POST["sin"]))
             {
                 $email1 = $_POST["email1"];
                 $password1 = $_POST["password1"];
                    
                 $result = mysqli_query($con,"SELECT email, password FROM user WHERE email = '$email1'");
                 
                if((mysqli_num_rows($result)) > 0)
                    {
                        while($row = (mysqli_fetch_assoc($result))){
                            if(($row["email"] ==  $email1 )&&($row["password"] == $password1))
                            {
                                session_start();
                                $_SESSION['email']=$email1;
                                header("location:home.php");
                                exit();
                            }
                            else
                            {
                                echo "<script type = 'text/javascript'>window.alert('Wrong creditals!');</script>";
                                $location = "index.php"; 
                                header( "Location:$location" ); 
                                exit();
                            }
                        }
                    }
                else
                    {
                        echo "<script type = 'text/javascript'>window.alert('No user found with given email. Try registring again!');</script>"; 
                    }
             }

            if(isset($_POST["sup"]))
            {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                //$query = ;
                $res = mysqli_query($con,"INSERT INTO user(name, email, password) VALUES ('$name','$email','$password')");
                if(!$res)
                    {
                        echo "<script type = 'text/javascript'>window.alert('Error! This email is alerady registered.');</script>";
                    }
                else
                    {
                       echo "<script type = 'text/javascript'>window.alert('Sucessfully Registered. Please login to continue..');</script>";
                    }
            }
        mysqli_close($con);

        ?>
        <br><br>
        
        <footer>&copy; MS and Group. All rights reserved.</footer>  
    </body>  

</html>
<!DOCTYPE html>
<html lang="en">
<head>
      
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      
      <title>Village Touristique</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      
      <link rel="stylesheet" href="css/bootstrap.min.css">
      
      <link rel="stylesheet" href="css/style.css">
     
      <link rel="stylesheet" href="css/responsive.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
   </head>
   <body class="main-layout">
<!-- connexion-->
<?php
$servername = "localhost:5000";
$username = "root";
$password = "";

try {
$conn = new PDO("mysql:host=$servername;dbname=m", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}

?>



<!-- fin de connexion -->


<!-- debut importation des donnes -->
<?php
  @$name=$_POST['name'];
  @$last=$_POST["last"];
  @$email=$_POST["email"];
  @$phone=$_POST["phone"];
  @$address=$_POST["address"];
  @$date=$_POST["date"];
  @$pass=$_POST["pass"];
  @$cpass=$_POST["cpass"];
  @$submit=$_POST["submit"];
  echo $pass;
   if(isset($submit)){
         
         if($cpass==$pass){
            $req="INSERT INTO client(`nom`,`prenom`,`adresse`,`email`,`numTel`,`Date_N`,`ID_REST_SEJ`) VALUES('$name','$last','$address','$email','$phone','$date','NULL')";
            $a=$conn->exec($req);
            header("Location:http://127.0.0.1/b/index.php");
            
            
         }else{
            echo"not same password";
         }


   }


?>


<!-- fin de l'importation  -->



   <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      
   <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <?php
            include("head.php");
        ?>
      <div class=" banner_main">
           <form action="logup.php" method="POST" id ="fl">
                <h1 style="text-align: center;color:rgba(210, 114, 114, 1);"><b>LOG-UP</b></h1>

                <label class="lab" for="name"><b>Name: </b> </label><br>
                <input class="in" name="name" type="text" placeholder="name"><br>

                <label  class="lab" for="last"><b>Lastname: </b> </label><br>
                <input class="in" name="last" type="text" placeholder="Lastname"><br>

                <label class="lab" for="email"><b>Email:  </b></label><br>
                <input class="in" name="email" type="email" placeholder="email"><br>

                <label class="lab" for="phone"><b>Phone:  </b></label><br>
                <input class="in" name="phone" type="tel" placeholder="phone"><br>

                <label class="lab" for="email"><b>Address:  </b></label><br>
                <input class="in" name="address" type="address" placeholder="Address"><br>    

                <label class="lab" for="email"><b>date de naissance:  </b></label><br>
                <input class="in" name="date" type="date" placeholder="date de naissance"><br>    
                            

                <label class="lab" for="pass"><b>Password:  </b></label><br>
                <input class ="in" name="pass" type="password" placeholder="password"><br>

                <label class="lab" for="cpass"><b>Confirm Password:  </b></label><br>
                <input class ="in" name="cpass" type="password" placeholder="confirm password"><br>

                <input name="submit" type=submit value="submit"/>
           </form>
        </div>
    
</body>
</html>
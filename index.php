<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style.css">
<?php include 'connection.php'?>

<?php
    if(isset($_POST['submit']))
    {
      $Name = $_POST['Name'];
      $Email = $_POST['Email'];
      $Phone = $_POST['Phone'];
      $Password = $_POST['Password'];
      $RPassword = $_POST['RPassword'];

      $Pass = password_hash($Password,PASSWORD_BCRYPT);
      $RPass = password_hash($RPassword,PASSWORD_BCRYPT);
      $Token = bin2hex(random_bytes(15));
        //Email checking

        $emailcheck = "SELECT * FROM `registration` WHERE Email ='$Email'";

        $query = mysqli_query($con,$emailcheck);
        $num = mysqli_num_rows($query);
        if($num>0)
        {
          ?>
            <script> alert("Email is already EXIST") </script>

          <?php
        }
        else{
          if($Password===$RPassword)
          {
            $insert = "INSERT INTO registration (Name,Email,Phone,Password,RPassword,Token,Status) VALUES('$Name','$Email','$Phone','$Pass','$RPass','$Token','Inactive')";
            $data  = mysqli_query($con,$insert);
            if($data)
            {

                // $to_email = "collegefinder100@gmail.com";
                $subject = "Email Activation";
                $body = "Hi $Name , Click Here to activate your account 
                http://localhost/practise/Registration/activate.php?Token=$Token";
                $headers = "From: muditrajputpersonal@gmail.com";

                if (mail($Email, $subject, $body, $headers)) {
                    ?>
                    <!-- <p style ="font-size:14px ,font-color:black"> Please check your email for verification </p> -->
                    <script>alert("Check your mail")</script>

                    <?php
                    header('location: index.php');
                } else {
                    echo "Email sending failed...";
                }
            }
            else{
              ?>
              <script> alert("Data is not entered in database") </script>

              <?php
            }
          }
          else{
            ?>
            <script> alert("Password is not matched") </script>

            <?php
          }
        }






      



    }



?>



<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="POST">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="Name" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="Email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<!-- <select class="custom-select" style="max-width: 120px;">
		    <option selected="">+971</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select> -->
    	<input name="Phone" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <!-- <div class="form-group input-group"> -->
    	<!-- <div class="input-group-prepend"> -->
		    <!-- <span class="input-group-text"> <i class="fa fa-building"></i> </span> -->
		<!-- </div> -->
		<!-- <select class="form-control">
			<option selected=""> Select job type</option>
			<option>Designer</option>
			<option>Manager</option>
			<option>Accaunting</option>
		</select> -->
	<!-- </div> form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Create password" type="password" name ="Password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Repeat password" type="password" name ="RPassword">
    </div> <!-- form-group// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name ="submit"> Create Account  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="activatePage.php">Log In</a> </p>
</form>
</article>
</div>

</div>



<br><br>

  
</body>
</html>
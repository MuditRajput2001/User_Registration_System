<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        <?php
        include'connection.php';
        if(isset($_POST['submit']))
        {
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];

            $val  = "SELECT * FROM registration WHERE Email = '$Email' and status = 'active'";
            $query = mysqli_query($con,$val);
            $num_email = mysqli_num_rows($query);
            
            if($num_email!=0)
            {
                $GetPass =  mysqli_fetch_assoc($query);
                $db_pass = $GetPass['Password'];
                $decode = password_verify($Password,$db_pass);
                if($decode)
                {
                  // if($_POST['rem'])
                  // {
                  //   setcookie("Emailcookie",$Email,time()+86400);
                  //   setcookie("Passwordcookie",$Password,time()+86400);
                  //   header('location:homePage.html');
                  // }
                  // else{
                    header('location:homePage.html');

                  // }
                
                    
                }
                else{
                    ?>
                    <script>alert("Password is not Matched");</script>
                    <?php
                }
            }
            else{
                ?>
                    <Script> alert("Email is not matched, Please enter correct Email.");</script>
                <?php
            }
         }





        ?>












    <form method ="POST">
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
             <!-- <p class="bg-sucess text-black"> Please Check your mail for verification </p> -->
            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg" value= "<?php if(isset($_COOKIE['Emailcookie'])){echo $_COOKIE['Emailcookie'];}        ?>"placeholder="Email" name ="Email" />
              <!-- <label class="form-label" for="typeEmailX-2">Email</label> -->
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" value = "<?php if(isset($_COOKIE['Passwordcookie'])){echo $_COOKIE['Passwordcookie'];}        ?> "name ="Password"/>
              <!-- <label class="form-label" for="typePasswordX-2">Password</label> -->
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" name ="rem" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name=  "submit">Login</button>

            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button><br>
                <p?> Forgot Password <a href ="password_reset.php">Click Here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form{
            display: flex;
            justify-content: center;
            margin-top: 170px;
        }


    </style>
</head>
<body>
<?php
include 'connection.php';
    if(isset($_POST['submit']))
    {
        $Email = $_POST['Email'];
        $val  = "SELECT * FROM registration WHERE Email = '$Email' and status = 'active'";
        $query = mysqli_query($con,$val);
        $num_email = mysqli_num_rows($query);
        if($num_email)
        {
            $userData = mysqli_fetch_array($query);
            $Name = $userData['Name'];
            $Token = $userData['Token'];
            $subject = "Password Reset";
                $body = "Hi $Name , Click Here to reset your password
                http://localhost/practise/Registration/newPassword.php?Token=$Token";
                $headers = "From: muditrajputpersonal@gmail.com";

                if (mail($Email, $subject, $body, $headers)) {
                    ?>
                    <!-- <p style ="font-size:14px ,font-color:black"> Please check your email for verification </p> -->
                    <script>alert("Check your mail")</script>

                    <?php
                   
                } else {
                    echo "Email sending failed...";
                }
            // header('location:newPassword.php');
        }
        else{
            ?>

            <script>alert("Please Enter Correct Email")</script>

            <?php
        }
    }









?>
    <form method="POST" class="form">
<div class="card text-center" style="width: 300px;">
    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5">
        <p class="card-text py-2">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>
        <div class="form-outline">
            <input type="email" id="typeEmail" class="form-control my-3" placeholder="Email" name="Email"/>
            <!-- <label class="form-label" for="typeEmail">Email input</label> -->
        </div>
        <!-- <a href="#" class="btn btn-primary w-100" type="submit" name = "submit">Reset password</a> -->
        <button class="btn btn-primary btn-lg btn-block" type="submit" name=  "submit">Reset Password</button>
        <div class="d-flex justify-content-between mt-4">
            <a class="" href="activatePage.php">Login</a>
            <a class="" href="index.php">Registration</a>
        </div>
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
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
        if(isset($_GET['Token']))
        {

        $Token = $_GET['Token'];
        $Password = $_POST['Password'];
        $RPassword = $_POST['RPassword'];

        $Pass = password_hash($Password,PASSWORD_BCRYPT);
        $RPass = password_hash($RPassword,PASSWORD_BCRYPT);

        
        
        if($Password===$RPassword)
        {
            $update_query = "UPDATE registration SET Password = '$Pass' WHERE Token = '$Token'";

            $query = mysqli_query($con,$update_query);
            if($query)
            {

            echo "password is update";
            
                // <script>alert("Password is update");</script>
                header('location:activatePage.php');
            
            }
            else{
                ?>
                    <script> alert("Internal Error");</script>

                <?php
            }

        }
        else{
            ?>
            <script>alert("Password is not matched");</script>

            <?php
        }
        }
    }









?>
    <form method="POST" class="form">
<div class="card text-center" style="width: 300px;">
    <div class="card-header h5 text-white bg-primary">Change Password</div>
    <div class="card-body px-5">
        <p class="card-text py-2">
           Enter New Password
        </p>
        <div class="form-outline">
            <input type="password" id="typeEmail" class="form-control my-3" placeholder="Password" name="Password"/>
            <!-- <label class="form-label" for="typeEmail">Email input</label> -->
        </div>
        <div class="form-outline">
            <input type="password" id="typeEmail" class="form-control my-3" placeholder="Repeat Passwprd" name="RPassword"/>
            <!-- <label class="form-label" for="typeEmail">Email input</label> -->
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name=  "submit">submit</button>
        <!-- <input type="submit" value="">Reset Password -->
       
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
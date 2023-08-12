<?php
include 'connection.php';
if(isset($_GET['Token']))
{
    $Token = $_GET['Token'];
    
    $update_status = "UPDATE registration set status = 'active' WHERE Token = '$Token' ";
    $query = mysqli_query($con,$update_status);
    
    if($query)
    {
        header('location:activatePage.php');
    }
    
}

?>
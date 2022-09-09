<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");

if(isset($_POST['stud_delete_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);

    $query = "DELETE FROM student WHERE id IN($extract_id) ";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['status'] = "data deleted";
        header("location: delete-data.php");
    }
    else
    {
        $_SESSION['status'] = "data not deleted";
        header("location: delete-data.php");
    }
}
?>
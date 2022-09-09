<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>web learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      
       <div class="container">
        <div class="row justify-content-center">
           <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Delete data in php mysql</h4>
                </div>
            </div>
        </div>

        <div class="col-md-12">

                <?php

                  if(isset($_SESSION['status']))
                  {
                    echo "<h4>".$_SESSION['status']."</h4>";
                    unset($_SESSION['status']);
                  }

                  ?>
            <div class="card mt-4">
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <button type="submit" name="stud_delete_btn" class="btn btn-danger">Delete</button>
                                    </th>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Class</td>
                                    <td>Phone No</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php
                                  $con = mysqli_connect("localhost","root","","phptutorials");

                                  $query = "SELECT * FROM student";
                                  $query_run = mysqli_query($con, $query);

                                  if(mysqli_num_rows($query_run) > 0)
                                  {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                           <tr>
                                            <td style="width:10px; text-align: center;">
                                                <input type="checkbox" name="stud_delete_id[]" value="<?= $row['id']; ?>">
                                            </td>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['stud_name']; ?></td>
                                            <td><?= $row['stud_class']; ?></td>
                                            <td><?= $row['stud_phone']; ?></td>
                                           </tr>
                                        <?php
                                    }
                                  }
                                  else
                                  {
                                    ?>
                                        <tr>
                                            <td colspan="5">No record found</td>
                                        </tr>
                                    <?php
                                  }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
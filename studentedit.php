<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>studentedit</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Student edit
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['id'])){
                        $student_id = mysqli_real_escape_string($con,$_GET['id']);
                        $query = "SELECT * FROM students WHERE id='$student_id'";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0){
                            $student = mysqli_fetch_array($query_run);
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $student['id']?>">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="<?=$student['name']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="<?=$student['email']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>phone</label>
                            <input type="text" name="phone" value="<?=$student['phone']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Course</label>
                            <input type="text" name="course" value="<?=$student['course']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="updatestudent" class="btn btn-primary">Update student</button>
                        </div>
                    </form>
                            <?php
                        }else{
                            echo "no data found";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
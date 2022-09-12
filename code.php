<?php
session_start();
require 'dbcon.php';

if(isset($_POST['deletestudent'])){
    $student_id = mysqli_real_escape_string($con,$_POST['deletestudent']);
    $query = "DELETE FROM students where id='$student_id'";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['message'] = "student deleted successfully";
        header("Location: index.php");
        exit(0);
    }else{
        $_SESSION['message'] = "student not deleted";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['updatestudent'])){
    $student_id = mysqli_real_escape_string($con,$_POST['student_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $course = mysqli_real_escape_string($con,$_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['message'] = "student updated successfully";
        header("Location: index.php");
        exit(0);
    }else{
        $_SESSION['message'] = "student not updated ";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['savestudent'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $course = mysqli_real_escape_string($con,$_POST['course']);

    $query = "INSERT INTO students(name,email,phone,course)VALUES('$name','$email','$phone','$course')";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['message'] = "student added successfully";
        header("Location: studentcreate.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "student not added ";
        header("Location: studentcreate.php");
        exit(0);
    }

}
?>
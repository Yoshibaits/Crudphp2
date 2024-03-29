<?php

require './dbconnection/dbconnect.php';


if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($con_student,$_GET['student_id']);
    $query = "SELECT * FROM students WHERE id='$student_id'";
    $query_run = mysqli_query($con_student, $query); 

    if (mysqli_num_rows($query_run) == 1) {

        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetched Successful',
            'data' => $student

        ];
        echo json_encode($res);
        return false;
    }else{
        $res = [
            'status' => 404,
            'message' => 'Student ID not found'
        ];
        echo json_encode($res);
        return false;
    }
}


if(isset($_POST['save_student'])){
    $name = mysqli_real_escape_string($con_student, $_POST['name']); 
    $email = mysqli_real_escape_string($con_student, $_POST['email']); 
    $phone = mysqli_real_escape_string($con_student, $_POST['phone']);
    $course = mysqli_real_escape_string($con_student, $_POST['course']); 

    if($name == NULL || $email == NULL || $phone == NULL || $course == NULL){
        $res= [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;
    }
    $query = "INSERT INTO  students (name, email, phone, course) 
    VALUES ('$name', '$email', '$phone' ,'$course')";
    $query_run = mysqli_query($con_student, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res= [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_POST['update_student'])){
    $student_id = mysqli_real_escape_string($con_student, $_POST['student_id']); 
    $name = mysqli_real_escape_string($con_student, $_POST['name']); 
    $email = mysqli_real_escape_string($con_student, $_POST['email']); 
    $phone = mysqli_real_escape_string($con_student, $_POST['phone']);
    $course = mysqli_real_escape_string($con_student, $_POST['course']); 

    if($name == NULL || $email == NULL || $phone == NULL || $course == NULL){
        $res= [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE students SET name='$name' , email='$email', phone='$phone' ,course='$course'
    WHERE id='$student_id'";
    $query_run = mysqli_query($con_student, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res= [
            'status' => 500,
            'message' => 'Student Not Updated'
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($con_student, $_POST['student_id']);

    $query = "DELETE FROM students WHERE id='$student_id'";
    $query_run = mysqli_query($con_student ,$query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else{
        $res= [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}

?>
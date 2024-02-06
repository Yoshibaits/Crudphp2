<?php
session_start();
include '../dbconnection/db-con.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;
    
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username)){
        header('Location: index.php?error=Please enter a username');
        exit();
    }else if(empty($password)){
        header('Location: index.php?error=Please enter a password');
        exit();
    }else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);// hash password

        // prepared statement
        $prepared_query = $con->prepare ("SELECT * FROM users WHERE username= ?");
        $prepared_query -> bind_param("s", $username);
        $prepared_query -> execute();
        $result = $prepared_query->get_result();
        

        if($result-> num_rows === 1){

            $row = $result->fetch_assoc(); 

            if ($row ['username'] === $username && password_verify($password, $row['password'])){
                $_SESSION['username'] = $row ['username'];
                $_SESSION['name'] = $row ['name'];
                $_SESSION['id'] = $row ['id'];
                header('Location: home.php');
                exit();
            }else{
                header('Location: index.php?error=Incorrect credentials');
                exit();
            }
            // print_r($row);
        }else{
            header('Location: index.php?error=Incorrect credentials');
            exit();
        }
    }

}else{
    header("Location: index.php?error");
    exit();
}

?>
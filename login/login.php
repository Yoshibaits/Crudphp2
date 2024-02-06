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
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);// hash password
        $prepared_query = $con_login->prepare ("SELECT * FROM users WHERE username= ?");// prepared statement
        $prepared_query->bind_param("s", $username);
        $prepared_query->execute();
        $result = $prepared_query->get_result();

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            // used to debug Hashing PROBLEM
            
            // $row = $result->fetch_assoc(); 
            // print_r($row);
            // if(password_verify($password, $hashed_password)){
            //     print_r("Yes");
            //     print_r($password);
            //     print_r($hashed_password);
            // }else {
            //     print_r("No");
            // }

            if ($row ['username'] === $username && password_verify($password, $row['password'])){
                $_SESSION['username'] = $row ['username'];
                $_SESSION['name'] = $row ['name'];
                $_SESSION['id'] = $row ['id'];
                header('Location: ../students.php');
                echo "<!-- Debugging: Username = $username, Password = $password -->";
                exit();
            }else{
                header('Location: index.php?error=Incorrect Username or Password');
                exit();

            }
        }else{
            echo "<script>";
            echo "console.log('Debugging: Username = $username, Password = $password');";
            echo "</script>";
            header('Location: index.php?error=Not Found');
            exit();
        }
    }

}else{
    header("Location: index.php?error");
    exit();
}

?>
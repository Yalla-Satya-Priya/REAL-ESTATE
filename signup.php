<?php
    $YourName = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    echo $email;

    $con = new mysqli("localhost","root","","test");
    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    }else{
       $stmt = $conn->prepare("SELECT * FROM sign-up WHERE email = ?");
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $stmt_result =$stmt->get_result();
       if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>Sign In successfully</h2>";
        }else {
            echo "<h2>Invaild Email or password</h2>";
        }
       }else{
        echo "<h2>Invaild Email or password</h2>";
       }
    }
    
?>

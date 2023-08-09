<?php

error_reporting(E_ALL);     

$email = $_POST['email'];
$password= $_POST['password'];

$conn = new mysqli("localhost", "admin", "1234", "medi3");

if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $ins = "SELECT * FROM board WHERE email='$email'";
    // echo $ins;
                $result = $conn->query($ins);
                if ($result->num_rows === 1) {
                    // header("Location: enquiry.php");
                    echo  "login successfull";
                }
// echo $result->num_rows;
    else {
        echo "Invalid email ";
    }

    $stmt->close();
    $conn->close();
}
?>
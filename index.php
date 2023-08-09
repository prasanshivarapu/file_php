<!DOCTYPE html>
<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
        .success{
            color:green;
            font-weight:bold;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $nameErr = $emailErr = $passwordErr = $regist = "";

    $conn = new mysqli("localhost", "admin", "1234", "medi3");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        
        

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]); 
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $conn->close();
            } else {
                $ins = "SELECT * FROM board WHERE email='$email'";
                $result = $conn->query($ins);
                if ($result->num_rows >= 1) {
                    $emailErr = "Email is already taken";
                } else {
                    $sql = "INSERT INTO board (name, email, password) VALUES ('$name', '$email', '$password')";
                    if ($conn->query($sql) === TRUE) {
                        $regist = "Registration successful";
                        $emailErr = "";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>User Registration</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <?php if (!empty($nameErr)) { ?>
                <span class="error"> <?php echo $nameErr; ?></span>
            <?php } ?>
        </p>
        
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            <?php if (!empty($emailErr)) { ?>
                <span class="error"> <?php echo $emailErr; ?></span>
            <?php } ?>
        </p>
        
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <?php if (!empty($passwordErr)) { ?>
                <span class="error"> <?php echo $passwordErr; ?></span>
            <?php } ?>
        </p>
       
        
        <p>
            <input type="submit" name="submit" value="Submit">
            <?php if (!empty($regist)) { ?>
                <span class="success"> <?php echo $regist; ?></span>
            <?php } ?>
        </p>
    </form>
</body>
</html>

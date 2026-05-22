<?php
require 'connection.php';
session_start();

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM crimevault_login WHERE username='$username' AND password='$password'";
    $result = $connect->query($sql);

    // Check if the query executed successfully
    if ($result === false) {
        die("Query error: " . $connect->error); // Debugging line for errors
    }

    // Check the result for matching rows
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        header("Location: home.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

$connect->close();
?>


<!DOCTYPE html>
<html>

<head>
<title>CrimeVault</title>
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
body {
    background: url('image.png');
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;


    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;

}

.wrapper {
    width: 800px;
    color: white;
    border-radius: 10px;
    padding: 30px 40px;
}

.wrapper h1 {
    color: white;
      font-size: 51px;
      font-weight: 1000;
      text-align: center;
}
.wrapper h2 {
    color: white;
      font-size: 38px;
      font-weight: 700;
      text-align: center;
}

.wrapper p {
    color: white;
      font-size: 30px;
      font-weight: 500;
      text-align: center;
}

input {
    width: 100%;
    height: 100%;
    color: black;
    background: white;
    outline: none;
    border: 2px solid white;
    border-radius: 40px;
    padding: 20px 45px 20px 20px;
}

/*input::placeholder {
    color: #000000;
    font-size: 16px;
    }*/

.btn {
    background-color: white; 
    color: black;
    text-align: center;
    display: block;
    font-size: 16px;
    margin: 0 auto;
    cursor: pointer;
    position: center;
    border: 2px solid white;
    border-radius: 10px;
    padding: 10px 20px;
    }
      
.navbar {
    position: fixed;
    background-color: white;
    position: fixed;
    top: 0; 
    right: 0; 
    padding: 5px;
    width: 100%;
    
    }
    .navbar-brand{
        color: black;
    }

.img{
    
    height: 100px;
    position: center;
    display: block;
    margin-top: 50px;
    margin-bottom: 20px; 
    margin-left: auto;
    margin-right: auto;  
}
</style>
           

<body>
           
            <div class = "wrapper">
            <nav class="navbar navbar-inverse ">
                <ul class="nav navbar-nav navbar-right">   
                    <a class="navbar-brand" style="background-image: linear-gradient(to bottom right, white 70%, blue 100%); color: black;">CrimeVault</a>    
                </ul>
            </nav>
            
            <form method = "post" action="">
               
                    <img src="logo1.png" alt="Logo" class="img" >
                

                    <h2>LOG IN</h2>
                        <h1>Philippine National Police</h1>
                        <h2>Naval Municipal Police Station</h2>    
                        <p>Naval, Biliran</p>
                        

                        <br>
                            <label for="">Username</label>
                            <input type="text" name="username" required value="">
                            <i class='bx bxs-user'></i>
                        <br>
                            <label for="">Password</label>
                            <input type="password" name="password" required value="">
                            <i class='bx bxs-lock-alt' ></i>
                        <br>
                        <br>
                     
                        <button type="submit" class="btn" >Login</button> 
                </form>
            </div>
</body>
</html>
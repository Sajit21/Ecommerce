<?php
$servername="localhost";
$username="root";
$password="" ;
$dbname="Ecommerce";

//create connection
$conn=new mysqli($servername,$username,$password);
//check connection alay if case
if($conn->connect_error)
{
    die("not connected" . $conn->connect_error);

}
// $sql1="CREATE DATABASE sajithero";

// USE sajithero; use this in mysqlplus
// else{
//     echo ("connected  successfully ");
// }

// Create database if it doesn't exist
$sql1 = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql1) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

//select the database //connection sangai select_db
$conn->select_db($dbname);


// Create table if it doesn't exist
$sql2 = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    Cpassword VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
)";

if ($conn->query($sql2) === FALSE) {
    die("Error creating table: " . $conn->error);
}


//retrieve form data
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $conf = $_POST['passw'];
    $mail = $_POST['mail'];
}

//validate the form in php
if (empty($uname) || empty($pass) || empty($mail)) {
    echo "All fields are required.";
}

if ($pass != $conf) {
    echo "Passwords don't match.";
}

if (strlen($pass) <= 8) {
    echo "Password length should be greater than 8 characters.";
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || !str_ends_with($mail, '@gmail.com')) {
    echo "Email not in the correct format.";
}

//insert of the data from signup
// $sql3=" INSERT INTO users( id, username, password,  Cpassword, email ) VALUES( '{$uname}', '{$pass}, '{$conf}', '{$mail})";
 //should be enclosed in a single quote
//since id is autocorrect we don't need to include them in the insert value
// $sql3 = "INSERT into users (username, password, Cpassword, email) VALUES ('$uname', '$pass', '$conf', '$mail')";

// if($conn->query($sql3) === true){
//     echo ("data entered successfully");

// }
// else{
//     die("error while intering data". $conn->error);
// }

?>


<?php
if(isset($_POST['submit']))
{
    $firstName = $_POST['firstname'];
    $lastName =  $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message =  $_POST['message'];

    //database details.
    $host = "mysql";
    $username = "root";
    $password = "super-secret-password";
    $dbname = "my-wonderful-website";

    //create connection
    $con = mysqli_connect($host, $username, $password, $dbname, 3306);
    //check connection if it is working or not
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO contactform_entries (first_name, last_name, email, subject, message) VALUES (?, ?, ?, ?, ?)";

    //Create the prepared statement
    $stmt = mysqli_prepare($con, $sql);

    //Bind parameters to prepared statement
    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $subject, $message);

    //Execute prepared statement
    $rs = mysqli_stmt_execute($stmt);

    if($rs)
    {
        echo "Message has been sent successfully!";
    }
    else{
        echo "Error, Message didn't send! Something's Wrong.";
    }
    //connection closed.
    mysqli_close($con);
}
?>
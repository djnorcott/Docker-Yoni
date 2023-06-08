<?php
$response = '';
if($_SERVER['REQUEST_METHOD'] === 'POST')
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
        $response = "Message has been sent successfully!";
    }
    else{
        $response = "Error, Message didn't send! Something's Wrong.";
    }
    //connection closed.
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Contact Form</title>
</head>
<body>
<div class="form">
    <?php
    if ($response !== '') {
        echo "<h2>" . $response . "</h2>";
    }
    ?>
    <form method="POST" action="form.php">
        <h1>Contact Us!</h1>
        <table>
            <tr>
                <td>
                    <label for="firstname">First Name:</label><br>
                    <input type="text" name="firstname" placeholder="John" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lastname">Last Name:</label><br>
                    <input type="text" name="lastname" placeholder="Doe" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Your Email:</label><br>
                    <input type="email" name="email" placeholder="example@gmail.com" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="subject">Subject:</label><br>
                    <input type="text" name="subject" placeholder="Subject" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="message">Your Message:</label><br>
                    <textarea name="message" placeholder="Type your message..." id="" cols="30" rows="10" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="reset">
                    <input type="submit" value="Send Message">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
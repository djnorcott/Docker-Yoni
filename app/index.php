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
                    <input type="submit" name="submit" value="Send Message">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<?php

// defining variables and set to empty values

$nameErr = $emailErr = $websiteErr = $genderErr = "";
$name = $email = $website = $comment = $gender =  $submit = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // $submit = $_POST["submit"];

    // Name Validations
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white spaces allowed";
    } elseif (empty($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = check_data($_POST["name"]);
    }

    // Email validations
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = check_data($_POST["email"]);
    }
    // check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Website validations
    if (empty($_POST["website"])) {
        $website = "";
    } //elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
    //     $websiteErr = "Invalid URL";
    //} 
    else {
        $website = check_data($_POST["website"]);
    }

    // Comment validations
    if (empty($_POST["empty"])) {
        $comment = "";
    } else {
        $comment = check_data($_POST["comment"]);
    }

    // Gender validations
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required!";
    } else {
        $gender = check_data($_POST["gender"]);
    }


    // if (isset($submit)) {
    //     echo "Your name is " . $name .  ", your email is " . $email . "";
    // }
}

function check_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>day 001</title>
</head>

<body>
    <h1>Welcome to day 001</h1>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <fieldset>
            <legend>Personal Information: </legend>
            <label for="name">Name: </label>
            <br>
            <input type="text" name="name" placeholder="name">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br>
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" placeholder="email">
            <span class="error">* <?php echo $emailErr; ?></span>
            <br>
            <label for="website">Website: </label>
            <br>
            <input type="text" name="website" placeholder="website">
            <span class="error"> <?php echo $websiteErr; ?></span>
            <br>
            <label for="comment">Comment: </label>
            <br>
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
            <br>
            <label for="gender">Gender:
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
                <span class="error">* <?php echo $genderErr; ?></span>
            </label>
            <br>
            <br>
            <button type="submit" name="submit">Submit</button>

        </fieldset>
    </form>

    <h2>Your Info:</h2>
    <?php
    echo "your name is " . $name . "<hr>";
    if ($website != null) {
        echo "your have a website with the following url " . $website . "<hr>";
    }
    if ($comment != null) {
        echo "Here's what you think:  " . $comment . "<hr>";
    }
    echo "your email is " . $email . "<hr>";

    echo "your gender: " . $gender . "<hr>";

    ?>

</body>

</html>
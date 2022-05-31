<?php
// session_start();
// if (isset($_SESSION['user'])) {
//     header('location:prof.php');
//     exit();
// }

if (isset($_POST['submit'])) {
    include 'conn-db.php';
    $FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING);
    $LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
    $UserName = filter_var($_POST['UserName'], FILTER_SANITIZE_STRING);
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $PhoneNumber = filter_var($_POST['PhoneNumber'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    $errors = [];
    // validate FirstName
    if (empty($FirstName)) {
        $errors[] = "First name must be entered";
    } elseif (strlen($FirstName) > 50) {
        $errors[] = "The First name must be no more than 50 characters";
    }

    // validate LastName
    if (empty($LastName)) {
        $errors[] = "Last name must be entered";
    } elseif (strlen($LastName) > 50) {
        $errors[] = "The Last name must be no more than 50 characters";
    }

    // validate UserName
    if (empty($UserName)) {
        $errors[] = "User name must be entered";
    } elseif (strlen($UserName) > 50) {
        $errors[] = "The User name must be no more than 50 characters";
    }
    $stm = "SELECT UserName FROM user WHERE UserName ='$UserName'";
    $q = $conn->prepare($stm);
    $q->execute();
    $data = $q->fetch();
    if ($data) {
        $errors[] = "Username already exists Please enter another name";
    }

    // validate Email
    if (empty($Email)) {
        $errors[] = "Email must be entered";
    } elseif (filter_var($Email, FILTER_VALIDATE_EMAIL) == false) {
        $errors[] = "wrong Email";
    }

    // validate PhoneNumber
    if (empty($PhoneNumber)) {
        $errors[] = "Phone number must be entered";
    } elseif (strlen($PhoneNumber) != 10) {
        $errors[] = "The Phone number must consist of 10 digits";
    }

    // validate Password
    if (empty($Password)) {
        $errors[] = "Password must be entered";
    } elseif (strlen($Password) < 5) {
        $errors[] = "The Password must be no less than 5 characters ";
    }

    if (empty($errors)) {
        $Password = password_hash($Password, PASSWORD_DEFAULT);
        $stm = "INSERT INTO user (FirstName,LastName,UserName,Email,PhoneNumber,Password) VALUES ('$FirstName','$LastName','$UserName','$Email','$PhoneNumber','$Password')";
        $conn->prepare($stm)->execute();
        $_POST['FirstName'] = '';
        $_POST['LastName'] = '';
        $_POST['UserName'] = '';
        $_POST['Email'] = '';
        $_POST['PhoneNumber'] = '';

        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SIGN UP</title>
    <style>
    p {
        font-family: monospace, Calibri;
        font-size: 3em;
        text-align: center;
        color: #61A0C1;
        margin-right: 2em;
    }

    label {
        font-family: monospace, Calibri;
        font-size: 1.5em;
        color: #A75C5C;
    }

    div {
        margin-left: 45em;

    }

    input {
        margin-left: 1em;
    }

    #Password {
        margin-left: 5em;
    }

    #Email {
        margin-left: 8em;
    }

    #UserName {
        margin-left: 4em;
    }

    #LastName {
        margin-left: 4em;
    }

    #FirstName {
        margin-left: 3em;
    }

    input {
        width: 17em;
    }

    #button {
        width: 6em;
        height: 1.5em;
        font-family: monospace;
        font-size: 1.5em;
        font-weight: 400;
        text-align: center;
        color: rgb(42, 65, 68);
        border-color: #E5D7DA;
        background-image: linear-gradient(180.0deg, #FFFFFF 0.001%, #E5D7DA 99.99999999999997%);
        margin-left: 2em;
        cursor: pointer;
        margin-top: 1em;
        margin-left: 8em;
    }

    img {
        width: 35em;
        float: left;
        margin-left: 17em;
    }

    body {
        margin-top: 9em;
        background-image: linear-gradient(90deg, rgb(204, 220, 223) 0.001%, #FFFFFF 99.99999999999997%);
    }

    #l {
        padding-top: 1em;
    }

    #lang {
        margin-right: 1em;
        color: rgb(42, 65, 68);
        cursor: pointer;
        font-family: monospace;
        font-size: 2em;
        font-weight: 400;
        text-align: center;
        border: none;
    }
    </style>
</head>

<body>




    <img src="images/logo.PNG" class="logo" alt="logo" />
    <div>
        <form action="signup.php" method="POST">
            <p id="sign-up">sign up</p>
            <label for="FirstName" id="first">First name:</label>
            <input type="text" name="FirstName" id="FirstName" required value="<?php if (isset($_POST['FirstName'])) {
                                                                                    echo $_POST['FirstName'];
                                                                                } ?>"><br>
            <label for="LastName" id="last">Last name:</label>
            <input type="text" name="LastName" id="LastName" required value="<?php if (isset($_POST['LastName'])) {
                                                                                    echo $_POST['LastName'];
                                                                                } ?>"><br>
            <label for="UserName" id="user">User name:</label>
            <input type="text" name="UserName" id="UserName" required value="<?php if (isset($_POST['UserName'])) {
                                                                                    echo $_POST['UserName'];
                                                                                } ?>"><br>
            <label for="Email" id="email">Email:</label>
            <input type="email" name="Email" id="Email" required placeholder="yourname@example.com" value="<?php if (isset($_POST['Email'])) {
                                                                                                                echo $_POST['Email'];
                                                                                                            } ?>"><br>
            <label for="PhoneNumber" id="phone">Phone number:</label>
            <input type="tel" name="PhoneNumber" id="PhoneNumber" required placeholder="05--------" value="<?php if (isset($_POST['PhoneNumber'])) {
                                                                                                                echo $_POST['PhoneNumber'];
                                                                                                            } ?>"><br>
            <label for="Password" id="pass">Password:</label>
            <input type="password" name="Password" id="Password" required><br> <br>
            <?php
            if (isset($errors)) {
                if (!empty($errors)) {
                    foreach ($errors as $msg) {
                        echo "<font color='red'; size='2.5'>" . $msg . "<br>" . "</font>";
                    }
                }
            }
            ?>
            <input type="submit" name="submit" value="submit" id="button">
            <button onclick="arabic()" id="lang">EN</button>
        </form>
    </div>


    <script>
    function arabic() {
        var first = document.getElementById('first');


        if (document.getElementById('lang').innerHTML === "EN") {
            document.getElementById('lang').innerHTML = "AR";

            document.getElementById('sign-up').innerHTML = "حساب جديد";

            document.getElementById('LastName').style.marginLeft = "4.5em";
            document.getElementById('last').innerHTML = "الإسم الأخير:";

            document.getElementById('FirstName').style.marginLeft = "5em";
            first.innerHTML = "الإسم الأول:";

            document.getElementById('UserName').style.marginLeft = "2.7em";
            document.getElementById('user').innerHTML = "إسم المستخدم:";

            document.getElementById('Email').style.marginLeft = "8.1em";
            document.getElementById('email').innerHTML = "الإيميل:";

            document.getElementById('PhoneNumber').style.marginLeft = "5.1em";
            document.getElementById('phone').innerHTML = "رقم الجوال:";

            document.getElementById('pass').innerHTML = "الرقم السري:";
        } else {
            document.getElementById('lang').innerHTML = "EN";

            document.getElementById('sign-up').innerHTML = "Sign up";

            document.getElementById('FirstName').style.marginLeft = "3em";
            first.innerHTML = "First name:";

            document.getElementById('LastName').style.marginLeft = "3.9em";
            document.getElementById('last').innerHTML = "Last name:";

            document.getElementById('UserName').style.marginLeft = "3.9em";
            document.getElementById('user').innerHTML = "User name:";

            document.getElementById('Email').style.marginLeft = "7.9em";
            document.getElementById('email').innerHTML = "Email:";

            document.getElementById('PhoneNumber').style.marginLeft = "1em";
            document.getElementById('phone').innerHTML = "Phone number:";

            document.getElementById('Password').style.marginLeft = "4.9em";
            document.getElementById('pass').innerHTML = "Password:";
        }
    }
    </script>
</body>

</html>
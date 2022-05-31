<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:prof.php');
    exit();
}
if (isset($_POST['submit'])) {
    include 'conn-db.php';
    $UserName = filter_var($_POST['UserName'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    // $_SESSION['username'] = $UserName;

    $errors = [];


    // validate UserName
    if (empty($UserName)) {
        $errors[] = "User name must be entered";
    }


    // validate Password
    if (empty($Password)) {
        $errors[] = "Password must be entered";
    }



    // select or errros 
    if (empty($errors)) {
        $stm = "SELECT * FROM user WHERE UserName ='$UserName'";
        $q = $conn->prepare($stm);
        $q->execute();
        $data = $q->fetch();
        if (!$data) {
            $errors[] = "There is no registered User Name with this name";
        } else {

            $passhash = $data['Password'];

            if (password_verify($Password, $passhash)) {
                $_SESSION['user'] = [
                    "FirstName" => $data['FirstName'],
                    "LastName" => $data['LastName'],
                    "UserName" => $data['UserName'],
                    "Email" => $data['Email'],
                    "PhoneNumber" => $data['PhoneNumber'],
                ];
                $_SESSION['user_name'] = $UserName;
                header('location:explore.php');
            } else {
                $errors[] = "wrong Password";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>LOG IN</title>
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

    #ph {
        color: red;
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
        <form action="login.php" method="POST">
            <p id="l">Log in</p>
            <label for="UserName" id="user">User name:</label>
            <input type="text" name="UserName" id="UserName" required><br>
            <label for="Password" id="pass">Password:</label>
            <input type="password" name="Password" id="Password" required><br><br>
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
        if (document.getElementById('lang').innerHTML === "EN") {
            document.getElementById('lang').innerHTML = "AR";
            document.getElementById('l').innerHTML = "تسجيل الدخول";
            document.getElementById('UserName').style.marginLeft = "2.7em";
            document.getElementById('user').innerHTML = "إسم المستخدم:";
            document.getElementById('pass').innerHTML = "الرقم السري:";

        } else {
            document.getElementById('lang').innerHTML = "EN";
            document.getElementById('l').innerHTML = "log in";
            document.getElementById('UserName').style.marginLeft = "3.9em";
            document.getElementById('user').innerHTML = "User name:";
            document.getElementById('Password').style.marginLeft = "4.9em";
            document.getElementById('pass').innerHTML = "Password:";
        }
    }
    </script>
</body>

</html>
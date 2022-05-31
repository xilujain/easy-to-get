<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>EASY TO GET</title>
    <style>
    img {
        width: 40%;
        margin-left: 28em;
        margin-top: 3em;
        margin-bottom: 2.5em;
        animation: animation 2s forwards 2.5s;
    }

    body {
        background-image: linear-gradient(90deg, rgb(204, 220, 223) 0.001%, #FFFFFF 99.99999999999997%);
    }

    div {
        margin-left: 12.7em;
    }

    p {
        font-size: 1.5em;
        color: rgb(42, 65, 68);
        cursor: pointer;
        text-align: center;
    }

    button {
        width: 6em;
        height: 1.5em;
        font-family: monospace;
        font-size: 2.5em;
        font-weight: 400;
        text-align: center;
        color: rgb(42, 65, 68);
        border-color: #E5D7DA;
        background-image: linear-gradient(180.0deg, #FFFFFF 0.001%, #E5D7DA 99.99999999999997%);
        margin-left: 4em;
        cursor: pointer;
    }

    footer {
        padding-bottom: 2em;
        margin-top: 7em;
        width: 100%;
        background-color: #ded1d5;
        font-family: 'Courier New', Courier, monospace;
        color: rgb(42, 65, 68);
        padding-top: 1%;
    }

    footer h3 {
        margin-bottom: 5em;
        margin-left: 7em;
    }

    footer p {
        margin-top: -2em;

    }

    footer small {
        float: right;
    }

    #lang {
        margin-top: 2em;
        margin-left: 20em;
        width: 6em;
        height: 1.5em;
        font-family: monospace;
        font-size: 2.5em;
        font-weight: 400;
        text-align: center;
        color: rgb(42, 65, 68);
        text-align: center;
        border: none;
        cursor: pointer;
        background-image: none;
    }

    @keyframes animation {
        from {
            bottom: 100%;
        }

        to {
            bottom: 0%;
        }
    }
    </style>

</head>

<body>
    <img src="images/logo.PNG" alt="logo" /><br>
    <div>
        <a href="signup.php"><button type="button" name="button" id="sign-up">Sign up</button></a>
        <a href="login.php"><button type="button" name="button" id="log">Log in</button></a>
        <a href="explore.php"><button type="button" name="button" id="guest">Guest</button></a><br>
    </div>
    <button onclick="arabic()" id="lang">EN</button>
    <footer>
        <h3 id="c">CONTACT US</h3>
        <p>
        <pre>             EMAIL :    email@gmail.com
          PHONE NUMBER :    +966541111111</pre>
        </p>
        <small>&copy;2021 All rights reserved.</small>
    </footer>

    <script>
    function arabic() {
        if (document.getElementById("lang").innerHTML === "EN") {
            document.getElementById("sign-up").innerHTML = "حساب جديد";
            document.getElementById("guest").innerHTML = "الدخول كضيف";
            document.getElementById("log").innerHTML = "تسجيل الدخول";
            document.getElementById("lang").innerHTML = "AR";
            document.getElementById("c").innerHTML = "للتواصل";
        } else {
            document.getElementById("sign-up").innerHTML = "Sign up";
            document.getElementById("guest").innerHTML = "Guest";
            document.getElementById("log").innerHTML = "Log in";
            document.getElementById("lang").innerHTML = "EN";
            document.getElementById("c").innerHTML = "contact us";
        }
    }
    </script>
</body>

</html>
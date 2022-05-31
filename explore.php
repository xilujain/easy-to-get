<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>EASY TO GET</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Lato|ZCOOL+KuaiLe&display=swap');


    .head ul {
        list-style-type: none;
    }

    header {
        height: 6em;
        width: 100%;
        background-color: #ded1d5;
    }

    body {
        background-image: linear-gradient(90deg,
                rgb(204, 220, 223) 0.001%,
                #ffffff 99.99999999999997%);
    }

    #lang {
        color: rgb(42, 65, 68);
        cursor: pointer;
        font-family: monospace;
        font-size: 2.5em;
        font-weight: 400;
        text-align: center;
        border: none;
        background-color: #ded1d5;
    }

    .head li {
        display: inline;
    }

    .logo {
        width: 20%;
        float: right;
        margin-top: -7em;
    }

    .user {
        transform: translate(170%, 50%);
        cursor: pointer;
        margin-bottom: 1em;
    }

    section {
        position: relative;
        height: 70em;
        padding-top: 5em;
        padding-bottom: 30em;
    }

    .content {
        margin-top: 7em;
        margin-left: 12em;
    }

    .content li {
        display: inline;
        margin: 4em;
    }

    .content img {
        cursor: pointer;
    }

    .container {
        position: relative;
        width: 20%;
        display: flex;
        float: left;

    }

    .image {
        display: inline;
    }

    .overlay {
        position: absolute;
        bottom: 3%;
        left: 15.6%;
        right: 0;
        background-color: #e5d7da;
        overflow: hidden;
        width: 64%;
        height: 0;
        transition: .5s ease;
    }

    .container:hover .overlay {
        height: 50%;
    }

    .text {
        color: rgb(42, 65, 68);
        font-size: 13px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    footer {
        margin-top: 10em;
        height: 8em;
        width: 100%;
        background-color: #ded1d5;
        font-family: "Courier New", Courier, monospace;
        color: rgb(42, 65, 68);
        padding-top: 1%;
    }

    footer h3 {
        margin-left: 7em;
    }

    footer small {
        float: right;
    }



    .loader {
        font-family: 'ZCOOL KuaiLe', cursive;
        font-size: 40px;
        color: palevioletred;
        text-align: center;
        margin-top: 8em;
    }

    .loader::after {
        content: '\2026';
        display: inline-block;
        overflow: hidden;
        vertical-align: bottom;
        animation: dots steps(4, end) 2s infinite;
        width: 0px;
    }

    @keyframes dots {
        to {
            width: 1.25em;
        }
    }

    .main {
        opacity: 0;
        display: none;
        transition: opacity 1s ease-in;
    }
    </style>
</head>

<body>



    <div class="loader">Loading</div>

    <div class="main">
        <header>
            <div class="head">
                <ul>
                    <li>
                        <button onclick="arabic()" id="lang" style="margin-top:2%;">EN</button>
                    </li>
                    <a href="prof.php">
                        <li><img class="user" src="images/user.jpeg" alt="profile" width="40" height="40"></li>
                    </a>
                </ul>

                <img src="images/logo.PNG" class="logo" />
            </div>
        </header>
        <section>
            <div class="content">
                <ul>
                    <a href="clothes.php">
                        <li><img src="images/clothes.PNG" alt="bag" width="200" height="200" id="clothes"></li>
                    </a>
                    <a href="bags.php">
                        <li><img src="images/bag.PNG" alt="bag" width="200" height="200" id="bags"></li>
                    </a>
                    <a href="book.php">
                        <li><img src="images/book.PNG" alt="bag" width="200" height="200" id="books"></li>
                    </a>
                </ul>
            </div>

            <?php

            include 'conn-db.php';
            $query = $conn->query(" SELECT * FROM `addproduct` ");


            while ($row = $query->fetch()) {
            ?>
            <div class="container">
                <div class="image">
                    <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" alt="image" style="width: 190px; height: 190px; margin-top:10em; margin-left:3em;" >'; ?>
                </div>
                <div class="overlay"><br><br>
                    <div class="text"> <?php echo 'Mobile Number : ' . $row['phone']; ?><br><br>
                        <?php echo 'price : ' . $row['price']; ?> <br>
                        <?php echo 'Comment : ' . $row['comment']; ?></div>
                </div>
            </div>
            <?php
            }
            ?>
        </section>
        <footer>
            <h3 id="c">CONTACT US</h3>
            <p>
            <pre>             EMAIL :    email@gmail.com
          PHONE NUMBER :    +966541111111</pre>
            </p>
            <small>&copy;2021 All rights reserved.</small>
        </footer>
    </div>

    <script>
    function arabic() {
        if (document.getElementById("lang").innerHTML === "EN") {
            document.getElementById('bags').src = "images/bag-a.png";
            document.getElementById('clothes').src = "images/clothes-a.png";
            document.getElementById('books').src = "images/book-a.png";
            document.getElementById("lang").innerHTML = "AR";
            document.getElementById("c").innerHTML = "للتواصل";
        } else {
            document.getElementById('bags').src = "images/bag.PNG";
            document.getElementById('clothes').src = "images/clothes.PNG";
            document.getElementById('books').src = "images/book.PNG";
            document.getElementById("lang").innerHTML = "EN";
            document.getElementById("c").innerHTML = "contact us";
        }
    }



    const loader = document.querySelector('.loader');
    const main = document.querySelector('.main');

    function init() {
        setTimeout(() => {
            loader.style.opacity = 0;
            loader.style.display = 'none';

            main.style.display = 'block';
            setTimeout(() => (main.style.opacity = 1), 50);
        }, 4000);
    }

    init();
    </script>
</body>

</html>
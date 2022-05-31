<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
        margin-top: 50em;
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

    .topnav {
        margin-top: 5em;
        overflow: hidden;
        background-color: #5e5e5e;
        width: 80%;
        height: 20%;
        margin-left: 16em;
    }

    .topnav a {
        margin-left: 9em;
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding-top: 1rem;
        padding-bottom: 1rem;
        text-decoration: none;
        font-size: 18px;
    }

    .topnav a:hover {
        background-color: #282828;
        color: #ddd;
    }

    .explorebtn {
        background-color: #ded1d5;
        border: none;
        padding: 14px 18px;
        font-size: 50px;
        cursor: pointer;
    }

    .explorebtn a {
        color: #818181;
        text-decoration: none;
    }

    .explorebtn a:hover {
        color: white;
    }

    .logo {
        width: 20%;
        float: right;
        margin-top: -2em;
    }

    .story {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        overflow: hidden;
    }

    .story img {
        width: 100px;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .story svg {
        fill: none;
        stroke: #8a3ab8;
        stroke-width: 3px;
        stroke-dasharray: 4;
        stroke-dashoffset: 0;
        stroke-linecap: round;
        animation: loading 4500ms ease-in-out infinite alternate;
    }

    .story::after {
        display: inline-block;
        overflow: hidden;
        vertical-align: bottom;
        animation: loading 2s infinite;
        width: 0px;
    }

    @keyframes loading {
        100% {
            stroke: #cd476b;
            stroke-dasharray: 10;
            transform: rotate(200deg);
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
    <div class="story">
        <img src="images/book.PNG" alt="">
        <svg viewbox="0 0 100 100">
            <circle cx="50" cy="50" r="45" />
        </svg>
    </div>

    <div class="main">
        <header>
            <img src="images/logo.png" class="logo" />

            <button onclick="arabic()" id="lang"
                style="float: right; margin-top: 2em; cursor: pointer; font-size: 1em; background-color: #ded1d5; border:none;">EN
            </button>

            <button class="explorebtn"><a href="explore.php" class="fa fa-home"></a></button>
        </header>

        <section>
            <div class="contain" style="width: 80%; height: 20%;">
                <div class="topnav" style="width: 80%; height: 20%; margin-left:16em;">
                    <a class="active" href="clothes.php" style="height: 5%; width: 5%;margin-top:3%;"
                        id="clothes">clothes</a>
                    <a href="bags.php" style="height: 5%; width: 5%;margin-top:3%;" id="bags">bags</a>
                    <a href="book.php" style="height: 5%; width: 5%;margin-top:3%;" id="books">books</a>
                    <a href="filter.php" style="height: 5%; width: 5%;" id="filter">Filetr by price</a>
                </div>
            </div>
            <?php
        include 'conn-db.php';
        $display =  $conn->query("SELECT * FROM addproduct WHERE type = 'books' ");



        while ($row = $display->fetch()) {
            ?>
            <div class="container">
                <div class="image">
                    <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" alt="image" style="width: 190px; height: 190px; margin-top:10em; margin-left:3em;" >'; ?>
                </div>

                <div class="overlay"><br><br>
                    <div class="text"><?php echo 'Mobile Number : ' . $row['phone']; ?><br>
                        <?php echo 'price : ' . $row['price']; ?> <br>
                        <?php echo 'Comment : ' . $row['comment']; ?></div> <br>
                </div>
            </div>
            <?php
            }
            ?>
        </section>

        <footer>
            <h3>CONTACT US</h3>
            <p>
            <pre>             EMAIL :    email@gmail.com
      PHONE NUMBER :    +966541111111</pre>
            </p>
            <small>&copy;2021 All rights reserved.</small>
        </footer>
    </div>

    <script>
    function arabic() {
        if (document.getElementById('lang').innerHTML === "EN") {
            document.getElementById('lang').innerHTML = "AR";
            document.getElementById('bags').innerHTML = "حقائب";
            document.getElementById('books').innerHTML = "كتب";
            document.getElementById('clothes').innerHTML = "ملابس";
            document.getElementById('filter').innerHTML = "تصنيف";
            document.getElementById("c").innerHTML = "للتواصل";
        } else {
            document.getElementById('lang').innerHTML = "EN";
            document.getElementById('bags').innerHTML = "bags";
            document.getElementById('books').innerHTML = "books";
            document.getElementById('clothes').innerHTML = "clothes";
            document.getElementById('filter').innerHTML = "Filetr by price";
            document.getElementById("c").innerHTML = "contact us";
        }
    }

    const loader = document.querySelector('.story');
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
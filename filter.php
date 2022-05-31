<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Filter</title>
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

    .logo {
        width: 20%;
        float: right;
        margin-top: -2em;
    }

    .topnav {
        margin-top: 5em;
        margin-left: 20em;
        overflow: hidden;
        background-color: #5e5e5e;
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

    .container {
        position: relative;
        width: 20%;
        display: flex;
        float: left;

    }

    .product {
        display: inline;
    }

    .product-t {
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

    .container:hover .product-t {
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

    footer h3 {
        margin-left: 7em;
    }

    footer small {
        float: right;
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

    .filter {
        margin-left: 23em;
        margin-top: 3em;
        font-size: 20px;
        color: #818181;
    }

    .filter h4 {
        padding-left: 10em;
    }

    .filter button {
        background-color: #ded1d5;
        height: 25px;
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
    </style>
</head>

<body>
    <header>
        <img src="images/logo.png" class="logo" />

        <button onclick="arabic()" id="lang"
            style="float: right; margin-top: 2em; cursor: pointer; font-size: 1em; background-color: #ded1d5; border:none;">EN
        </button>

        <button class="explorebtn"><a href="explore.php" class="fa fa-home"></a></button>
    </header>

    <div class="contain" style="width: 80%; height: 20%;">
        <div class="topnav" style="width: 80%; height: 20%; margin-left:16em;">
            <a class="active" href="clothes.php" style="height: 5%; width: 5%; margin-top:3%;" id="clothes">clothes</a>
            <a href="bags.php" style="height: 5%; width: 5%; margin-top:3%;" id="bags">bags</a>
            <a href="book.php" style="height: 5%; width: 5%; margin-top:3%;" id="books">books</a>
            <a href="filter.php" style="height: 5%; width: 5%;" id="filter">filetr by price</a>
        </div>
    </div>


    <form action="" method="GET" class="filter">
        <h4>Filter Produts By Price</h4>
        <label for="">Start Price</label>
        <input type="text" name="start_price" value="<?php if (isset($_GET['start_price'])) {
                                                            echo $_GET['start_price'];
                                                        } else {
                                                            echo "0";
                                                        } ?>" class="form-control">
        <label for="">End Price</label>
        <input type="text" name="end_price" value="<?php if (isset($_GET['end_price'])) {
                                                        echo $_GET['end_price'];
                                                    } else {
                                                        echo "900";
                                                    } ?>" class="form-control">
        <button type="submit" class="btn btn-primary px-4">Filter</button>
    </form>

    <?php
    include("conn-db.php");
    if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
        $startprice = $_GET['start_price'];
        $endprice = $_GET['end_price'];
        $query = $conn->query("SELECT * FROM addproduct WHERE price BETWEEN $startprice AND $endprice ");
        if ($row = $query->fetch() > 0) {
            $display = $conn->query("SELECT * FROM `addproduct` WHERE price BETWEEN $startprice AND $endprice ");
            foreach ($display as $items) { ?>
    <div class="container">
        <div class="product">
            <?php echo '<img src="data:image;base64,' . base64_encode($items['image']) . '" alt="image" style="width: 190px; height: 190px; margin-top:10em; margin-left:3em;" >'; ?>
        </div>
        <div class="product-t"><br>
            <div class="text" style="margin-left: 20px;">
                <?php echo 'Mobile Number : ' . $items['phone']; ?><br>
                <?php echo 'price : ' . $items['price']; ?> <br>
                <?php echo 'Comment : ' . $items['comment']; ?></div> <br>
        </div>
    </div>
    <?php
            }
        } else {
            $query = $conn->query("SELECT * FROM addproduct");
        }
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <h3>CONTACT US</h3>
        <p>
        <pre>             EMAIL :    email@gmail.com
      PHONE NUMBER :    +966541111111</pre>
        </p>
        <small>&copy;2021 All rights reserved.</small>
    </footer>

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
    </script>
</body>

</html>
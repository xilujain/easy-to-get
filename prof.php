<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
    exit();
}
?>


<!DOCTYPE html>

<html lang="en">

<head>


    <meta charset="utf-8">
    <title>profile</title>

    <style>
    .A {
        margin-left: 30em;
        font-family: monospace, Calibri;
        font-size: 1.3em;
        color: #a75c5c;
    }

    .B {
        margin-left: 20em;
        width: 10em;
        height: 1.5em;
        font-family: monospace;
        font-size: 1.5em;
        font-weight: 400;
        text-align: center;
        color: rgb(42, 65, 68);
        border-color: #e5d7da;
        background-image: linear-gradient(180deg,
                #ffffff 0.001%,
                #e5d7da 99.99999999999997%);
        cursor: pointer;
        margin-top: 2em;
    }

    footer {
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

    body {
        background-image: linear-gradient(90deg,
                rgb(204, 220, 223) 0.001%,
                #ffffff 99.99999999999997%);
    }

    .logout {
        width: 3em;
        height: 3em;
        margin-top: 2.5em;
        cursor: pointer;

    }

    .logo {
        width: 20%;
        float: right;
        margin-top: -9em;
    }

    header {
        height: 6em;
        width: 100%;
        background-color: #ded1d5;
    }

    #pr {
        font-size: 3em;
        color: rgb(42, 65, 68);
        margin-left: 10em;
    }

    li {
        display: inline;
        list-style-type: none;
        text-align: center;
        color: rgb(42, 65, 68);
        margin: 2em;
    }

    .head-product {
        display: inline;
    }


    /* /////////////////////////////////////////////////////////////////// */

    .head-view {
        width: 308px;
        height: 49px;
        font-size: 20px;
        color: #836363;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    th {
        font-family: Arial;
        font-size: 15px;
        color: #836363;
        font-size: 14.666667px;
        font-family: OpenSans-Light;
        margin-bottom: 30px;
        width: 50px;
        height: 40px;
        padding-top: 1px;
        padding-right: 6px;
        padding-bottom: 1px;
        padding-left: 11px;
    }

    th,
    td {
        border: 1px solid #DDDDDD;
        background-color: #FFFFFF;
    }

    table {
        margin-left: auto;
        margin-right: auto;
    }


    td {
        width: 20%;
        height: 350px;
        background-color: #FFFFFF;
        padding-right: 10px;
        padding-left: 20px;
        padding-bottom: 10px;
    }

    /* The Modal (background) */
    .modal {
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
        display: none;
    }

    /* Modal Content/Box */
    .modal-content {
        background-image: linear-gradient(180.0deg, #FFFFFF 0.001%, #E5D7DA 99.99999999999999%);
        filter: 0.7071067811865475px 0.7071067811865476px 5px 0px #CBBEBE;
        margin: 5% auto 20% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 3px solid #DDDDDD;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    .close {
        float: right;
        margin-right: 10px;
        margin-top: 10px;
        color: #CBBEBE;
        border: 1px solid #CBBEBE;
        font-size: 20px;
        border-radius: 50%;
    }

    /* Close button on hover */
    .close:hover,
    .close:focus {
        cursor: pointer;
    }

    /* //////////////////////////////////////////////////////////////// */
    form {
        background-image: linear-gradient(180deg, #FFFFFF 0.001%, #E5D7DA 99.99999999999999%);
    }

    .flex-item-1 input[type="text"] {

        width: 250px;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        margin-top: 50px !important;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 0.3s;
    }



    .flex-item-1 input[type="text"]:focus {
        border-color: rgb(168, 183, 197);
        box-shadow: 0 0 8px 0 rgb(176, 186, 196);
    }

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: 2px solid #aaa;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .upload-btn-wrapper {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        cursor: pointer;
    }

    .upload-btn-wrapper img {
        cursor: pointer;
    }

    .upload-btn-wrapper input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .dropdown {
        position: fixed;
        display: inline-table
    }

    .dropdown-content {
        border: 2px solid rgb(99, 98, 98);
        display: block;
        position: absolute;
        background-color: #af8891;
        min-width: 140px;
        height: 30px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .droplabel {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;

        padding: 0;
        margin: 0;


    }

    .dropdown-content a {
        color: rgb(241, 241, 241);
        padding: 17px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: rgb(66, 66, 66);
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #f1d3ea;
    }

    .text-area {
        margin-top: 4rem;
        margin-right: 2cm;

        text-align: left;
        color: rgb(99, 99, 99);
        font-size: 0.8rem;
    }

    .text-area p {
        color: #0b052b;
        margin: 0 !important;
    }

    .text-area textarea {
        border: 2px solid #aaa;
        border-radius: 10px;
    }


    #button {
        width: 6em;
        height: 1.5em;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.5em;
        font-weight: 400;
        margin-top: 3cm;
        margin-right: 6cm;
        text-align: center;
        color: rgb(21, 13, 59);
        border-color: #af8891;
        background-color: #af8891;
        position: fixed;

    }


    @media (max-width: 1000px) {
        .text-area textarea {
            width: 80%;
        }
    }

    #myModal-add {
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 30px;
        display: none
    }

    .flex-container {
        width: 95%;
        /* Full width */
        height: 100%;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-evenly;

        padding: 0;
        margin: 0;
        list-style: none;
    }

    section {
        margin-top: 5em;
        height: 25em;
    }
    </style>


</head>

<body>
    <header>
        <div class="head-product">
            <ul>
                <li><a href="logout.php" alt="Log out"><img class="logout" src="images/logout.png" alt="Logout"></a>
                </li>
                <li id="pr">PROFILE</li>
            </ul>
            <a href="explore.php">
                <img src="images/logo.PNG" class="logo" alt="logo" />
            </a>

        </div>
        </li>
    </header>
    <br>
    <br>

    <section>
        <p class="A">First Name : <?php echo $_SESSION['user']['FirstName']; ?></p>
        <p class="A">Last Name : <?php echo $_SESSION['user']['LastName']; ?></p>
        <p class="A">User Name : <?php echo $_SESSION['user']['UserName']; ?></p>
        <p class="A">Email : <?php echo $_SESSION['user']['Email']; ?></p>
        <p class="A">Phone Number : <?php echo $_SESSION['user']['PhoneNumber']; ?><br><br></p>



        <button class="B" id="view" onclick="openForm()">View my products</button>
        <button class="B" id="add" onclick="openForm2()">Add product</button>
    </section>


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


    <!-- ///////////////////////////////////////////////////////////////////////////// -->

    <?php
    if (isset($_POST['ssubmit'])) {
        include 'conn-db.php';

        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


        $image = $file;
        $phone = $_POST['phone'];
        $price = $_POST['price'];
        $comment = $_POST['comment'];
        $type = $_POST['type'];
        $u = $_SESSION['user_name'];
        $sql = $conn->prepare("INSERT INTO addproduct (`image`, `phone` , `price` , `comment`, `type`, `UserName`) VALUES ('$image' , '$phone' , '$price' , '$comment' , '$type', '$u')");
        $row = $sql->execute();
    }
    ?>
    <div id="myModal-add">
        <div class="head-view">
            <h1 style="background-color: #E5D7DA">Add product</h1>
        </div>
        <span class="close" onclick="closeForm2()">&times;</span>
        <form method="POST" action="" enctype="multipart/form-data">

            <ul class="flex-container">
                <li class="flex-item-1">
                    <input type="text" name="phone" placeholder="+966" />
                    <br>
                    <input type="text" name="price" placeholder="Price" />
                </li>



                <li class="flex-item">
                    <div class="upload-btn-wrapper">

                        <button class="btn"><img src="./images/photo.png" alt="" /></button>
                        <input type="file" name="image" />



                    </div>


                    <br>
                    <br><br>
                    <div class="dropdown">
                        <label class="droplabel">Choose the type</label>
                        <br> <br>
                        <select name="type" class="dropdown-content">
                            <option value=" "> </option>
                            <option value="clothes">Clothes</option>
                            <option value="bags">Bags</option>
                            <option value="books">Books</option>
                        </select>
                    </div>
                </li>
            </ul>
            <br><br>
            <div class="flex-container text-area">
                <div class="">
                    <p>Add Comment 0/210</p>
                    <textarea name="comment" placeholder="@user" cols="100" rows="15"></textarea>
                </div>
                <div class="sub-btn">
                    <a href="">
                        <input type="submit" name="ssubmit" value="submit" id="button" />
                    </a>
                </div>
            </div>

        </form>
    </div>
    <!-- /////////////////////////////////////////////////////////////////// -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeForm()">&times;</span>


            <header class="head-view">
                <h2>view my products</h2>
            </header>

            <table>
                <tr>
                    <th>Displayed</th>

                </tr>


                <tr>
                    <td>
                        <?php
                        // session_start();
                        include 'conn-db.php';
                        $image_user = $_SESSION['user_name'];
                        $stm = $conn->query("SELECT * FROM addproduct WHERE UserName='$image_user'");
                        while ($row = $stm->fetch()) {
                        ?>
                        <div class="container">
                            <div class="product">
                                <a href="cancel.php?price=<?php echo $row['price']; ?>"
                                    style=" color:red; float:right; margin-right: 50em;">X</a>
                                <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" alt="image" style="width: 190px; height: 190px; margin-left: 20px;">'; ?>
                            </div>
                            <?php
                        }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>

        </div>

    </div>




    <script>
    function openForm() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myModal").style.display = "none";
    }

    function openForm2() {
        document.getElementById("myModal-add").style.display = "block";
    }

    function closeForm2() {
        document.getElementById("myModal-add").style.display = "none";
    }
    </script>
</body>

</html>
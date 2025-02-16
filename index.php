<?php
include "include/config.php";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="language" content="Thai">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>อ.ต.ก.</title>
    <link rel="icon" type="image/png" href="" />
    <link rel="stylesheet" type="text/css" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/web.css">


    <script type="text/javascript" src="/jquery-3.6.3/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/util.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>
    <style>
        .full-width-image {
            width: 100%;
            /* ทำให้รูปภาพมีความกว้างเท่ากับความกว้างของหน้าจอ */
            height: auto;
            /* รักษาสัดส่วนของรูปภาพ */
            display: block;
            /* ป้องกันช่องว่างด้านล่างของรูปภาพ */
        }
    </style>
</head>

<body>
    <div class="position-relative">
        <img src="images/bg4.png" class="full-width-image">
        <div class="container position-absolute start-50 translate-middle" style="top:50%">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>ทดสอบหน้าเวป</h1>
                </div>
                <?php

                $greeting = array(

                    "welcometh" => "",
                    "welcomeen" => "",

                );

                $sql = "SELECT * FROM greeting WHERE status='T' LIMIT 1";

                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {

                    $greeting["welcometh"] = $row["welcometh"];
                    $greeting["welcomeen"] = $row["welcomeen"];
                }

                echo "<div class=\"col-12 text-center\"><h2>" . $greeting["welcometh"] . "</h2></div>";
                echo "<div class=\"col-12 text-center\"><h2>" . $greeting["welcomeen"] . "</h2></div>";
                ?>


            </div>
        </div>
    </div>
    <div class="container position-relative">
        <div class="row">
            <?php

            $list_news["data"] = [];
            $news = array(
                "id" => "",
                "headnews" => "",
                "headimageurl" => "",
                "headimage" => "",
                "createdate" => "",
                "updatedate" => "",
                "status" => "",
            );
            $sql = "SELECT id,headnews,headimageurl,headimage,createdate,updatedate,status from news where status='T' order by updatedate DESC LIMIT 3";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {

                $news["id"] = $row["id"];
                $news["headnews"] = $row["headnews"];
                $news["headimageurl"] = $row["headimageurl"];
                $news["headimage"] = $row["headimage"];
                $news["createdate"] = $row["createdate"];
                $news["updatedate"] = $row["updatedate"];
                $news["status"] = $row["status"];

                array_push($list_news["data"], $news);

                echo "<div class=\"col-12 text-center\"><a href=\"news.php?id=" . $news["id"] . "\"><img src=\"" . $news["headimageurl"] . "\" width=\"500\"></a></div>";
                echo "<div class=\"col-12 text-center\"><a href=\"news.php?id=" . $news["id"] . "\"><h5>" . $news["headnews"] . "</h5></a></div>";
            }
            ?>
        </div>
    </div>
</body>
<?php mysqli_close($conn); ?>

</html>
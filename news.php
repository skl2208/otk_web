<?php
include "include/config.php";

if (isset($_GET["id"]) && $_GET["id"] != null && $_GET["id"] != "") {

    $id = $_GET["id"];

    $sql = "SELECT id,headnews,headimageurl,headimage,content,createdate,updatedate from news where id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id, $headnews, $headimageurl, $headimage, $content, $createdate, $updatedate);
    $stmt->fetch();

    // ดึงผลลัพธ์
    // if ($stmt->fetch()) {
    //     echo "ID: " . $id . "<br>";
    //     echo "Name: " . $name . "<br>";
    //     echo "Email: " . $email . "<br>";
    // } else {
    //     echo "No records found.";
    // }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="language" content="Thai">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>อ.ต.ก.</title>
    <link rel="icon" type="image/png" href="favicon.png" />
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

        .picture-news {
            width: 100%;
            height: auto;
        }

        .page {
            max-width: 850px;
        }

        .headnews {
            margin-top: 0;
            padding: 10px;
            width: 100%;
            background-color: green;
            color: white;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            /* ห้ามข้อความขึ้นบรรทัดใหม่ */
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
            /* จัดให้อยู่กึ่งกลางความสูง (แนวตั้ง) */

        }

        .space {
            margin-left: 10px;
            margin-right: 10px;

        }
    </style>
</head>

<body>
    <div class="headnews" style="margin-left:0;margin-right:0;height:60px;text-align:left;">
        <div class="col"><a href="javascript:window.history.back();"><img src="images/93634.png" width="30" class="space"></a><?php echo $headnews ?></div>
    </div>
    <!-- <div class="headnews">
        <p><h3><?php echo $headnews ?></h3></p>
    </div> -->
    <div class="container page">
        <div class="row">

            <div class="col-12 text-start">
                <img src="<?php echo $headimageurl ?>" class="picture-news">
            </div>
            <div class="col-12 text-start">
                <?php echo $content ?>
            </div>
        </div>
    </div>
</body>

</html>
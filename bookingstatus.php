<?php
$pdo = new PDO("mysql:host=localhost; dbname=funtasy; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <style>
        body {
            background-color: #F9f2e7;
            color: #47467b;
        }

        fieldset {
            margin-top: 20px;
            padding: 1em;
            font-size: 2em;
            color: #7867bf;
            border: none;
        }

        legend {
            font-weight: bold;
            color: #47467b;
        }

        input {
            color: #47467b;
            font-size: 1em;
            width: 20em;
            height: 2em;
        }

        button {
            border: none;
            font-size: 1.5em;
            color: #47467b;
            padding: 10px 50px;
            text-align: center;
            cursor: pointer;
            background-color: #f7b1c3;
            margin-left: 1em;
        }

        button:hover {
            background-color: #7867bf;
            color: white;
        }

        .compo {
            padding: 2em;
            background-color: #f7b1c3;
            margin: 2em;
            border-radius: 20px;
        }

        .search {
            color: #47467b;
            margin: 3em;
            border-radius: 1em;
        }
        label {
            font-size: 1.8em;
        }

        h2 {
            color: #47467b;
            font-size: 2.5em;
            text-align: center;
            padding: 0.4em;
            margin: 0;
        }
        button {
            border-radius: 10px;
        }
        footer {
            margin: 2em;
        }
    </style>
</head>

<body>
    
    <h2>ประวัติการเข้ารับการรักษา</h2>
    <div class="search">
        <form>
            <label for="keyword">Username: </label>
            <input type="text" name="keyword" autofocus>
            <button>ค้นหา</button>
        </form>
    </div>

    <div style="display:flex">
        <?php
        $stmt = $pdo->prepare("SELECT
        `คนไข้`.`Username`,
        `ทันตแพทย์`.`ชื่อ_สกุลทันตแพทย์`,
        `การตรวจสอบ`.`รหัสคนไข้`,
        `คนไข้`.`ชื่อ-สกุลคนไข้`,
        `ใบนัด`.`วันที่นัด`,
        `การบันทึกข้อมูล`.`วันที่ออกใบนัด`,
        `การบันทึกข้อมูล`.`รหัสประเภททันตกรรม`
    FROM
        `การบันทึกข้อมูล`
    JOIN `การตรวจสอบ` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `การตรวจสอบ`.`รหัสคนไข้`
    JOIN `ทันตแพทย์` ON `การตรวจสอบ`.`รหัสทันตแพทย์` = `ทันตแพทย์`.`รหัสทันตแพทย์`
    JOIN `ใบนัด` ON `การบันทึกข้อมูล`.`รหัสใบนัด` = `ใบนัด`.`รหัสใบนัด`
    JOIN `คนไข้` ON `ใบนัด`.`Username` = `คนไข้`.`Username`
    WHERE
    `คนไข้`.`Username` LIKE ?");
        if (!empty($_GET))
            $value = '%' . $_GET["keyword"] . '%';
        $stmt->bindParam(1, $value);
        $stmt->execute();
        while ($row = $stmt->fetch()) : ?>
            <div class="compo">
                <form>
                    <fieldset>
                        <legend>ประวัติการเข้ารับการรักษา </legend>
                        <b>ชื่อ-สกุลคนไข้: </b><?= $row["ชื่อ-สกุลคนไข้"] ?><br><br>
                        <b>ประเภทการรักษา: </b><?= $row["รหัสประเภททันตกรรม"] ?><br><br>
                        <b>ชื่อ-สกุลทันตแพทย์: </b><?= $row["ชื่อ_สกุลทันตแพทย์"] ?><br><br>
                        <b>วันที่นัด: </b><?= $row["วันที่นัด"] ?><br><br>
                        <b>วันที่ออกใบนัด: </b><?= $row["วันที่ออกใบนัด"] ?><br><br>
                    </fieldset>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>

<footer>
    <form>
        <button formaction="loginsuccess.php">BACK</button>
    </form>
</footer>

</html>
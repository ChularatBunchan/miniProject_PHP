<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<html>

<head>
    <meta chaset="utf-8">
    <style>
        body {
            background-color: #F9f2e7;
            color: #47467b;
        }

        h1 {
            margin: 2em;
            font-size: 3em;
        }

        table {
            float: left;
            font-size: 1.5em;
        }

        td,
        th {
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            border-color: black;
            border: black 1.5px solid;
        }

        th {
            background-color: #fad26d;
            ;
        }


        .total {
            padding: 5em;
            padding-bottom: 9em;
            border-radius: 2em;
            background-color: #f7b1c3;
            margin: 2em;
        }

        fieldset {
            border: none;
            text-align: center;
            font-size: 2em;
        }

        button,
        #submit {
            border: none;
            font-size: 30px;
            color: #fff;
            padding: 20px 50px;
            text-align: center;
            cursor: pointer;
            background-color: #7867bf;
            border-radius: 20px;
        }
        input {
            font-size: 1em;
            color: #47467b;
            border-color: #47467b;
            border-radius: 1em;
            padding: 0.5em;
        }

        select {
            font-size: 1em;
            color: #47467b;
            border-color: #47467b;
            border-radius: 0.5em;
            padding: 0.3em;
        }

        button:hover {
            background-color: #47467b;
            color: white;
        }

        #submit:hover {
            background-color: #47467b;
            color: white;
        }

        footer {
            margin-left: 10em;
        }
    </style>
    <script>
        function Confirm() {
            alert("Booking success!! please go back");
        }
    </script>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT
             `ตารางนัดทันตแพทย์`.`วันที่ทันตแพทย์เข้าเวร`,
             `ตารางนัดทันตแพทย์`.`เวลาที่ทันตแพทย์เข้าเวร`,
             `การบันทึกข้อมูล`.`รหัสประเภททันตกรรม`
         FROM
             `การบันทึกข้อมูล`
         JOIN `ใบนัด` ON `ใบนัด`.`รหัสใบนัด` = `การบันทึกข้อมูล`.`รหัสใบนัด`
         JOIN `ตารางนัดทันตแพทย์` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `ตารางนัดทันตแพทย์`.`รหัสคนไข้`
         JOIN `การตรวจสอบ` ON `ตารางนัดทันตแพทย์`.`รหัสคนไข้` = `การตรวจสอบ`.`รหัสคนไข้`;
         INSERT INTO `ใบนัด`(`วันที่นัด`, `username`) VALUES (?,?)
        ");
    $stmt->execute();
    ?>
    <center>
        <h1>BOOKING</h1>
        <div class="total">
            <div class="Table">
                <table>
                    <tr>
                        <th>วัน</th>
                        <th>เวลา</th>
                    </tr>
                    <?php while ($row = $stmt->fetch()) : ?>
                        <tr>
                            <td><?= $row["วันที่ทันตแพทย์เข้าเวร"] ?></td>
                            <td><?= $row["เวลาที่ทันตแพทย์เข้าเวร"] ?></td>
                        </tr>
                    <?php endwhile ?>

                </table>

                <table>
                    <tr>
                        <th>ประเภททันตกรรม</th>
                    </tr>
                    <tr>
                        <td>ถอนฟัน</td>
                    </tr>
                    <tr>
                        <td>จัดฟัน</td>
                    </tr>
                    <tr>
                        <td>ขูดหินปู</td>
                    </tr>
                    <tr>
                        <td>อุดฟัน</td>
                    </tr>
                    <tr>
                        <td>รากเทียม</td>
                    </tr>
                </table>
            </div>

            <br>
            <div>
                <form>
                    <fieldset>
                        <b>ประเภททันตกรรม</b>
                        <select>
                            <option value="">--ประเภททันตกรรม--</option>
                            <option value="TB">ถอนฟัน</option>
                            <option value="TE">จัดฟัน</option>
                            <option value="TF">ขูดหินปูน</option>
                            <option value="TI">อุดฟัน</option>
                            <option value="TS">รากเทียม</option>
                        </select><br><br>
                        <b>เลือกวันและเวลา</b>
                        <input type="date" require>
                        <input type="time" require><br><br>
                        <input type="submit" id="submit" onclick="Confirm()" value="SUBMIT">
                    </fieldset>

                </form>
            </div>

        </div>
    </center>

    <footer>
        <form>
            <button formaction="loginsuccess.php">BACK</button>
        </form>
    </footer>

</body>

</html>

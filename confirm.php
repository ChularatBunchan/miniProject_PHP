<?php
$pdo = new PDO("mysql:host=localhost; dbname=funtasy; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/62a50d0c8f.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #F9f2e7;
        }

        .component {
            padding: 1em;
            background-color: #7867bf;
            border-radius: 20px;
            margin-top: 2em;
        }

        fieldset {
            margin-top: 20px;
            padding: 1em;
            text-align: center;
            font-size: 3em;
            color: #fff;
            border: none;
        }

        button {
            border: none;
            font-size: 30px;
            color: #47467b;
            padding: 20px 50px;
            text-align: center;
            cursor: pointer;
            background-color: #f7b1c3;
            border-radius: 20px;
        }

        .b3 {
            background-color: #f7b1c3;
            margin: 2em;
        }

        .b1:hover {
            background-color: #47467b;
            color: white;
        }

        .b2:hover {
            background-color: red;
            color: white;
        }

        .b3:hover {
            background-color: #47467b;
            color: #fff;
        }
    </style>
    <script>
        function Delete(รหัสใบนัด) {
            var ans = confirm("Do you want to cancle? ");
            if (ans == true)
                document.location = "delete1.php?รหัสใบนัด=" + รหัสใบนัด;
            alert("Cancle success!!");
        }
    </script>
</head>

<body>
    <div class="component">
        <form>
            <fieldset>
                <legend>Do you want to cancle?</legend>
                <button class="b1" onclick='Delete(<?= $_GET["รหัสใบนัด"] ?>)'>YES</button>
                <button class="b2" formaction="loginsuccess.php">NO</button>
            </fieldset>
        </form>
    </div>
    <form>
        <center>
        <div>
        <button class="b3" formaction="cancle.php">BACK</button>
        <button class="b3" formaction="loginsuccess.php">HOME</button>
    </div>
        </center>
    </form>
    
</body>

</html>

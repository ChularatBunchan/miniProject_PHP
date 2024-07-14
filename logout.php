<?php
session_start();

$params = session_get_cookie_params();
setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
);
session_destroy(); ?>

<html>

<head>
    <style>
        body {
            background-color: #F9f2e7;
            color: #47467b;
            margin: 3em;
            font-size: 2em;
        }

        button {
            border: none;
            font-size: 1em;
            color: white;
            padding: 10px 30px 10px;
            text-align: center;
            cursor: pointer;
            background-color: #f7b1c3;
        }

        button:hover {
            background-color: #7867bf;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Log out success!</h1><br>
    <form>
        <button formaction="index.php">Login again</button>
    </form>
</body>

</html>
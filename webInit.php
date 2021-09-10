<?php
require_once __DIR__ . "/util.php";
require_once __DIR__ . "/app.php";

$dbConn = mysqli_connect("127.0.0.1", "sangwon2", "qwer134679", "test-noticeboard") or die("DB CONNECTION ERROR");
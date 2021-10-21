<?php
date_default_timezone_set('Asia/Seoul');
session_start();
require_once __DIR__ . "/util.php";
require_once __DIR__ . "/app/app.php";

// 현재 환경이 개발 혹은 운영
$dbConn = $application->getDbConnectionByEnv();

// $dbConn = mysqli_connect("127.0.0.1", "sangwon2", "qwer134679", "test-noticeboard") or die("DB CONNECTION ERROR");
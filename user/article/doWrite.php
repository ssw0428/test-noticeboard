<?php
$dbConn = mysqli_connect("127.0.0.1", "sangwon2428", "qkwj155429", "test-noticeboard") or die("DB CONNECTION ERROR");

if ( isset($_GET['title']) == false ) {
  echo "title을 입력해주세요.";
  exit;
}

if ( isset($_GET['body']) == false ) {
  echo "body를 입력해주세요.";
  exit;
}

$title = $_GET['title'];
$body = $_GET['body'];

$sql = "
INSERT INTO article
SET regDate = NOW(),
updateDate = NOW(),
title = '${title}',
`body` = '${body}'
";
mysqli_query($dbConn, $sql);

$id = mysqli_insert_id($dbConn);

?>
<div><?=$id?>번 게시물이 생성되었습니다.</div>
<div><a href="detail.php?id=<?=$id?>">생성된 게시물</a></div>
<div><a href="list.php">리스트</a></div>
<?php
$dbConn = mysqli_connect("127.0.0.1", "sangwon2428", "qkwj155429", "test-noticeboard") or die("DB CONNECTION ERROR");

if ( isset($_GET['id']) == false ) {
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);

$sql = "
SELECT *
FROM article AS A
WHERE A.id = '${id}'
";
$rs = mysqli_query($dbConn, $sql);
$article = mysqli_fetch_assoc($rs);

if ( $article == null ) {
  echo "${id}번 게시물은 존재하지 않습니다.";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 상세페이지, <?=$id?>번 게시물</title>
</head>
<body>
    <h1>게시물 상세페이지, <?=$id?>번 게시물</h1>

    <hr>
    <div>
      <a href="list.php">리스트</a>
      <a href="doModify.php">수정</a>
      <a onclick="if (confirm('정말 삭제 하시겠습니까?') == false)return false;" href="doDelete.php?id=<?=$article['id']?>">삭제</a>
    </div>
    <hr>

    <div>번호 : <?=$article['id']?></div>
    <div>작성날짜 : <?=$article['regDate']?></div>
    <div>수정날짜 : <?=$article['updateDate']?></div>
    <div>제목 : <?=$article['title']?></div>
    <div>내용 : <?=$article['body']?></div>
    <div>
        <a href="list.php">리스트</a>
    </div>
</body>
</html>
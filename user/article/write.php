<?php
$dbConn = mysqli_connect("127.0.0.1", "sangwon2428", "qkwj155429", "test-noticeboard") or die("DB CONNECTION ERROR");

$sql = "
SELECT *
FROM article AS A
ORDER BY A.id DESC
";
$rs = mysqli_query($dbConn, $sql);

$articles = [];

while ( true ) {
    $article = mysqli_fetch_assoc($rs);
  
    if ( $article == null ) {
      break;
    }
  
    $articles[] = $article;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 작성</title>
</head>
<body>
  <h1>게시물 작성</h1>
  <hr>
  <div>
    <a href="list.php">글 리스트</a>
  </div>
  <hr>

  <form action="doWrite.php" method="POST">
    <div>
        <span>제목</span>
        <input required placeholder="제목을 입력해주세요." type="text" name="title">
    </div>
    <div>
        <span>내용</span>
        <textarea required placeholder="내용을 입력해주세요." name="body"></textarea>
    </div>
    <div>
        <input type="submit" value="글작성">
    </div>    
  </form>

</body>
</html>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/test-noticeboard/webInit.php';

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
$article = DB__getRow( $sql);

if ( $article == null ) {
  echo "${id}번 게시물은 존재하지 않습니다.";
  exit;
}
?>
<?php
$pageTitle = "게시물 상세내용, ${id}번 게시물";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<div>
  <a href="list.php">리스트</a>
  <a href="modify.php?id=<?=$article['id']?>">수정</a>
  <a onclick="if ( confirm('정말 삭제 하시겠습니까?') == false ) return false;" href="doDelete.php?id=<?=$article['id']?>">삭제</a>
</div>
<hr>

<div>번호 : <?=$article['id']?></div>
<div>작성날짜 : <?=$article['regDate']?></div>
<div>수정날짜 : <?=$article['updateDate']?></div>
<div>제목 : <?=$article['title']?></div>
<div>내용 : <?=$article['body']?></div>
<?php require_once __DIR__ . "/../foot.php"; ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/test-noticeboard/webInit.php';

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
$id = DB__insert($sql);
?>
<script>
alert('<?=$id?>번 게시물이 생성되었습니다.');
location.replace('detail.php?id=<?=$id?>');
</script>
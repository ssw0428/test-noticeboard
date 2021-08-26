<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/test-noticeboard/webInit.php';

$title = getStrValueOr($_GET['title'], "");
$body = getStrValueOr($_GET['body'], "");

if ( !$title ) {
  jsHistoryBackExit("제목을 입력해주세요.");
}

if ( !$body ) {
  jsHistoryBackExit("내용을 입력해주세요.");
}

$sql = "
INSERT INTO article
SET regDate = NOW(),
updateDate = NOW(),
title = '${title}',
`body` = '${body}'
";
$id = DB__insert($sql);

jsLocationReplaceExit("detail.php?id=${id}", "${id}번 게시물이 생성되었습니다.");


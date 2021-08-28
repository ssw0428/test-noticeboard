<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../webInit.php';

$title = getStrValueOr($_GET['title'], "");
$body = getStrValueOr($_GET['body'], "");

if ( !$title ) {
  jsHistoryBackExit("제목을 입력해주세요.");
}

if ( !$body ) {
  jsHistoryBackExit("내용을 입력해주세요.");
}

$sql = DB__secSql();
$sql->add("INSERT INTO article");
$sql->add("SET regDate = NOW()");
$sql->add(", updateDate = NOW()");
$sql->add(", title = ?", $title);
$sql->add(", `body` = ?", $body);

$id = DB__insert($sql);

jsLocationReplaceExit("detail.php?id=${id}", "${id}번 게시물이 생성되었습니다.");


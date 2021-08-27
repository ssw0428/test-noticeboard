<?php

class DB__SeqSql {
  private string $templateStr = "";
  private array $params = [];

  public function add(string $sqlBit, string $param = null) {
    $this->templateStr .= " " . $sqlBit;

    if ( $param ) {
      $this->params[] = $param;
    }
  }

  public function getTemplate(): string {
    return $this->templateStr;
  }

  public function getForBindParam1stArg(): string {
    $paramTypesStr = "";

    $count = count($this->params);

    for ( $i = 0; $i < $count; $i++ ) {
      $paramTypesStr .= "s";
    }

    return $paramTypesStr;
  }

  public function getParams(): array {
    return $this->params;
  }
}

function DB__secSql() {
  /*
  $stmt = $dbConn->prepare($sql);
  $stmt->bind_param('ss', $loginId, $loginPw);
  $stmt->execute();
  $result = $stmt->get_result();
  */

  return new DB__SeqSql();
}

function DB__getRow2(DB__SeqSql $sql) {
  global $dbConn;
  $stmt = $dbConn->prepare($sql->getTemplate());
  $stmt->bind_param($sql->getForBindParam1stArg(), ...$sql->getParams());
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->fetch_assoc();
}

function DB__getRow($sql) {
  global $dbConn;
  $rs = mysqli_query($dbConn, $sql);
  $row = mysqli_fetch_assoc($rs);

  return $row;
}

function DB__getRows($sql) {
  global $dbConn;
  $rs = mysqli_query($dbConn, $sql);

  $rows = [];

  while ( $row = mysqli_fetch_assoc($rs) ) {
    $rows[] = $row;
  }

  return $rows;
}

function DB__insert($sql) {
  global $dbConn;
  mysqli_query($dbConn, $sql);

  return mysqli_insert_id($dbConn);
}

function DB__update($sql) {
  global $dbConn;
  mysqli_query($dbConn, $sql);
}

function DB__delete($sql) {
  global $dbConn;
  mysqli_query($dbConn, $sql);
}

function getIntValueOr(&$value, $defaultValue) {
  if ( isset($value) ) {
    return intval($value);
  }

  return $defaultValue;
}

function getStrValueOr(&$value, $defaultValue) {
  if ( isset($value) ) {
    return strval($value);
  }

  return $defaultValue;
}

function jsAlert($msg) {
  echo "<script>";
  echo "alert('${msg}');";
  echo "</script>";
}

function jsLocationReplaceExit($url, $msg = null) {
  if ( $msg ) {
    jsAlert($msg);
  }

  echo "<script>";
  echo "location.replace('${url}')";
  echo "</script>";
  exit;
}

function jsHistoryBackExit($msg = null) {
  if ( $msg ) {
    jsAlert($msg);
  }

  echo "<script>";
  echo "history.back();";
  echo "</script>";
  exit;
}
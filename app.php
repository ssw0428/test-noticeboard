<?php
class APP__ArticleRepository {
  public function getForPrintArticles(): array {
    $sql = DB__secSql();
    $sql->add("SELECT *");
    $sql->add("FROM article AS A");
    $sql->add("ORDER BY A.id DESC");
    $articles = DB__getRows($sql);

    return $articles;
  }
}

class APP__ArticleService {
  private APP__ArticleRepository $articleRepository;

  public function __construct() {
    $this->articleRepository = new APP__ArticleRepository();
  }

  public function getForPrintArticles(): array {
    return $this->articleRepository->getForPrintArticles();
  }
}

class APP__UsrArticleController {
  private APP__ArticleService $articleService;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->articleService = new APP__ArticleService();
  }

  public function actionShowList(): array {
    $articles = $this->articleService->getForPrintArticles();

    require_once static::getViewPath("usr/article/list");

    return $articles;
  }
}

function runApp($action) {
  list($controllerTypeCode, $controllerName, $actionFuncName) = explode('/', $action);

  $controllerClassName = "APP__" . ucfirst($controllerTypeCode) . ucfirst($controllerName) . "Controller";
  $actionMethodName = "action";

  if ( str_starts_with($actionFuncName, "do") ) {
    $actionMethodName .= ucfirst($actionFuncName);
  }
  else {
    $actionMethodName .= "Show" . ucfirst($actionFuncName);
  }

  $usrArticleController = new $controllerClassName();
  $usrArticleController->$actionMethodName();
}
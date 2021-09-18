
<?php
$pageTitleIcon = '<i class="fas fa-pen"></i>';
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<section class="secion-article-write">
  <div class="container mx-auto">
    <div class="con-pad">
      <form action="doWrite" method="POST">
        <div>
          <span>제목</span>
          <input required placeholder="제목을 입력해주세요." type="text" name="title"> 
        </div>
        <div>
          <span>내용</span>
          <textarea class="w-full p-4 h-96" required placeholder="내용을 입력해주세요." name="body"></textarea>
        </div>
        <div>
          <input type="submit" value="글작성">
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/../foot.php"; ?>
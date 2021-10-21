<?php
$pageTitleIcon = '<i class="fas fa-newspaper"></i>';
$pageTitle = "게시물 상세내용, ${id}번 게시물";

$body = str_replace('<script', '<t-script>', $article['body']);
$body = str_replace('</script>', '</t-script>', $article['body']);
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="section-article-detail">
  <div class="container mx-auto">
    <div class="con-pad">
      <div>
        <a href="list">리스트</a>
        <a href="modify?id=<?=$article['id']?>">수정</a>
        <a onclick="if ( confirm('정말 삭제 하시겠습니까?') == false ) return false;" href="doDelete?id=<?=$article['id']?>">삭제</a>
      </div>
      
      <hr>

      <div>번호 : <?=$article['id']?></div>
      <div>작성날짜 : <?=$article['regDate']?></div>
      <div>수정날짜 : <?=$article['updateDate']?></div>
      <div>제목 : <?=$article['title']?></div>
      <script type="text/x-template"><?=$body?></script>
      <div class="toast-ui-viewer"></div>
    </div>
  </div>
</section>

<section class="section-disqus">
  <div class="container mx-auto">
    <div class="con-pad">
      <div id="disqus_thread"></div>
      <?php
      $disqusConfigPageIdentifier = "/usr/article/detail?id={$article['id']}";
      $disqusConfigPageUrl = "https://{$prodSiteDomain}{$disqusConfigPageIdentifier}";
      ?>
      <script>
        var disqus_config = function () {
          this.page.url = '<?=$disqusConfigPageUrl?>';
          this.page.identifier = '<?=$disqusConfigPageIdentifier?>';
        };
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://bbb-oa-gg.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
      </script>
    </div>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>
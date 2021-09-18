
<?php
$isLogined = $_REQUEST['App__isLogined'];
$loginedMemberId = $_REQUEST['App__loginedMemberId'];
$loginedMember = $_REQUEST['App__loginedMember'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>

  <!-- 제이쿼리 불러오기 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- 폰트어썸 불러오기 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- 테일윈드 불러오기 -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <!-- 데이지UI 불러오기, 테일윈드 필요 -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="/resource/common.css">

</head>
<body>
  <div class="site-wrap min-h-screen flex flex-col">
    <header class="top-bar bg-black text-white h-10">
      <div class="container mx-auto h-full flex">
        <a href="/" class="top-bar__logo px-5 flex items-center">
          <span><i class="fas fa-lemon"></i></span>
          <span class="ml-2 font-bold">LEMON BLOG</span>
        </a>

        <div class="flex-grow"></div>

        <nav class="menu-box-1">
          <ul class="flex h-full">
            <li class="hover:bg-white hover:text-black">
              <a href="/" class="h-full flex items-center px-5">
                <span><i class="fas fa-home"></i></span>
                <span class="ml-2 font-bold">HOME</span>
              </a>
            </li>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/home/aboutMe" class="h-full flex items-center px-5">
                <span><i class="far fa-id-card"></i></span>
                <span class="ml-2 font-bold">ABOUT ME</span>
              </a>
            </li>
            <?php if ( $isLogined ) { ?>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/member/doLogout" class="h-full flex items-center px-5">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <span class="ml-2 font-bold">LOGOUT</span>
              </a>
            </li>
            <?php } else { ?>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/member/login" class="h-full flex items-center px-5">
                <span><i class="fas fa-sign-in-alt"></i></span>
                <span class="ml-2 font-bold">LOGIN</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </header>

    <main class="flex-grow">
      <section class="section-title mt-5 text-2xl font-bold">
        <h1 class="container mx-auto">
          <div class="con-pad">
            <span><?=$pageTitleIcon?></span>
            <span><?=$pageTitle?></span>
          </div>
        </h1>
      </section>
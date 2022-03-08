<?php
session_start();
$page = 'articleForm';
require './include/head.php';
require './auth/check_login.php';
require './auth/db_connection.php';
require './auth/fetch_data.php';

if (!isset($_GET['slug']) || is_numeric($_GET['slug'])) {
  header('Location: index.php');
  exit;
}

$article = fetchPost($conn, 'slug', $_GET['slug']);
$articleId = $article['postId'];

require './auth/update_article.php';
?>


  <body>
    <!-- navbar -->
    <?php
      require './include/navbar.php'
    ?>
    <main class="app__layout">
      <div class="container">
        <!-- Main Content Start -->
        <div class="app__mainContent-container">
        <!-- <div class=""> -->
          <div class="app__mainContent">
            <?php
                $title = $article['postTitle'];
                $tag = $article['postTag'];
                $body = $article['postBody'];
                include("include/article_form.php");
            ?>
          </div>
        </div>
        <!--  Main Content End -->
        </div>
    </main>
  </body>

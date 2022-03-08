<?php
session_start();
$page = 'articleForm';
require './include/head.php';
require './auth/check_login.php';
require './auth/db_connection.php';
require './auth/create_article.php';
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
              $id = '';
              $title = '';
              $tag = '';
              $body = '';
              include("include/article_form.php");
            ?>
          </div>
        </div>
        <!--  Main Content End -->
      </div>
    </main>
  </body>

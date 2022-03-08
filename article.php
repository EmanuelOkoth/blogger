<?php
session_start();
$page = 'article';
require './include/head.php';
require './auth/db_connection.php';
require './auth/fetch_data.php';
$article = fetchPost($conn, 'slug', $_GET['slug']);

if (!isset($_GET['slug']) || is_numeric($_GET['slug'])) {
  header('Location: index.php');
  exit;
}

?>
  <head>
    <!-- load prism styles -->
    <link rel="stylesheet" href="css/prism.css">
  </head>
  <body>
    <!-- navbar -->
    <?php
      require './include/navbar.php'
    ?>
    <main class="app__layout">
      <div class="container">
        <!-- Main Content Start -->
        <!-- check if posts exists -->
        <?php if ($article) : ?>
          <?php
            $id = $article['postId'];
            $title = $article['postTitle'];
            $body = $article['postBody'];
            $imageURL = 'uploads/'.$article["postThumbnail"];
          ?>
          <div class="article__container">
            <h1 class="article__title"><?php echo $title; ?></h1>
            <div class="article__thumbnail">
              <img src="<?php echo $imageURL; ?>" alt="<?php echo $title; ?>" />
            </div>
            <div class="article__body">
              <?php echo html_entity_decode($body); ?>
            </div>

            <!-- comments section -->
            <div id="disqus_thread"></div>
            <script>
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://blogger-ep5qhywrqw.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>
          </div>
        <?php else : ?>
          <h2>No records found. Please insert some records.</h2>
        <?php endif; ?>

        <!--  Main Content End -->
        </div>
    </main>

    <!-- load prism script -->
    <script src="script/prism.js"></script>
    <script id="dsq-count-scr" src="//blogger-ep5qhywrqw.disqus.com/count.js" async></script>
  </body>

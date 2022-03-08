<?php
session_start();
require './include/head.php';
require './auth/db_connection.php';
require './auth/fetch_data.php';
$posts = array_slice(array_reverse(fetchPosts($conn)), 2);

?>
  <body>
    <!-- navbar -->
    <?php
      require './include/navbar.php'
    ?>
    <main class="app__layout">
      <?php
          require './include/header.php'
        ?>
      <div class="container">
        <!-- Main Content Start -->
        <div class="mainContent_container">
          <h1 class="heading">Latest Articles</h1>
          <div class="blog__container">

            <!-- check if posts exists -->
            <?php if (count($posts) > 0) : ?>
              <div class="articles_list">
                <?php foreach ($posts as $post) :
                  $id = $post['postId'];
                  $title = $post['postTitle'];
                  $body = $post['postBody'];
                  $imageURL = 'uploads/'.$post["postThumbnail"];
                  $slug = $post['slug'];

                ?>
                <div class="app__article">
                  <img src="<?php echo $imageURL; ?>" alt="<?php echo $title; ?>" class="cover-photo" />
                  <a href="article.php?slug=<?php echo $slug; ?>" class="edit">
                    <h1><?php echo $title; ?></h1>
                  </a>

                  <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
                    <span>
                      <a href="edit_article.php?slug=<?php echo $slug; ?>" class="btn edit-btn">Edit</a>
                    </span>
                    <span>
                      <a href="delete_article.php?id=<?php echo $id; ?>" class="btn delete-btn">Delete</a>
                    </span>
                  <?php endif; ?>
                </div>
                <?php endforeach; ?>
              </div>
              <div class="articles__read_more">
                <h3><a href="articles.php" class="btn btn--main">Read More</a></h3>
              </div>
              <?php else : ?>
                <h2>No records found. Please insert some records.</h2>
              <?php endif; ?>
              <script src="script/articleActions.js"></script>

          </div>
        </div>
        <!--  Main Content End -->
      </div>
    </main>
  </body>

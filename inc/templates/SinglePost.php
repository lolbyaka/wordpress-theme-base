<?php
namespace Vincit\Template;

use \Vincit\Media;

function SinglePost($data = []) {
  global $numpages;

  $data = params([
    "title" => null,
    "content" => null,
    "image" => null,
    "pagination" => $numpages > 1
  ], $data);

  if (!$data["title"]) {
    return false;
  } ?>

  <article <?php post_class("single-post")?>>
    <header class="single-post__header">
      <?php
      if ($data["image"]) {
        echo Media\image($data["image"], "large");
      } ?>
      <h1><?=title($data["title"])?></h1>
    </header>

    <section class="single-post__content">
      <?=content($data["content"])?>
    </section>

    <footer class="single-post__footer">
      <?php
      if ($data["pagination"]) { ?>
        <div class="pagination single-post__pagination">
          <?php wp_link_pages(); ?>
        </div>
      <?php } ?>
    </footer>
  </article>
<?php }
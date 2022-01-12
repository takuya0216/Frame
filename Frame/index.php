<?php get_header(); ?>
<main class="mytheme-main mytheme-article">
 <?php
    // get reusable gutenberg block
    $reuse_block = get_post( 6408 ); //  123 is ID. reusable block page. ID from the URL.
    $reuse_block_content = apply_filters( 'the_content', $reuse_block->post_content);
    echo $reuse_block_content;
  ?>
  <div class="postlist">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">
    <?php if(has_post_thumbnail()): ?>
      <figure class="scale-up-img">
      <?php the_post_thumbnail(); ?>
      </figure>
    <?php else: ?>
      <figure class="scale-up-img">
        <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="" width="1200" height="900">
      </figure>
    <?php endif; ?>
    <div class="postlist-textview">
      <time class="mytheme-time" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
      <?php echo esc_html(get_the_date()); ?>
      </time>
      <h2><?php the_title(); ?></h2>
    </div>
    </a>
    </article>
  <?php endwhile; endif; ?>
  </div>
  <?php the_posts_pagination(array(
    'mid_size' => 1, //カレントページの前後
    'end_size' => 1,
    'prev_next' => true,
    'prev_text' => '<span class="my-prev-next my-pagi-prev"><i class="fas fa-angle-left"></i>PREV</span>',
    'next_text' => '<span class="my-prev-next my-pagi-next">NEXT<i class="fas fa-angle-right"></i></span>',)); ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

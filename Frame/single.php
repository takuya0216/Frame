<?php get_header(); ?>
<main class="mytheme-main mytheme-article">
  <?php
    // get reusable gutenberg block
  $reuse_block = get_post( 6434 ); //  123 is ID. reusable block page. ID from the URL.
  $reuse_block_content = apply_filters( 'the_content', $reuse_block->post_content);
  echo $reuse_block_content;
  ?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>

  <article <?php post_class(); ?>>
	  <h2 class="single-post-title"><?php the_title(); ?></h2>
	  <div class="post-title-under">
		  <?php the_category(); ?>
		  <time class="mytheme-time" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
			  <?php echo esc_html(get_the_date()); ?>
		  </time>
	  </div>
  <?php the_content(); ?>
  </article>

  <?php endwhile; endif; ?>
  <?php the_post_navigation(array(
   'prev_text' => '<span class="my-prev-next my-pagi-prev"><i class="fas fa-angle-left"></i>PREVIOUS</span>',
    'next_text' => '<span class="my-prev-next my-pagi-next">NEXT<i class="fas fa-angle-right"></i></span>',)); ?>
  <!-- ウィジェットエリア（シングルページ最下部） -->
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('シングルページ最下部') ) : ?>
  <?php endif; ?>
  <!-- / ウィジェットエリア（シングルページ最下部） -->
  <!-- コメントエリア -->
<?php /*comments_template(); */?>
<!-- / コメントエリア -->
</main>

<?php get_footer(); ?>

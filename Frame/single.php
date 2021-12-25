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
  <?php if(has_post_thumbnail()): ?>
  <?php if(!has_block('image')): ?>
    <figure class="mytheme-figure">
    <?php the_post_thumbnail(); ?>
    </figure>
  <?php endif; ?>
  <?php endif; ?>
  <?php the_content(); ?>
  </article>

  <?php endwhile; endif; ?>
  <?php the_post_navigation(); ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

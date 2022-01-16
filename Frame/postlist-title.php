<!-- 投稿一覧の日本語タイトル：投稿一覧ヘッダーブロックで呼び出し -->
  <?php if(have_posts()):?>
  <!-- カテゴリーアーカイブの場合 -->
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <div class="postlist-title"><?php single_cat_title(); ?></div>

  <!-- タグアーカイブの場合 -->
  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
  <div class="postlist-title"><?php single_tag_title(); ?></div>

  <!-- 日別アーカイブの場合 -->
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <div class="postlist-title"><?php echo get_the_time('Y年n月j日'); ?></div>

  <!-- 月別アーカイブの場合 -->
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <div class="postlist-title"><?php echo get_the_time('Y年n月'); ?></div>

  <!-- 年別アーカイブの場合 -->
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <div class="postlist-title"><?php echo get_the_time('Y年'); ?></div>

  <!-- 検索の場合 -->
  <?php /* If this is a yearly archive */ } elseif (is_search()) { ?>
  <div class="postlist-title">検索結果：<?php the_search_query(); ?></div>

  <!-- 著者アーカイブの場合 -->
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <div class="postlist-title"><?php esc_html( get_the_author() ) ?></div>

  <?php } ?>
  <?php endif; ?>

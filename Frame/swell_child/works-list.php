<div class="works-postlist">
<?php
     global $post;
     $paged = get_query_var('paged') ?: 1; //ページネーションを使いたいなら指定
     /*トップページは3件*/
     if( is_front_page() ){
       $works_post_per_page = 3;
     }
     /*Worksは9件*/
     else{
       $works_post_per_page = 9;
     }
     $args = array(
      'paged' => $paged, //ページネーションを使いたいなら指定
      'posts_per_page' => $works_post_per_page,
      'post_status' => 'publish', //公開の記事だけ
      'post_type' => 'post-work', //カスタム投稿slag
      'orderby' => 'date', //日付を出力する基準
      'order' => 'DESC' //表示する順番（逆はASC）

      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
?>

     <?php global $previousday; //この表記と$previousday = '';で同じ日付の投稿でも表示される
       while ( $the_query->have_posts() ) : $the_query->the_post();
       $previousday = '';
     //-------- ここから繰り返し----------
     ?>
        <article <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()): ?>
          <figure>
          <?php the_post_thumbnail(); ?>
          </figure>
        <?php else: ?>
          <figure>
            <img src="<?php echo get_stylesheet_directory(); ?>/img/works-dummy.png" alt="" width="330" height="380">
          </figure>
        <?php endif; ?>
        <div class="works-postlist-textview">
          <h2><?php the_title(); ?></h2>
          <ul>
            <?php
            if ($terms = get_the_terms($post->ID, 'works_cat')) {
              foreach ( $terms as $term ) {
                echo ('<li>');
                echo esc_html($term->name);
                echo ('</li>');
              }
            }
            ?>
          </ul>
        </div>
        </a>
        </article>

      <?php endwhile; //------------繰り返しここまで----------
      ?>

      <?php else : //記事が無い場合
      ?>
      <div class="result">
          <p>記事がまだありません</p>
      </div>

      <?php //-----------get_posts終了----------
             wp_reset_postdata();
      endif; ?>
</div>
<?php if(is_page('WORKS')): ?>
  <nav class="navigation pagination" role="navigation" aria-label="Works">
      <h2 class="screen-reader-text">Worksナビゲーション</h2>
      <div class="nav-links">
  <?php
    global $wp_rewrite;
    $paginate_base = get_pagenum_link(1);
    if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
    $paginate_format = '';
    $paginate_base = add_query_arg('paged','%#%');
    }
    else{
    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
    user_trailingslashit('page/%#%/','paged');;
    $paginate_base .= '%_%';
    }
    echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $the_query->max_num_pages,
    'mid_size' => 1, //カレントページの前後
    'end_size' => 1,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '<span class="my-prev-next my-pagi-prev"><i class="fas fa-angle-left"></i>PREV</span>',
    'next_text' => '<span class="my-prev-next my-pagi-next">NEXT<i class="fas fa-angle-right"></i></span>',
    ));
  ?>
    </div>
  </nav>
<?php endif; ?>

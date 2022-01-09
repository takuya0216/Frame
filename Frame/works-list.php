<div class="works-postlist">
<?php
     global $post;
     $paged = get_query_var('paged') ?: 1; //ページネーションを使いたいなら指定
     $args = array(
      'paged' => $paged, //ページネーションを使いたいなら指定
      'posts_per_page' => 9, //9記事のみ出力
      'post_status' => 'publish', //公開の記事だけ
      'post_type' => 'post-work', //カスタム投稿slag
      'orderby' => 'date', //日付を出力する基準
      'order' => 'DESC' //表示する順番（逆はASC）

      );
      $myposts = get_posts( $args );
      if($myposts ) : foreach( $myposts  as $post ) : setup_postdata($post);

      //--------ここから繰り返し----------
      ?>
        <article <?php post_class(); ?>>
        <!--<a href="<?php the_permalink(); ?>">-->
        <?php if(has_post_thumbnail()): ?>
          <figure>
          <?php the_post_thumbnail(); ?>
          </figure>
        <?php else: ?>
          <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/works-dummy.png" alt="" width="330" height="380">
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
        <!--</a>-->
        </article>

      <?php endforeach; //------------繰り返しここまで----------
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

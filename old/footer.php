<?php $footer_options = get_option('my_footer_options'); //フッター情報カスタマイザ取得 ?>
<footer class="mytheme-footer">
  <?php if(!is_page('CONTACT')): ?>
   <section class="mytheme-contact">
      <h2>CONTACT</h2>
      <div class="contact-content">
        <?php if($footer_options['footer_tell']) : $tell = esc_html($footer_options['footer_tell']); ?><?php endif; ?>
        <p><a href="tel:<?php echo $tell; ?>">TEL:<?php echo $tell; ?></a></p>
        <a class="contact-form" href="https://frame-arc.com/contact/">
          <p>CONTACT FORM</p>
        </a>
      </div>
    </section>
  <?php endif; ?>
    <section class="footer-links">
      <figure class="footer-logo">
		  <?php $footer_logo_url = get_the_logo_url('footer_logo_url'); ?>
	      <?php if($footer_logo_url): ?>
	  	    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_the_footer_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
	      <?php else: ?>
	        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <?php endif; ?>
      </figure>
      <?php
        // $menu_name に基づいてナビゲーションメニューを取得します。
        // (関数 wp_nav_menu の 'theme_location' や 'menu' 引数と同じです)
        // このコードは、メニュースラッグからメニュー ID を取得する wp_nav_menu のコードを元にしています。

        $menu_name = 'primary';

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

            $menu_items = wp_get_nav_menu_items($menu->term_id);

            $menu_list = '<ul id="menu-' . $menu_name . '" class="footer-nav">';

            foreach ( (array) $menu_items as $key => $menu_item ) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $id = $menu_item->ID;
                if($id != 5823){
                  $menu_list .= '<li><a href="' . $url . '">-' . $title . '</a></li>';
                }
            }
            $menu_list .= '</ul>';
        } else {
            $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
        }
        echo($menu_list);
      ?>
      <ul class="footer-sns">
        <li><a href="<?php if($footer_options['footer_instagram']) : echo esc_html($footer_options['footer_instagram']); endif; ?>"><i class="fab fa-instagram footer-sns-icon"></i></a></li>
        <li><a href="<?php if($footer_options['footer_youtube']) : echo esc_html($footer_options['footer_youtube']); endif; ?>"><i class="fab fa-youtube footer-sns-icon"></i></a></li>
      </ul>
    </section>
    <div class="footer-copyright">
      Copyright © FRAME AND PARTNERS. All Right Reserved.
    </div>
<a href="#" id="page-top">page top</a>
</footer>
<?php wp_footer(); ?>
</body>

</html>

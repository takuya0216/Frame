<footer class="mytheme-footer">
  <?php if(!is_page('CONTACT')): ?>
   <section class="mytheme-contact">
      <h2>CONTACT</h2>
      <div class="contact-content">
        <p>TEL:090-000-0000</p>
        <a class="contact-form" href="https://frame-arc.com/contact/">
          <p>CONTACT FORM</p>
        </a>
      </div>
    </section>
  <?php endif; ?>
    <section class="footer-links">
      <div class="footer-logo">
		  <?php $footer_logo_url = get_the_logo_url('footer_logo_url'); ?> 
	      <?php if($footer_logo_url): ?> 
	  	    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_the_footer_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
	      <?php else: ?>
	        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <?php endif; ?>
      </div>
      <ul class="footer-nav">
        <li><a href="https://frame-arc.com/concept/">-CONCEPT</a></li>
        <li><a href="https://frame-arc.com/works/">-WORKS</a></li>
        <li><a href="https://frame-arc.com/category/news">-NEWS</a></li>
        <li><a href="https://frame-arc.com/concept/company">-COMPANY</a></li>
        <li><a href="https://frame-arc.com/contact/">-CONTACT</a></li>
      </ul>
      <ul class="footer-sns">
        <li><a href="#"><i class="fab fa-instagram footer-sns-icon"></i></a></li>
        <li><a href="#"><i class="fab fa-youtube footer-sns-icon"></i></a></li>
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

<?php if(!is_front_page() && !is_page('contact')): ?>
    <section id="requestService" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/diamond-metal-bg.jpg);">
      <a href="<?php echo home_url('contact'); ?>" class="btn-main">Request A Service</a>
    </section>
<?php endif; ?>
    <footer>
      <section id="footerTop">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <h2>Quick Links</h2>
              <ul class="footer-menu">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url('residential'); ?>">Residential</a></li>
                <li><a href="<?php echo home_url('commercial'); ?>">Commercial</a></li>
                <li><a href="<?php echo home_url('property-management'); ?>">Property Management</a></li>
                <li><a href="<?php echo home_url('help-desk'); ?>">Help Desk</a></li>
                <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
              </ul>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
              <h2>Contact Us</h2>
              <p><?php the_field('street_address', 'option'); ?>,<br /><?php the_field('city_state_zip', 'option'); ?></p>
              <p>Tel: <a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
              <p>Email: <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></p>
              <div class="social">
                <?php if(get_field('facebook', 'option')): ?>
                  <a href="<?php the_field('facebook', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook-official fa-stack-1x fa-inverse"></i>
                  </a>
                <?php endif; ?>
                <?php if(get_field('twitter', 'option')): ?>
                  <a href="<?php the_field('twitter', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </a>
                <?php endif; ?>
                <?php if(get_field('linkedin', 'option')): ?>
                  <a href="<?php the_field('linkedin', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </a>
                <?php endif; ?>
                <?php if(get_field('google_plus', 'option')): ?>
                  <a href="<?php the_field('google_plus', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-sm-4">
              <h2>Newsletter Signup</h2>
              <form>
                <p>Sign up to receive free emails.</p>
                <div class="form-group">
                  <label for="your-name" class="sr-only">Name</label>
                  <input type="text" id="your-name" name="your-name" class="form-control" placeholder="Name" />
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                </div>
                <input type="submit" class="btn-alt" value="Submit" />
              </form>
            </div>
          </div>
          <div class="colophon">
            <p>&copy;<?php echo date('Y'); ?> Cogar Plumbing</p>
            <p>website created by <a href="https://childressagency.com">The Childress Agency</a></p>
          </div>
        </div>
      </section>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pipe-fitting-tools-w-bg.jpg" class="center-block footer-img" alt="Pipe Fittings" />
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
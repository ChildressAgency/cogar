<?php get_header(); ?>
<main id="main">
  <div class="container">
    <h1 class="page-title">Contact Info</h1>
    <div class="row">
      <div class="col-sm-6">
        <div class="contact-info">
          <h2>Telephone:</h2>
          <p><?php the_field('phone_number', 'option'); ?></p>
          <h2>Location:</h2>
          <p><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
          <h2>Email:</h2>
          <p><?php the_field('email', 'option'); ?></p>
        </div>
      </div>
      <div class="col-sm-6">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <?php 
      $location = get_field('location', 'option');
      if(!empty($location)): ?>
        <div class="acf-map">
          <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
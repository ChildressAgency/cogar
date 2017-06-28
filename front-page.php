<?php get_header(); ?>
<?php
  $hero_image = get_stylesheet_directory_uri() . '/images/gloves-wrench-wood.jpg';
  $hero_image_css = 'background-position:25% 50%';
  if(get_field('hero_image')){
    $hero_image = get_field('hero_image');
    if(get_field('hero_image_css')){
      $hero_image_css = get_field('hero_image_css');
    }
    else{
      $hero_image_css = '';
    }
  }
?>
<section id="hero" style="background-image:url(<?php echo $hero_image; ?>); <?php echo $hero_image_css; ?>">
  <div class="container">
    <div class="caption">
      <?php if(get_field('hero_title')): ?>
        <h1><?php the_field('hero_title'); ?></h1>
      <?php endif; ?>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-wrench-plunger.png" class="img-responsive center-block" alt="Icon with wrench and plunger" />
      <?php if(get_field('hero_subtitle')): ?>
        <p><?php the_field('hero_subtitle'); ?></p>
      <?php endif; ?>
      <a href="<?php echo home_url('contact'); ?>" class="btn-main">Request a Service</a>
    </div>
  </div>
</section>
<section id="services">
  <div class="container">
    <h2>OUR SERVICES</h2>
    <?php if(have_rows('featured_services')): ?>
    <div class="row">
      <?php $c=0; while(have_rows('featured_services')): the_row(); ?>
        <?php if($c%4==0){ echo '<div class="clearfix hidden-sm"></div>'; } ?>
        <?php if($c%2==0){ echo '<div class="clearfix visible-sm-block"></div>'; } ?>
        <div class="col-sm-6 col-md-3">
          <a href="<?php the_sub_field('service'); ?>" class="service-thumbnail">
            <?php $service_image = get_sub_field('service_image'); ?>
            <img src="<?php echo $service_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $service_image['alt']; ?>" />
            <p><?php the_sub_field('service_title'); ?></p>
          </a>
        </div>
      <?php $c++; endwhile; ?>
    </div>
    <?php endif; ?>
    <?php if(get_field('our_services_subtitle')): ?>
      <h1><?php the_field('our_services_subtitle'); ?></h1>
    <?php endif; ?>
    <a href="<?php echo home_url('water-heaters'); ?>" class="btn-main">View All services</a>
  </div>
</section>
<section id="experience" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/drain-bg.jpg); background-position:center center;">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="experience-types">
          <ul class="nav">
            <li role="presentation" class="active">
              <a href="#residential" class="btn-alt btn-clear" role="tab" aria-controls="residential" data-toggle="tab">Residential</a>
            </li>
            <li role="presentation">
              <a href="#commercial" class="btn-alt btn-clear" role="tab" aria-controls="commercial" data-toggle="tab">Commercial</a>
            </li>
            <li role="presentation">
              <a href="#property-management" class="btn-alt btn-clear" role="tab" aria-controls="property-management" data-toggle="tab">Property Management</a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="residential">
              <?php the_field('residential_experience_info'); ?>
              <a href="<?php echo home_url('residential'); ?>" class="btn-main">More Info</a>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="commercial">
              <?php the_field('commercial_experience_info'); ?>
              <a href="<?php echo home_url('commercial'); ?>" class="btn-main">More Info</a>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="property-management">
              <?php the_field('property_management_experience_info'); ?>
              <a href="<?php echo home_url('property-management'); ?>" class="btn-main">More Info</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="celebrating">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/celebrating-logos.png" class="img-responsive center-block" alt="Celebrating 35 Years of Experience" />
          <h2>Over 35 Years of Experience you can trust</h2>
          <a href="<?php echo home_url('contact'); ?>" class="btn-main">Request a service</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $projects = new WP_Query(array('post_type' => 'cogar_projects', 'posts_per_page' => 3, 'post_status' => 'publish'));
  if($projects->have_posts()): ?>
<section id="latestProjects" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/diamond-metal-bg.jpg);">
  <div class="container">
    <h2>Latest Projects:</h2>
    <div class="row">
      <?php while($projects->have_posts()): $projects->the_post(); ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>" class="project-thumbnail">
            <?php $featured_image = get_field('featured_image'); ?>
            <img src="<?php echo $featured_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $featured_image['alt']; ?>" />
            <div class="caption">
              <h3><?php the_title(); ?></h3>
              <?php the_excerpt(); ?>
              <?php $comment_count = wp_count_comments(get_the_ID()); ?>
              <h4><?php echo get_the_date('j F Y');?>&nbsp;&nbsp;<?php echo $comment_count->approved; ?> Comment<?php echo ($comment_count->approved > 1) ? 's' : ''; ?></h4>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
    <a href="<?php echo home_url('projects'); ?>" class="btn-main">View all projects</a>
  </div>
</section>
<?php endif; wp_reset_postdata(); ?>

<section id="reviews" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/white-textured-bg.jpg);">
  <?php $star_rating_image = get_field('star_rating_image'); ?>
  <img src="<?php echo $star_rating_image['url']; ?>" class="img-responsive star-rating" alt="<?php echo $star_rating_image['alt']; ?>" />
  <div class="container">
    <?php 
      $reviews = get_field('customer_reviews', 'option');
      if($reviews):
        $review_count = count($reviews);
        if($review_count > 1): ?>
          <div class="reviews-carousel">
            <h2>Reviews by our customers</h2>
            <div id="reviewsCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <?php $i=0; foreach($reviews as $review): ?>
                  <div class="item<?php if($i==0){ echo ' active'; } ?>">
                    <div class="review">
                      <?php echo $review['review']; ?>
                    </div>
                    <p class="review-author">- <?php echo $review['review_author']; ?></p>
                  </div>
                <?php $i++; endforeach; ?>
              </div>

              <a href="#reviewsCarousel" class="left carousel-control" role="button" data-slide="prev">
                <span class="fa fa-angle-left hidden-xs" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a href="#reviewsCarousel" class="right carousel-control" role="button" data-slide="next">
                <span class="fa fa-angle-right hidden-xs" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>

              <ol class="carousel-indicators">
                <?php for($r = 0; $r < $review_count; $r++): ?>
                  <li data-target="#reviewsCarousel" data-slide-to="<?php echo $r; ?>"<?php if($r==1){ echo ' class="active"'; } ?>></li>
                <?php endfor; ?>
              </ol>
              <a href="<?php echo home_url('contact'); ?>" class="btn-main">Request a service</a>
            </div>
        <?php else: //only 1 review ?>
          <div class="reviews-carousel">
            <h2>Reviews by our customers</h2>
            <div id="reviewsCarousel">
              <div class="item">
                <div class="review">
                  <?php echo $reviews[0]['review']; ?>
                </div>
                <p class="review-author">- <?php echo $reviews[0]['review_author']; ?></p>
              </div>
              <a href="<?php echo home_url('contact'); ?>" class="btn-main">Request a service</a>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; //no reviews ?>
    </div>
  </div>
</section>
<section id="areasServed">
  <div class="container">
    <h2>Areas we serve</h2>
    <p>Central Va, Fredericksburg, Northern Neck, We Get You Covered</p>
    <ul class="list-inline">
      <?php if(have_rows('coverage_areas')): while(have_rows('coverage_areas')): the_row(); ?>
        <li><?php the_sub_field('coverage_area'); ?></li>
      <?php endwhile; endif; ?>
    </ul>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/coverage-map-water-guy.png" class="img-responsive center-block" alt="Coverage Area Map" />
  </div>
</section>
<?php get_footer(); ?>
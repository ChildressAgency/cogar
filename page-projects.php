<?php get_header(); ?>
<main id="main">
  <div class="container">
    <?php if(get_field('page_title')): ?>
      <h1 class="page-title"><?php the_field('page_title'); ?></h1>
    <?php else: ?>
      <h1 class="page-title">Projects</h1>
    <?php endif; ?>
    <?php if(get_field('page_subtitle')): ?>
      <p class="page-subtitle"><?php the_field('page_subtitle'); ?></p>
    <?php endif; ?>
    <div class="project-filter">
      <?php wp_dropdown_categories('shop_option_all=Show All&show_option_none=Project Type&hide_empty=0&taxonomy=project_types&value_field=slug'); ?>
      <script>
        var dropdown = document.getElementById("cat");

        function onFilterChange(){
          if(dropdown.options[dropdown.selectedIndex].value !== -1){
            location.href = "<?php echo esc_url(home_url('/')); ?>?taxonomy=project_types&term=" + dropdown.options[dropdown.selectedIndex].value;
          }
        }

        dropdown.onchange = onFilterChange;
      </script>
    </div>
    <?php
      $projects = new WP_Query(array(
        'post_type' => 'cogar_projects',
        'post_per_page' => 9,
        'post_status' => 'publish'
      ));
      if($projects->have_posts()):  ?>
        <div class="row">
          <?php $p=0; while($projects->have_posts()): $projects->the_post(); ?>
            <?php if($p%3==0){ echo '<div class="clearfix"></div>'; } ?>
            <div class="col-sm-4">
              <a href="<?php the_permalink(); ?>" class="project-thumbnail">
                <?php $featured_image = get_field('featured_image'); ?>
                <img src="<?php echo $featured_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $featured_image['alt']; ?>" />
                <div class="caption">
                  <h3><?php the_title(); ?></h3>
                  <?php the_excerpt(); ?>
                  <?php $comment_count = wp_count_comments(get_the_ID()); ?>
                  <h4><?php echo get_the_date('j F Y'); ?>&nbsp;&nbsp;<?php echo $comment_count->approved; ?> Comment<?php echo ($comment_count->approved > 1) ? 's' : ''; ?></h4>
                </div>
              </a>
            </div>
          <?php $p++; endwhile; wp_pagenavi(array('query' => $projects)); ?>
        </div>
    <?php else: ?>
      <h2>No projects found.</h2>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
<?php get_header(); ?>
<?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); ?>
<main id="main">
  <div class="container">
    <?php if(get_field('page_title')): ?>
      <h1 class="page-title"><?php the_field('page_title'); ?> - <?php echo $term->name; ?></h1>
    <?php else: ?>
      <h1 class="page-title">Projects - <?php echo $term->name; ?></h1>
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
      if(have_posts()):  ?>
        <div class="row">
          <?php $p=0; while(have_posts()): the_post(); ?>
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
          <?php $p++; endwhile; wp_pagenavi(); ?>
        </div>
    <?php else: ?>
      <h2>No projects found.</h2>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
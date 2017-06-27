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
    <?php else: 
      $projects_page = get_page_by_path('projects')
      $projects_page_id = $projects_page->ID; ?>
      <p class="page-subtitle"><?php the_field('page_subtitle', $projects_page_id); ?></p>
    <?php endif; ?>
    <div class="project-filter">
      <?php wp_dropdown_categories('shop_option_none=Project Type'); ?>
      <script>
        var dropdown = document.getElementById("cat");

        function onFilterChange(){
          if(dropdown.options[dropdown.selectedIndex].value > 0){
            location.href = "<?php echo esc_url(home_url('/')); ?>?cat=" + dropdown.options[dropdown.selectedIndex].value;
          }
        }

        dropdown.onchange = onFilterChange;
      </script>
    </div>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <article class="page-content">
        <h2><?php the_title(); ?></h2>
        <p class="page-subtitle"><?php single_term_title(); ?> - <?php the_field('project_date'); ?></p>
        <?php the_content(); ?>
      </article>

      <?php if(comments_open()){ comments_template(); } ?>

      <div class="post-nav">
        <?php previous_post_link('%link', '<i ')
        <a href="#" class="btn-main pull-left" rel="prev"><i class="fa fa-angle-left"></i>Prev Project</a>
        <a href="#" class="btn-main pull-right" rel="next">Next Project<i class="fa fa-angle-right"></i></a>
      </div>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
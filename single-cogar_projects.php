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
      $projects_page = get_page_by_path('projects');
      $projects_page_id = $projects_page->ID; ?>
      <p class="page-subtitle"><?php the_field('page_subtitle', $projects_page_id); ?></p>
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
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <div class="project-header">
        <h2><?php the_title(); ?></h2>
        <?php
          $cur_tax = '';
          $terms = get_the_terms(get_the_ID(), 'project_types');
          if($terms){ $cur_tax = $terms[0]->name . ' - '; }
        ?>
        <p class="page-subtitle"><?php echo $cur_tax; ?><?php the_field('project_date'); ?></p>
      </div>

        <?php if(have_rows('content_layout')): while(have_rows('content_layout')): the_row(); ?>

          <?php if(get_row_layout() == 'content_left_image_right'): ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="row-content">
                  <?php the_sub_field('row_content'); ?>
                  <?php if(get_field('button_link')): ?>
                    <a href="<?php the_field('button_link'); ?>" class="btn-main"><?php the_field('button_text'); ?></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row-image">
                  <?php $row_image = get_sub_field('row_image'); ?>
                  <img src="<?php echo $row_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $row_image['alt']; ?>" />
                </div>
              </div>
            </div>
          <?php elseif(get_row_layout() == 'standard_layout'): ?>
            <article class="page-content">
              <?php the_sub_field('page_content'); ?>
            </article>
          <?php elseif(get_row_layout() == 'callout'): ?>
            </div><!-- .container -->
            <section class="callout">
              <div class="container">
                <?php the_sub_field('callout_text'); ?>
              </div>
            </section>
            <div class="container">
          <?php endif; ?>

        <?php endwhile; else: ?>

          <article class="page-content">
            <p>Sorry, the page could not be loaded.</p>
          </article>

        <?php endif; ?>

      <?php if(comments_open()){ comments_template(); } ?>

      <div class="post-nav">
        <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>Prev Project'); ?>
        <?php next_post_link('%link', 'Next Project<i class="fa fa-angle-right"></i>'); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
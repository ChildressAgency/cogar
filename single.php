<?php get_header(); ?>
<main id="main">
  <div class="container">
    <?php if(get_field('page_title')): ?>
      <h1 class="page-title"><?php the_field('page_title'); ?></h1>
    <?php else: ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if(get_field('page_subtitle')): ?>
      <p class="page-subtitle"><?php the_field('page_subtitle'); ?></p>
    <?php endif; ?>

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
  </div>
</main>
<?php get_footer(); ?>
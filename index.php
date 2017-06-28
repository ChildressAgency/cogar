<?php get_header(); ?>
<main id="main">
  <div class="container">
    <article class="page-content">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
      <?php endwhile; endif; ?>
    </article>
  </div>
</main>
<?php get_footer(); ?>
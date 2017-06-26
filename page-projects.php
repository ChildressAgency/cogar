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
    <div class="row">
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="project-thumbnail">
          <img src="http://placehold.it/315x175" class="img-responsive center-block" alt="" />
          <div class="caption">
            <h3>Title of Job here</h3>
            <p>This was one of our latest sewer line spot repeats, remember to call Miss Utility for utility markings, excavate make...</p>
            <h4>5 September 2016&nbsp;&nbsp;1 Comment</h4>
          </div>
        </a>
      </div>
    </div>
    <div class="wp-pagenavi">
      <span class="pages">Page 1 of 8</span>
      <a href="#" class="first">&lt; First</a>
      <a href="#" class="previouspostslink" rel="prev"></a>
      <a href="#" class="page smaller">1</a>
      <span class="current">2</span>
      <a href="#" class="page larger">3</a>
      <a href="#" class="page larger">4</a>
      <a href="#" class="page larger">5</a>
      <span class="extend">...</span>
      <a href="#" class="nextpostslink" rel="next"></a>
      <a href="#" class="last">Last &gt;</a>          
    </div>
  </div>
</main>
<?php get_footer(); ?>
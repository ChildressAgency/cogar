<section id="comments">
  <?php if(have_comments()): ?>
    <div class="comment-list">
      <h2>COMMENTS:</h2>
      <ul>
        <?php wp_list_comments(array('style' => 'ul')); ?>
      </ul>
    </div>
  <?php endif; ?>
  <div class="leave-comment">
    <h2>LEAVE A COMMENT:</h2>
    <?php comment_form(); ?>
  </div>
</section>
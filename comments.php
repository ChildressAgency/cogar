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
    <?php comment_form(array(
      'fields' => array(
        '<div class="row"><div class="col-sm-6"><div class="form-group"><label for="author" class="sr-only">Name</label><input id="author" name="author" type="text" class="form-control" aria-required="true" required="required" placeholder="Name*" /></div></div>',
        '<div class="col-sm-6"><div class="form-group"><label for="email" class="sr-only">Email</label><input id="email" name="email" type="text" class="form-control" aria-describedby="email-notes" aria-required="true" required="required" placeholder="Email*" /></div></div></div>'
      ),
      'comment_field' => '<div class="form-group"><label for="comment" class="sr-only">Comment</label><textarea id="comment" name="comment" rows="3" class="form-control" maxlength="65525" aria-required="true" required="required" placeholder="Comment*"></textarea></div>',
      'title_reply' => 'LEAVE A COMMENT',
      'title_reply_to' => 'LEAVE A REPLY TO %s',
      'class_submit' => 'btn-alt',
      'label_submit' => 'Submit'
    )); ?>
  </div>
</section>
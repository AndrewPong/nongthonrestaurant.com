<?php get_header(); ?>
<div class="colmask rightmenu blogstyle">
  <div class="colmid">
    <div class="colleft">
      <div class="col1">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="entry">
            <?php the_content(__('Read the rest of this entry &raquo;', 'r755')); ?>
          </div>
          <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'r755') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <div class="postinfo"> <?php printf(__('This entry was posted %1$s on %2$s at %3$s and is filed under %4$s.', 'r755'), $time_since, get_the_time(__('d/m/Y (l)', 'r755')), get_the_time(), get_the_category_list(', ')); ?> <?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "r755"), get_post_comments_feed_link()); ?>
            <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
            <?php printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'r755'), trackback_url(false)); ?>
            <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
            <?php printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'r755'), trackback_url(false)); ?>
            <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
            <?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'r755'); ?>
            <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
            <?php _e('Both comments and pings are currently closed.', 'r755'); ?>
            <?php } edit_post_link(__('Edit this entry', 'r755'),'','.'); ?>
          </div>
          <div class="printinfo">
            <?php $copyright_name = get_option('r755_copyright_name'); ?>
            <?php _e('Printed from:', 'r755'); ?>
            <?php the_permalink(); ?>
            .<br />
            &copy; <?php echo $copyright_name; ?> <?php echo date('Y') ?>. </div>
          <?php if(function_exists('wp_related_posts')) : ?>
          <?php wp_related_posts(); ?>
          <?php endif; ?>
        </div>
        <?php comments_template('', true); ?>
        <?php endwhile; else: ?>
        <h2>
          <?php _e('Not Found', 'r755'); ?>
        </h2>
        <p>
          <?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'r755'); ?>
        </p>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
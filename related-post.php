<!-- Related Posts -->
<?php $orig_post = $post; 
  global $post; 
  $tags = wp_get_post_tags($post->ID); 
  
  if ($tags):
    $tag_ids = array(); 
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $number_of_posts = 3; // number of posts to display
    $query = "
      SELECT ".$wpdb->posts.".*, COUNT(".$wpdb->posts.".ID) as q
      FROM ".$wpdb->posts." INNER JOIN ".$wpdb->term_relationships."
      ON (".$wpdb->posts.".ID = ".$wpdb->term_relationships.".object_id)
      WHERE ".$wpdb->posts.".ID NOT IN (".$post->ID.")
      AND ".$wpdb->term_relationships.".term_taxonomy_id IN (".implode(",",$tag_ids).")
      AND ".$wpdb->posts.".post_type = 'post'
      AND ".$wpdb->posts.".post_status = 'publish'
      GROUP BY ".$wpdb->posts.".ID
      ORDER BY q
      DESC LIMIT ".$number_of_posts."";
    $related_posts = $wpdb->get_results($query, OBJECT);
    if($related_posts): ?>
    <div class="related-posts"> 
        <h3 class="common-title">You might also like</h3>
        <div class="row">
            <?php foreach($related_posts as $post): ?>
            <?php setup_postdata($post); ?>
                <div class="col-sm-4">
                  <div class="single-related-posts">
                      <a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
                          <?php 
                              $defaultThumb = get_template_directory_uri().'/images/no-thumb.jpg';
                          ?>
                          <?php 
                              if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                  the_post_thumbnail( 'related-image', array('class' => 'img-responsive related-thumb'));
                              } else{ 
                                  echo "<img src='".esc_url($defaultThumb)."' class='img-responsive related-thumb'>";
                              } 
                          ?>
                      </a>
                      <header>
                        <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a></h3>
                        <p><?php the_time('M d, Y') ?></p>
                      </header>
                  </div> 
                </div> 
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif;
  endif;
$post = $orig_post; 
wp_reset_query(); ?>
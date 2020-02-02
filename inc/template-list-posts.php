<?php 

function brunoaraujo_posts_list(){
  if ( 'post' === get_post_type() ) {
    $current_post = get_the_ID();
    $args_post = [
      'post_type' => 'post',
      'numberposts' => 3,
      'exclude' => [ 0 => $current_post ]
    ];
    $arr_pages = get_posts($args);
    $arr_last_posts = get_posts($args_post);

  if(count($arr_last_posts) > 0) : ?>
      <h3>Bora aprender mais?</h3>
      <div class="internal-postlist">
        <?php foreach($arr_last_posts as $last_post) :
            $last_post_tags = get_the_tags($last_post->ID);
            $date
        ?>
          <article class="site-card">
            <p class="card-date"><?php echo date_format(new DateTime($last_post->post_date), 'd-m-Y') ?></p>
            <a href="<?php echo get_permalink($last_post) ?>"><h1 class="card-title"><?php echo $last_post->post_title ?></h1></a>
            <p class="card-content"><?php echo get_the_excerpt($last_post) ?></p>
            <a href="<?php echo get_permalink($last_post) ?>" class="card-link">Ler mais</a>
            <?php if($last_post_tags) :?>
              <?php if(count($last_post_tags) > 0) : ?>
                <ul class="tag-list">
                  <?php foreach($last_post_tags as $last_post_tag) : ?>
                    <li><a href="#" target="_blank"><?php echo $last_post_tag->name ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php	endif; ?>
            <?php	endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif;
  }

}
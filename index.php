<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brunoaraujo
 */

get_header();
?>

	<div id="primary" class="content-area container-small">
		<main id="main" class="site-main">
		<!-- Página com o conteúdo descritivo da home -->
		<?php
			$args = [
				'name' => 'apresentacao-home',
				'post_type' => 'page',
				'numberposts' => 1	
			];
			$args_post = [
				'post_type' => 'post',
				'numberposts' => 3	
			];
			$arr_pages = get_posts($args);
			$arr_last_posts = get_posts($args_post);

			if(count($arr_pages) > 0) :
				$page_apresentacao = array_shift($arr_pages); ?>

				<article class="home-presentation">
					<?php echo $page_apresentacao->post_content; ?>
				</article>
		<?php
			endif 
		?>
		<?php if(count($arr_last_posts) > 0) : ?>
			<h3>Últimos posts</h3>
			<?php foreach($arr_last_posts as $last_post) :
					$last_post_tags = get_the_tags($last_post->ID);
					$date
		?>
					<article class="site-card">
						<p class="card-date"><?php echo date_format(new DateTime($last_post->post_date), 'd-m-Y') ?></p>
						<a href="<?php echo get_permalink($last_post) ?>"><h1 class="card-title"><?php echo $last_post->post_title ?></h1></a>
						<p class="card-content"><?php echo get_the_excerpt($last_post) ?></p>
						<a href="<?php echo get_permalink($last_post) ?>" class="card-link">Ler mais</a>
						<?php if(count($last_post_tags) > 0) : ?>
							<ul class="tag-list">
								<?php foreach($last_post_tags as $last_post_tag) : ?>
									<li><a href="#" target="_blank"><?php echo $last_post_tag->name ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php	endif; ?>
					</article>
		<?php 
				endforeach;
			endif;
		?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
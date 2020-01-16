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
			$arr_pages = get_posts($args);

			if(count($arr_pages) > 0) :
				$page_apresentacao = array_shift($arr_pages); ?>

				<article class="home-presentation">
					<?php echo $page_apresentacao->post_content; ?>
				</article>
		<?php
			endif 
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Integra_Elements
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<div id="smooth-wrapper">
	<div id="smooth-content">

		<header id="masthead" class="site-header">
			<?php get_template_part( 'template-parts/navigation/navigation' ); ?>
		</header>

		<div style="height: 300vh;">
			<h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, voluptas?</h1>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, magni sunt voluptas sequi, nam corrupti excepturi illo autem tempora adipisci corporis quibusdam tenetur velit, pariatur molestias assumenda? Ut amet facere id quo ducimus consectetur doloremque ipsum provident quam sunt corporis possimus beatae, minima, distinctio reprehenderit aut maiores veritatis explicabo sequi accusamus, facilis labore aspernatur nam! Corrupti, odio. Ut harum inventore vero magnam! Sed praesentium iusto mollitia aperiam quasi, porro reiciendis excepturi! Ipsam inventore nam eligendi incidunt autem eum blanditiis quidem laboriosam consectetur similique! At iusto a omnis provident voluptatem unde, delectus magnam veritatis fugiat quos, aliquid praesentium voluptates fuga repellat!</p>
		</div>

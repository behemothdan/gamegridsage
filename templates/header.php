<?php use Roots\Sage\Nav; ?>

<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
			<a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
        <img id="header-logo" class="bigheaderlogo" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
      </a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Nav\SageNavWalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
<div class="container-fluid eventcontainer">
	<div class="row">
		<?php $loop = new WP_Query( array( 'post_type' => 'newbanners', 'posts_per_page' => 3 ) ); ?>

		<?php while ( $loop->have_posts() ) : $loop->the_post();						
				if ( has_post_thumbnail() ){
					$featuredeventbackground = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 780,300 ), false, '' );
					$jumbotroncontent = get_the_content();
					$featuredeventtitle = get_the_title();
				}											
		?>
			<div class="col-md-4" style="background-image:url('<?php echo $featuredeventbackground[0]; ?>');">
				<h1><?php echo $featuredeventtitle; ?></h1>
				<span><?php the_field('tagline'); ?></span>
				<a class="btn btn-primary alignright learnmore" href="<?php the_permalink(); ?>">Learn more</a>
			</div>	
		<?php endwhile; ?>		
	</div>
</div>
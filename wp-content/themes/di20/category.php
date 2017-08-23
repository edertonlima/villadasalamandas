<?php get_header(); ?>

<section class="box-content box-casas">
	<div class="container">

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_casas.png" alt="NOSSAS CASAS">
			<div class="cont-h2">
				<span class="titulo">NOSSAS CASAS</span>
				<span class="subtitulo">Todas as casas possuem estrutura completa pra seu total conforto, conheça!</span>
			</div>
		</h2>

		<div class="content single">
			<div class="row">
				<?php
					while ( have_posts() ) : the_post(); ?>

						<div class="col-4">
							<?php get_template_part( 'content-list' ); ?>
						</div>	

						<div class="col-4">
							<?php get_template_part( 'content-list' ); ?>
						</div>	

						<div class="col-4">
							<?php get_template_part( 'content-list' ); ?>
						</div>	

						<div class="col-4">
							<?php get_template_part( 'content-list' ); ?>
						</div>	
					<?php endwhile;
				?>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>
<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="5000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();

						if(get_sub_field('imagem')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');"></div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<?php if($slide > 2){ ?>
				<ol class="carousel-indicators">
					
					<?php for($i=0; $i<$slide; $i++){ ?>
						<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
					<?php } ?>
					
				</ol>
			<?php } ?>

		</div>
	</div>
</section>

<section class="box-content box-quem-somos">
	<div class="container">

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_quem-somos.png" alt="<?php the_field('titulo') ?>">
			<div class="cont-h2">
				<span class="titulo"><?php the_field('titulo') ?></span>
				<span class="subtitulo"><?php the_field('subtitulo') ?></span>
			</div>
		</h2>

		<article class="content">
			<?php the_field('texto') ?>
		</article>

		<?php if( have_rows('bloco') ): ?>
			<article class="content">

				<?php while ( have_rows('bloco') ) : the_row(); ?>

					<div class="bloco">
						<span class="titulo"><?php the_sub_field('titulo'); ?></span>
						<span class="texto"><?php the_sub_field('texto'); ?></span>
					</div>

				<?php endwhile; ?>
				
			</article>
		<?php endif; ?>

	</div>
</section>

<?php get_footer(); ?>

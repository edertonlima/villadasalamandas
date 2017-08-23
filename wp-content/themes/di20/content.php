<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

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

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

			<a href="javascript:" class="button visualizar" title="Visualizar Fotos">Visualizar Fotos</a>

		</div>

	</div>
</section>

<section class="box-content box-casas">
	<div class="container">

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_casas.png" alt="NOSSAS CASAS">
			<div class="cont-h2">
				<span class="titulo"><?php the_field('titulo'); ?></span>
				<span class="subtitulo"><?php the_field('subtitulo'); ?></span>
			</div>
		</h2>

		<article class="content single">
			<div class="caracteristica">
				
				<div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_pessoas.png" alt="">
					<span><?php the_field('pessoas'); ?> Pessoa<?php if(get_field('pessoas') > 1){ echo 's'; } ?></span>
				</div>

				<div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_quartos.png" alt="">
					<span><?php the_field('quartos'); ?> Quarto<?php if(get_field('quartos') > 1){ echo 's'; } ?></span>
				</div>

				<div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_banheiros.png" alt="">
					<span><?php the_field('banheiros'); ?> Banheiro<?php if(get_field('banheiros') > 1){ echo 's'; } ?></span>
				</div>

			</div>

			<?php the_field('texto') ?>
		</article>

	</div>
</section>

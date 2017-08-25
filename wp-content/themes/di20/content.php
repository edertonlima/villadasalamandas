<?php
	$idioma = qtrans_getLanguage();
	if($idioma == 'br'){
		$visualizar = 'Visualizar Fotos';
		$pessoa = 'Pessoa'; $pessoas = 'Pessoas';
		$quarto = 'Quarto'; $quartos = 'Quartos';
		$banheiro = 'Banheiro'; $banheiros = 'Banheiros';
	}

	if($idioma == 'es'){
		$visualizar = 'Ver las fotos';
		$pessoa = 'Pessoa'; $pessoas = 'personas';
		$quarto = 'Habitación'; $quartos = 'Habitaciones';
		$banheiro = 'Baño'; $banheiros = 'Baños';
	}

	if($idioma == 'en'){
		$visualizar = 'View Photos';
		$pessoa = 'Person'; $pessoas = 'People';
		$quarto = 'bedroom'; $quartos = 'Rooms';
		$banheiro = 'bathroom'; $banheiros = 'Bathrooms';
	}
?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="5000" id="slide">

			<div class="carousel-inner" role="listbox">

				<div class="item active" style="background-image: url('<?php the_field('capa_detalhe'); ?>');"></div>

			</div>

			<?php if( have_rows('modal') ): ?>
				<a href="javascript:" onclick="javascript: jQuery('.item-1').trigger('click');" class="button visualizar"><?php echo $visualizar; ?></a>
			<?php endif; ?>

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
					<span><?php the_field('pessoas'); ?> <?php if(get_field('pessoas') > 1){ echo $pessoas; }else{ echo $pessoa; } ?></span>
				</div>

				<div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_quartos.png" alt="">
					<span><?php the_field('quartos'); ?> <?php if(get_field('pessoas') > 1){ echo $quartos; }else{ echo $quarto; } ?></span>
				</div>

				<div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_banheiros.png" alt="">
					<span><?php the_field('banheiros'); ?> <?php if(get_field('pessoas') > 1){ echo $banheiros; }else{ echo $banheiro; } ?></span>
				</div>

			</div>

			<?php the_field('texto'); ?>

			<?php if( have_rows('iten_casa') ): ?>
				<div class="itens">

					<?php while ( have_rows('iten_casa') ) : the_row(); ?>

						<div class="item">
							<img src="<?php the_sub_field('icone'); ?>" alt="">
							<span><?php the_sub_field('titulo'); ?></span>
						</div>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</article>

	</div>
</section>

<?php if( have_rows('modal') ):
	$item = 0;
	while ( have_rows('modal') ) : the_row();

		$item = $item+1;
		if(get_sub_field('imagem')){ ?>

		 	<a href="<?php the_sub_field('imagem'); ?>" class="fancybox <?php echo 'item-'.$item; ?>" data-fancybox="galeria" style="display: none;"><img src="<?php the_sub_field('imagem'); ?>" /></a>

		<?php }
		
	endwhile;
endif; ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>
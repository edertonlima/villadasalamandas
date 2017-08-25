<?php get_header(); ?>

<section class="box-content box-casas">
	<div class="container">
	
		<?php
			$idioma = qtrans_getLanguage();
			if($idioma == 'br'){
				$casas = 'NOSSAS CASAS';
				$tipo = 'Tipo';
				$tipo_casa = 'Casa';
				$tipo_suite = 'Suíte';
				$tipo_estudio = 'Estúdio';
				$pessoa = 'Pessoa'; $pessoas = 'Pessoas';
				$quarto = 'Quarto'; $quartos = 'Quartos';
				$banheiro = 'Banheiro'; $banheiros = 'Banheiros';
			}

			if($idioma == 'es'){
				$casas = 'NUESTRAS CASAS';
				$tipo = 'Tipo';
				$tipo_casa = 'Casa';
				$tipo_suite = 'Suite';
				$tipo_estudio = 'Estudio';
				$pessoa = 'Pessoa'; $pessoas = 'personas';
				$quarto = 'Habitación'; $quartos = 'Habitaciones';
				$banheiro = 'Baño'; $banheiros = 'Baños';
			}

			if($idioma == 'en'){
				$casas = 'OUR HOUSES';
				$tipo = 'Kind';
				$tipo_casa = 'Home';
				$tipo_suite = 'Suite';
				$tipo_estudio = 'Studio';
				$pessoa = 'Person'; $pessoas = 'People';
				$quarto = 'Room'; $quartos = 'Rooms';
				$banheiro = 'Bathroom'; $banheiros = 'Bathrooms';
			}
		?>

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_casas.png" alt="<?php echo $casas; ?>">
			<div class="cont-h2">
				<span class="titulo"><?php echo $casas; ?></span>
				<span class="subtitulo"><?php the_field('subtitulo_casas', 'option'); ?></span>
			</div>
		</h2>

		<div class="content single">
			<div class="row">

				<?php
					while ( have_posts() ) : the_post();
						
						$filtro_tipo[] = get_field('tipo');
						$filtro_quarto[] = get_field('quartos');
						$filtro_pessoa[] = get_field('pessoas');

					endwhile;
					$filtro_tipo = array_unique($filtro_tipo);
					$filtro_quarto = array_unique($filtro_quarto);
					$filtro_pessoa = array_unique($filtro_pessoa);
					sort($filtro_tipo);
					sort($filtro_quarto);
					sort($filtro_pessoa);
				?>

				<div class="col-4 box-select">
					<div class="select">
						<span class="icon_select"></span>
						<ul>
							<li rel="" class="fixo"><?php echo $tipo; ?></li>
							<?php
								foreach ($filtro_tipo as $item_tipo) { ?>
									<li rel=".<?php echo $item_tipo; ?>">
										<?php
											switch ($item_tipo) {
												case 'Casa':
													echo $tipo_casa;
													break;
												case 'Suíte':
													echo $tipo_suite;
													break;
												case 'Estúdio':
													echo $tipo_estudio;
													break;
											}
										?>
									</li>
								<?php }
							?>						
							<li rel="" class="ativo"><?php echo $tipo; ?></li>
						</ul>
					</div>
				</div>

				<div class="col-4 box-select">
					<div class="select">
						<span class="icon_select"></span>
						<ul>
							<li rel="" class="fixo"><?php echo $quartos; ?></li>
							<?php
								foreach ($filtro_quarto as $item_quarto) { ?>
									<li rel=".quartos-<?php echo $item_quarto; ?>">
										<?php 
											echo $item_quarto.' ';
											if($item_quarto > 1){
												echo $quartos;
											}else{
												echo $quarto;
											} 
										?>
									</li>
								<?php }
							?>
							<li rel="" class="ativo"><?php echo $quartos; ?></li>
						</ul>
					</div>
				</div>

				<div class="col-4 box-select">
					<div class="select">
						<span class="icon_select"></span>
						<ul>
							<li rel="" class="fixo"><?php echo $pessoas; ?></li>
							<?php
								foreach ($filtro_pessoa as $item_pessoa) { ?>
									<li rel=".pessoas-<?php echo $item_pessoa; ?>">
										<?php 
											echo $item_pessoa.' ';
											if($item_pessoa > 1){
												echo $pessoas;
											}else{
												echo $pessoa;
											} 
										?>
									</li>
								<?php }
							?>
							<li rel="" class="ativo"><?php echo $pessoas; ?></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="row">
				<?php
					while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content-list' ); ?>

					<?php endwhile;
				?>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		jQuery('.icon_select').click(function(){
			if(jQuery(this).parent().hasClass('open')){
				jQuery('.select').removeClass('open');
			}else{
				jQuery('.select').removeClass('open');
				jQuery(this).parent().addClass('open');
			}
		});

		jQuery('.select li').click(function(){
			if((!(jQuery(this).hasClass('ativo'))) && (!(jQuery(this).hasClass('fixo')))){
				jQuery(this).siblings().removeClass('ativo');
				jQuery(this).addClass('ativo');
				var item = jQuery(this).attr('rel');
				var txt = jQuery(this).html();
				jQuery(this).siblings('.fixo').attr('rel',item);
				jQuery(this).siblings('.fixo').html(txt);
				jQuery('.select').removeClass('open');
				var fixo = '';
				jQuery('.select li.fixo').each(function(){
					fixo += jQuery(this).attr('rel');
				});
				if(fixo == ''){
					jQuery('.filtro-casa').show();
				}else{
					jQuery('.filtro-casa').hide();
					jQuery(fixo).show();
				}
			}
		});

	});	
</script>
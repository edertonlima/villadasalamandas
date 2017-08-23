<?php get_header(); ?>

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

		</div>
	</div>
</section>

<section class="box-content box-quem-somos">
	<div class="container">
		
		<?php $page = get_page_by_path('quem-somos'); ?>

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_quem-somos.png" alt="<?php the_field('titulo',$page->ID) ?>">
			<div class="cont-h2">
				<span class="titulo"><?php the_field('titulo',$page->ID) ?></span>
				<span class="subtitulo"><?php the_field('subtitulo',$page->ID) ?></span>
			</div>
		</h2>

		<article class="content">
			<?php the_field('texto',$page->ID) ?>
		</article>

		<?php if( have_rows('bloco',$page->ID) ): ?>
			<article class="content">

				<?php while ( have_rows('bloco',$page->ID) ) : the_row(); ?>

					<div class="bloco">
						<span class="titulo"><?php the_sub_field('titulo'); ?></span>
						<span class="texto"><?php the_sub_field('texto'); ?></span>
					</div>

				<?php endwhile; ?>
				
			</article>
		<?php endif; ?>

	</div>
</section>

<section class="box-content box-casas">
	<div class="container">

		<h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_casas.png" alt="NOSSAS CASAS">
			<div class="cont-h2">
				<span class="titulo">NOSSAS CASAS</span>
				<span class="subtitulo">Todas as casas possuem estrutura completa pra seu total conforto, conheça!</span>
			</div>
		</h2>

		<article class="content single">
			<div class="row">
				<?php

					query_posts(
						array(
							'posts_per_page' => 6,
							'post_type' => 'post'
						)
					);

					while ( have_posts() ) : the_post(); ?>

						<div class="col-4">
							<?php get_template_part( 'content-list' ); ?>
						</div>	

				<?php endwhile;				 
					wp_reset_query();
				?>
			</div>
		</article>
 
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){	    

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#texto').val();
			var para = '<?php get_field('email', 'option'); ?>';
			var nome_site = '<?php get_field('titulo', 'option'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});

	});
</script>
	<section class="box-content box-contato">
		<div class="container">
			
			<?php $page = get_page_by_path('contato'); ?>

			<h2>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_contato.png" alt="<?php the_field('titulo',$page->ID) ?>">
				<div class="cont-h2">
					<span class="titulo"><?php the_field('titulo',$page->ID) ?></span>
					<span class="subtitulo"><?php the_field('subtitulo',$page->ID) ?></span>
				</div>
			</h2>

			<article class="content">
				<form action="javascript:" id="form-contato">
					<div class="row">
						<div class="col-6">
							<fieldset>
								<input type="text" name="nome" id="nome" placeholder="*Nome">
							</fieldset>

							<fieldset>
								<input type="text" name="email" id="email" placeholder="*E-mail">
							</fieldset>

							<fieldset>
								<input type="text" name="telefone" id="telefone" placeholder="*Telefone">
							</fieldset>
						</div>

						<div class="col-6">
							<fieldset>
								<textarea name="mensagem" id="mensagem">*Mensagem</textarea>
							</fieldset>
						</div>

						<div class="col-12">
							<button type="button" class="enviar">Enviar mensagem</button>
							<p class="msg-form"></p>
						</div>
					</div>
				
				</form>
			</article>

		</div>
	</section>

	<section class="box-content box-localizacao">
		<div class="container">
			
			<?php $page = get_page_by_path('localizacao'); ?>

			<h2>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_localizacao.png" alt="<?php the_field('titulo',$page->ID) ?>">
				<div class="cont-h2">
					<span class="titulo"><?php the_field('titulo',$page->ID) ?></span>
					<span class="subtitulo"><?php the_field('subtitulo',$page->ID) ?></span>
				</div>
			</h2>

			<article class="content">
				<div class="row">
					
					<div class="col-5">
						<p><?php the_field('endereco','option'); ?></p>

						<p>Telefone:</p>
						<p>
							<?php the_field('telefone_1','option'); ?>

							<?php if(get_field('telefone_2','option')){
								echo '<br>';
								the_field('telefone_2','option');
							} ?>

							<?php if(get_field('telefone_3','option')){
								echo '<br>';
								the_field('telefone_3','option');
							} ?>
						</p>
					</div>

					<div class="col-7">
						<?php the_field('google_maps','option'); ?>
					</div>

				</div>
			</article>

		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-4">
					<div class="copy">Copyright © Villa das Alamandas <?php echo date('Y'); ?></div>
				</div>

				<div class="col-4">
					<?php if( have_rows('redes_sociais','option') ): ?>
						<div class="redes">						
							<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

								<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
									<img src="<?php the_sub_field('icone','option'); ?>" alt="<?php the_field('nome', 'option'); ?>">
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-4">
					<a href="http://www.di20.com.br" class="di20" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_di20.png" alt="di20 DESENV." /></a>
				</div>
				
			</div>
		</div>
	</footer>

</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function(){	    
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('Enviando mensagem...').prop( "disabled", true );
			jQuery('.msg-form').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php the_field('titulo', 'option'); ?>';

			if((nome!='') && (email!='') && (telefone!='')){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form#form-contato').trigger("reset");
					jQuery('.enviar').html('Enviar mensagem').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').html('Por favor, todos os campos precisam ser preenchidos.');
				jQuery('.enviar').html('Enviar mensagem').prop( "disabled", false );
			}
		});

	});
</script>
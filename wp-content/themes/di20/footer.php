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

							<?php
								$idioma = qtrans_getLanguage();
								if($idioma == 'br'){
									$nome = 'Nome';
									$email = 'E-mail';
									$telefone = 'Telefone';
									$mensagem = 'Mensagem';
									$button = 'Enviar mensagem';
									$button_on = 'Enviando mensagem...';
								}

								if($idioma == 'es'){
									$nome = 'Nombre';
									$email = 'E-mail';
									$telefone = 'Teléfono';
									$mensagem = 'Mensaje';
									$button = 'Enviar mensaje';
									$button_on = 'Enviando mensaje ...';
								}

								if($idioma == 'en'){
									$nome = 'Name';
									$email = 'Email';
									$telefone = 'Phone';
									$mensagem = 'Message';
									$button = 'Send message';
									$button_on = 'Sending message ...';
								}
							?>

							<fieldset>
								<input type="text" name="nome" id="nome" placeholder="*<?php echo $nome; ?>">
							</fieldset>

							<fieldset>
								<input type="text" name="email" id="email" placeholder="*<?php echo $email; ?>">
							</fieldset>

							<fieldset>
								<input type="text" name="telefone" id="telefone" placeholder="*<?php echo $telefone; ?>">
							</fieldset>
						</div>

						<div class="col-6">
							<fieldset>
								<textarea name="mensagem" id="mensagem">*<?php echo $mensagem; ?></textarea>
							</fieldset>
						</div>

						<div class="col-12">
							<button type="button" class="enviar"><?php echo $button; ?></button>
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

						<p><?php echo $telefone; ?>:</p>
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

				<div class="col-5">
					<div class="copy">Copyright © Villa das Alamandas <?php echo date('Y'); ?></div>
				</div>

				<div class="col-2">
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

				<div class="col-5">
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
			jQuery('.enviar').html('<?php echo $button_on; ?>').prop( "disabled", true );
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
					jQuery('.enviar').html('<?php echo $button; ?>').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').html('Por favor, todos os campos precisam ser preenchidos.');
				jQuery('.enviar').html('<?php echo $button; ?>').prop( "disabled", false );
			}
		});

	});
</script>
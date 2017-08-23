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
				<form action="javascript:">
					<div class="row">
						<div class="col-6">
							<fieldset>
								<input type="text" name="nome" id="nome" placeholder="Nome">
							</fieldset>

							<fieldset>
								<input type="text" name="email" id="email" placeholder="E-mail">
							</fieldset>

							<fieldset>
								<input type="text" name="telefone" id="telefone" placeholder="Telefone">
							</fieldset>
						</div>

						<div class="col-6">
							<fieldset>
								<textarea name="mensagem" id="mensagem">Mensagem</textarea>
							</fieldset>
						</div>

						<div class="col-12">
							<button type="button" class="enviar">Enviar mensagem</button>
							<p class=""></p>
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
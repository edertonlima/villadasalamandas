<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">	
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox"> 

				<?php 
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
				if($imagem[0]){ ?>
					<div class="item active" style="background-image: url('<?php echo $imagem[0]; ?>');"></div>
				<?php }	?>

			</div>

		</div>
	</div>
</section>

<section class="box-content">
	<h2 class="laranja"><?php the_title(); ?></h2>
	<div class="det-produto">

		<article class="post">

			<div class="row">
				<div class="col-6">

					<?php
						if(get_field('imagem_descricao')){ ?>
							<img src="<?php the_field('imagem_descricao'); ?>" alt="<?php the_title(); ?>" />
						<?php }
					?>

					<span class="item-info"><strong>Ingredientes: </strong><?php the_field('ingredientes'); ?></span>

					<?php if( have_rows('campos_personalizados') ):
						while ( have_rows('campos_personalizados') ) : the_row(); ?>

							<span class="item-info"><strong><?php the_sub_field('titulo'); ?></strong><?php the_sub_field('texto'); ?></span>

						<?php endwhile;
					endif; ?>

					<?php /*
						$custom = get_post_custom($post->ID);
						//var_dump($custom);
						foreach($custom as $key => $value) { 
							$item = explode('_', $key);
							$option_post = true;
							if(count($item) == 1){ 
								if($key != 'ingredientes'){ ?>
									<span class="item-info"><strong><?php echo $key; ?> </strong><?php echo $value[0]; ?></span>
								<?php }
							}
						} */
					?>
				</div>
				<div class="col-4 col-m-2">
					<?php
						if(get_field('imagem_tabela')){ ?>
							<img src="<?php the_field('imagem_tabela'); ?>" alt="<?php the_title(); ?>" />
						<?php }
					?>
				</div>
			</div>

		</article>

	</div>
</section>

<?php get_footer(); ?>
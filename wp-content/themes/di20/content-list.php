<article class="item-casa">

	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_field('titulo'); ?>"  class="img-list">
		<img src="<?php if($imagem[0]){ echo $imagem[0]; } ?>">
	</a>

	<h3><a href="<?php the_permalink(); ?>" title="<?php the_field('titulo'); ?>"><?php the_field('titulo'); ?></a></h3>

	<div class="caracteristica">
		
		<div class="item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_pessoas.png" alt="Quantidade de Pessoas">
			<span><?php the_field('pessoas'); ?></span>
		</div>

		<div class="item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_quartos.png" alt="Quantidade de Quartos">
			<span><?php the_field('quartos'); ?></span>
		</div>

		<div class="item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_banheiros.png" alt="Quantidade de Banheiros">
			<span><?php the_field('banheiros'); ?></span>
		</div>

	</div>

	<div class="excerpt">
		<?php the_excerpt() ?>
	</div>
</article>

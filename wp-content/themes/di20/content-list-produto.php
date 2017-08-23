<article class="post">

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
		<img src="<?php the_field('imagem_listagem'); ?>" alt="<?php the_title(); ?>" />
	</a>
	<h4><?php the_title(); ?></h4>
	<span class="item-info"><strong>Ingredientes: </strong><?php the_field('ingredientes'); ?></span>

	<a href="<?php the_permalink(); ?>" title="Saiba mais" class="saiba-mais">Saiba Mais <i class="fa fa-plus-circle" aria-hidden="true"></i></a>

</article>
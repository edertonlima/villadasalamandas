<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide_produtos','option') ):
					$slide = 0;
					while ( have_rows('slide_produtos','option') ) : the_row();

						if(get_sub_field('imagem_slide_produtos','option')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem_slide_produtos','option'); ?>');"></div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php 
					if($slide > 1){ 
						for($i=0; $i<$slide; $i++){ ?>
							<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
						<?php }
					}
				?>
				
			</ol>

		</div>
	</div>
</section>

<section class="box-content">
	<h2 class="pink">PRODUTOS</h2>
	<div class="produto">
		<div class="row no-padding">

			<?php
				$args = array(
				    'taxonomy'      => 'categoria_produto',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $category ){ ?>

					<div class="col-6">
						<a href="<?php echo get_term_link($category->term_id); ?>" title="<?php echo $category->name; ?>" style="background-image: url('<?php the_field('imagem_listagem',$category->taxonomy.'_'.$category->term_id); ?>');">
							<span class="hover-prod">
								<img src="<?php the_field('ico_listagem',$category->taxonomy.'_'.$category->term_id); ?>" alt="" />
								<?php echo $category->name; ?>
							</span>
						</a>
					</div>
					
				<?php }
			?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
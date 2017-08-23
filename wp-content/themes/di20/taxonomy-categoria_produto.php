<?php get_header(); ?>

<?php $terms = get_queried_object(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox"> 

				<?php if( have_rows('slide_categoria',$terms->taxonomy.'_'.$terms->term_id) ):
					$slide = 0;
					while ( have_rows('slide_categoria',$terms->taxonomy.'_'.$terms->term_id) ) : the_row();

							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');"></div>

					<?php
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
	<h2 class="bege"><?php single_term_title(); ?></h2>
	<div class="list-produto">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content-list-produto', 'post' );

		endwhile;
		?>

	</div>
</section>


<?php get_footer(); ?>
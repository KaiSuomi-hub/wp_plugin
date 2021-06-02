<?php  
	$id     = get_field('car_id');
	$images = get_field('car_kuvat');
?>

<div class="car-card">
	<div class="inner">

        <?php  
			// Get array of original images
			$images = json_decode($images);
			$cleanImages = array();
			$thumbImages = array();
			foreach ($images as $image) {
				$image = json_decode(json_encode($image), true);
				$cleanImages[] = $image['orig'];
				$thumbImages[] = $image['thumb'];
			}
        ?>

        <?php // Cover image ?>
		<a target="_blank" href="<?php echo get_the_permalink(); ?>" data-id="<?php echo $id; ?>">
           <?php $bgImage = $cleanImages[0]; ?>
           <div class="cover" style="background-image:url('<?php echo $bgImage; ?>');">
           		<span class="price"><?php the_field('car_pyyntihinta'); ?> €</span>
           </div>
        </a>

        <?php // Text content ?>
		<div class="text">
			<p class="model">
				<a target="_blank" href="<?php echo get_the_permalink(); ?>" data-id="<?php echo $id; ?>">
					<?php if (get_field('car_merkki')) : ?>
						<span><?php echo the_field('car_merkki'); ?></span> 
					<?php endif; ?>
					<?php if (get_field('car_malli')) : ?>
						<span><?php the_field('car_malli'); ?></span>
						<span class="year"> | <?php the_field('car_vuosimalli'); ?></span>
						<br><br>
					<?php endif; ?>
				</a>
				<?php if (get_field('car_mallitarkenne')) : ?>
					<span class="definition"><?php echo the_field('car_mallitarkenne'); ?></span>
				<?php endif; ?>
			</p>

			<hr>
			
	   		<div class="specs">
		   		<div class="spec">
		   			<?php include( locate_template( 'icons/inline-wheel.php', false, false ) ); ?>
	              	<span>
	              		<?php if (get_field('car_km')) { ?>
	              		<?php the_field('car_km'); ?> km
	              	<?php } else { ?>
	              		-
	              	<?php } ?>
	              	</span>
	            </div>
              	<div class="spec">
              		<?php include( locate_template( 'icons/inline-fuel.php', false, false ) ); ?>
	              	<span>
	              		<?php if (get_field('car_polttoaine')) { ?>
	              		<?php the_field('car_polttoaine'); ?>
	              	<?php } else { ?>
	              		-
	              	<?php } ?>
	              	</span>
              	</div>
              	<div class="spec">
              		<?php include( locate_template( 'icons/inline-transmission.php', false, false ) ); ?>
	              	<span>
	              		<?php if (get_field('car_vaihteisto')) { ?>
	              		<?php the_field('car_vaihteisto'); ?>
	              	<?php } else { ?>
	              		-
	              	<?php } ?>
	              	</span>
              	</div>
              	<div class="spec">
              		<?php include( locate_template( 'icons/inline-location.php', false, false ) ); ?>
	              	<span>
	              		<?php if (get_field('car_sijainti')) { ?>
	              		<?php the_field('car_sijainti'); ?>
	              	<?php } else { ?>
	              		-
	              	<?php } ?>
	              	</span>
             	</div>
           </div>
	   	</div>

        <?php // Cta and Price ?>

        <div class="call">
        	<div class="phonelink-wrap">
	        	<a class="phonelink" href="http://wa.link/th3gv8"><i class="fab fa-whatsapp"></i></a>
	        </div>
        	<?php // echo do_shortcode('[whatsapp phone="358505864479"]Lähetä WhatsApp-viesti[/whatsapp]'); ?> 
        	<div class="phonelink-wrap">
	        	<a class="phonelink" href="tel:+358505864479"><i class="fas fa-phone-volume"></i></a>
	        </div>
        </div>

	   	<div class="read-more">
           <a target="_blank" class="cta" href="<?php echo get_the_permalink(); ?>"><span><?php echo __('Lue lisää'); ?></span></a>
	   	</div>

   	</div>
</div>
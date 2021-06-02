<?php
/**
 * The template for cars JSON feed
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); 
?>

<?php $id = get_the_ID(); ?>

<?php  
	function getField($field) {
		if (get_field($field)) {
			return get_field($field);
		} else {
			return '-';
		}
	}
?>

<section class="single-car">
	<div class="single-car-content">

		<!--<div class="car-section">
			<a class="car-back-to" href="/vaihtoautot"><< <?php echo __('Takaisin listaukseen'); ?></a>
		</div>-->

		<!--
		<div class="car-section car-split-section">
			<div class="split-section left-section">
				<div class="car-slider">
					<?php 
						$images = get_field('car_kuvat'); 

						// Get array of original images
						$images = json_decode($images);
						$cleanImages = array();
						foreach ($images as $image) {
							$image = json_decode(json_encode($image), true);
							$cleanImages[] = $image['orig'];
						}
						foreach ($cleanImages as $img) {
					?>
							<div>
								<div class="inner" style="background-image:url(<?php echo $img; ?>);">
									<a class="lightbox" data-fancybox="gallery" href="<?php echo $img; ?>"></a>
								</div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
			<div class="split-section right-section">
				<div class="car-ingress">

					<h2>
						<?php if (get_field('car_merkki')) : ?>
							<span><?php echo the_field('car_merkki'); ?></span> 
						<?php endif; ?>
						<?php if (get_field('car_malli')) : ?>
							<span><?php the_field('car_malli'); ?>, <?php the_field('car_vuosimalli'); ?></span>
						<?php endif; ?>
					</h2>

					<?php if (get_field('car_mallitarkenne')) : ?>
						<h3><?php echo the_field('car_mallitarkenne'); ?></h3>
					<?php endif; ?>



					<?php if (get_field('car_pyyntihinta')) : ?>
						<h3 class="price"><?php echo the_field('car_pyyntihinta'); ?> €</h3>
					<?php endif; ?>		

	

					<div class="car-cta">			
		
			        	<div class="links">
							<a href="https://wa.me/0505864479"><i class="fab fa-whatsapp"></i> +358 50 5864479 </a>
				        	<a href="tel:+358505864479"><i class="fas fa-phone-volume"></i> +358 50 5864479</a>
				        	<a href="mailto:myynti@autox.fi"><i class="fas fa-envelope"></i> myynti@autox.fi</a>
			        	</div>
										
						<a target="_blank" class="contact-link" href="/yhteydenotto"><?php echo __('Kaikki yhteystietomme'); ?></a>
					</div>

				</div>
			</div>
		</div>
		-->		

		<div class="car-section nomargin">
			<div class="car-slider">
				<?php 
					$images = get_field('car_kuvat'); 

					// Get array of original images
					$images = json_decode($images);
					$cleanImages = array();
					foreach ($images as $image) {
						$image = json_decode(json_encode($image), true);
						$cleanImages[] = $image['orig'];
					}
					foreach ($cleanImages as $img) {
				?>
						<div>
							<div class="inner" style="background-image:url(<?php echo $img; ?>);">
								<a class="lightbox" data-fancybox="gallery" href="<?php echo $img; ?>"></a>
							</div>
						</div>
				<?php
					}
				?> 
			</div> 
		</div>

		<div class="car-section">
			<div class="car-ingress">
				<h2>
					<?php if (get_field('car_merkki')) : ?>
						<span><?php echo the_field('car_merkki'); ?></span> 
					<?php endif; ?>
					<?php if (get_field('car_malli')) : ?>
						<span><?php the_field('car_malli'); ?>, <?php the_field('car_vuosimalli'); ?></span>
					<?php endif; ?>
				</h2>

				<?php if (get_field('car_mallitarkenne')) : ?>
					<h3><?php echo the_field('car_mallitarkenne'); ?></h3>
				<?php endif; ?>



				<?php if (get_field('car_pyyntihinta')) : ?>
					<h3 class="price"><?php echo the_field('car_pyyntihinta'); ?> €</h3>
				<?php endif; ?>		
			</div>
		</div>

		<table class="car-section car-table">
			<thead>
				<tr>
					<th colspan="2"><?php echo __('Perustiedot'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo __('Merkki'); ?></td>
					<td><?php echo getField('car_merkki'); ?></td>
				</tr>				
				<tr>
					<td><?php echo __('Malli'); ?></td>
					<td><?php echo getField('car_malli'); ?></td>
				</tr>				
				<tr>
					<td><?php echo __('Korimalli'); ?></td>
					<td><?php echo getField('car_korimalli'); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Ajoneuvotyyppi'); ?></td>
					<td><?php echo getField('car_ajoneuvolaji'); ?></td>
				</tr>					
				<tr>
					<td><?php echo __('Mittarilukema'); ?></td>
					<td><?php echo getField('car_km'); ?> km</td>
				</tr>		
				<tr>
					<td><?php echo __('Katsastettu'); ?></td>
					<td><?php echo getField('car_viimeinen_katsastus'); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Rekisterinumero'); ?></td>
					<td><?php echo getField('car_rekisteritunnus'); ?></td>
				</tr>												
				<tr>
					<td><?php echo __('Käyttövoima'); ?></td>
					<td><?php echo getField('car_polttoaine'); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Vaihteisto'); ?></td>
					<td><?php echo getField('car_vaihteisto'); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Vetotapa'); ?></td>
					<td><?php echo getField('car_vetotapa'); ?></td>
				</tr>							
				<tr>
					<td><?php echo __('Väri'); ?></td>
					<td><?php echo getField('car_vari'); ?></td>
				</tr>	
				<tr>
					<td><?php echo __('Värityyppi'); ?></td>
					<td><?php echo getField('car_varityyppi'); ?></td>
				</tr>				
				<tr>
					<td><?php echo __('Henkilömäärä'); ?></td>
					<td><?php echo getField('car_henkilomaara'); ?></td>
				</tr>
				<tr>
					<td><?php echo __('Ovien määrä'); ?></td>
					<td><?php echo getField('car_ovet'); ?></td>
				</tr>	
				<tr>
					<td><?php echo __('Sijainti'); ?></td>
					<td><?php echo getField('car_sijainti'); ?></td>
				</tr>																											
			</tbody>
		</table>

		<table class="car-section car-table car-table-specs">
			<thead>
				<tr>
					<th colspan="2"><?php echo __('Tekniset tiedot'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo __('Keskikulutus'); ?></td>
					<td><?php echo getField('car_keskikulutus'); ?> l</td>
				</tr>
				<tr>
					<td><?php echo __('Teho'); ?></td>
					<td><?php echo getField('car_teho'); ?> kW</td>
				</tr>
				<tr>
					<td><?php echo __('Moottorin tilavuus'); ?></td>
					<td><?php echo getField('car_moottoritilavuus'); ?> cm3</td>
				</tr>
				<tr>
					<td><?php echo __('Omamassa'); ?></td>
					<td><?php echo getField('car_weight'); ?> kg</td>
				</tr>	
				<tr>
					<td><?php echo __('Kokonaismassa'); ?></td>
					<td><?php echo getField('car_total_weight'); ?> kg</td>
				</tr>					
				<tr>
					<td><?php echo __('CO2-päästöt'); ?></td>
					<td><?php echo getField('car_co2'); ?> g/km</td>
				</tr>					
				<tr>
					<td><?php echo __('Päästöluokka'); ?></td>
					<td><?php echo getField('car_paastoluokka'); ?></td>
				</tr>														
			</tbody>
		</table>		

		<div class="car-section">

			<?php if (get_field('car_varusteet')) : ?>
				<span><strong><?php echo __('Varusteet'); ?></strong></span>
				<p class="car-features"><?php echo the_field('car_varusteet'); ?></p>
			<?php endif; ?>		

		</div>

		<div class="car-section">

			<?php if (get_field('car_lisavarusteet')) : ?>
				<span><strong><?php echo __('Lisävarusteet'); ?></strong></span>
				<p class="car-features"><?php echo the_field('car_lisavarusteet'); ?></p>
			<?php endif; ?>					

		</div>

	</div>
</section>

<script>
	jQuery(document).ready(function($) {

		// Initialize slider
		$('.car-slider').slick({
			infinite: false,
			prevArrow: '<button type="button" class="slick-prev"><</button>',
			nextArrow: '<button type="button" class="slick-next">></button>'
		});

		// Prevent text overflow from missing spaces after commas
		$('.car-features').each(function() {
			var string = $(this).text();
			$(this).text(string.replace(/,/g, ", "));
		});
	}); 
</script>

<?php echo do_shortcode('[elementor-template id="1988"]'); ?>

<?php
get_footer();
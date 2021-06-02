<?php
// Antti 2.6.21
// added api key check
	// here we get api_key
	$api = get_option('autosofta_json_plugin_options');
	$api_key = $api['api_key'];
/* Template Name: Vaihtoautot */
/**
 * The template for cars JSON feed
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); 
?>

<?php
	// Show the selected page content
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	endif;
?>

<section id="carslist" class="carslist">

	<!--<h2 class="listing-title"><?php echo __('Vaihtoautot'); ?></h2>-->

	<div class="car-listing">

		<?php /* Alm filters */ 



		?>
		<?php include( locate_template( 'carlisting/filters.php', false, false ) ); ?>

		<?php
			/** 
			 * Alm listing 
			 */
			echo do_shortcode('[ajax_load_more 
			    id="alm-cars" 
			    repeater="template_41" 
			    container_type="div" 
			    post_type="vaihtoauto" 
			    posts_per_page="12" 
			    scroll="false" 
			    meta_key="car_pyyntihinta"
			    button_label="'.__("Lataa lisää").'" 
			    button_loading_label="'.__("Ladataan").'" 
			    no_results_text="'.__("Pahoittelut, ei tuloksia valituilla hakuehdoilla.").'" 
			    filters="true" 
			    filters_url="false" 
			]'); 
		?>

		<?php  
			/**
			 * Initialize curl
			 */
			$ch     = curl_init();
			$urlKey = "https://www.autosofta.fi/autosofta/portals/ajoneuvontiedot.php?c=". $api_key ."&lt=1&vtieto=2";

			curl_setopt($ch, CURLOPT_URL, $urlKey);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			$headers = array();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			// Result
			$result = curl_exec($ch);
			$json   = json_decode(utf8_encode($result), true);

			// Error handling
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$info = curl_getinfo($ch);

			if (curl_errno($ch)) {
				// debug
			    // echo '<p>Error:' . curl_error($ch) . '</p>';
			} else {

				// All good, get curl template
				if ($http_code == 200) {
					include( locate_template( 'carlisting/carlist.php', false, false ) );
				} else {
					// error 
				}	
			}
			curl_close($ch);					
		?>	
	</div>
</section>

<script>
	var $ = jQuery;

	$(document).ready(function() {

		var opts = $(".alm-filters .model select option");

		// Disable model select initially
		$(".alm-filters .model select").prop('disabled', true);

		$(".alm-filters .model select option").each(function() {
			$(this).attr('data-text', $(this).text());
		});

		// Show correct models when selecting a brand
		$('.alm-filters .brand select').on('change', function() {

			$(".alm-filters .model select").append(opts);

			var selectValue = this.value;

			if (selectValue != '#' && selectValue != undefined) {

				$(".alm-filters .model select").prop('disabled', false);

				$(".alm-filters .model select option").each(function() {

					$(this).text($(this).data('text'));

					if ($(this).text().indexOf(selectValue)) {
						if ($(this).val() != '#') {
							$(this).remove();
						}
					} else {
					    $(this).text($(this).text().replace(selectValue, ""));			
					}				
				});
			} else { 
				$(".alm-filters .model select").prop('disabled', true);
			}

			// Reset the model select
			$(".alm-filters .model select").val($(".alm-filters .model select option:first").val());
		});


		// Show filters button
		$('#show-filters').click(function(event) {
			event.preventDefault();
			$(this).hide();
			$('.filter-section').fadeIn();
		});

		// Reset filtes button
		$('#clear-filters').click(function(event) {
			event.preventDefault();
			almfilters.reset();
		});

		// Show reset filters button only when filters selected
		window.almFiltersActive = function(obj){
			// console.log(obj); 

			if (obj.length != 0) {
				$('#clear-filters').css('display', 'table');
			} else {
				$('#clear-filters').hide();
			}
		}

	});
</script>

<?php
get_footer();
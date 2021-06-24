<?php
/**
 * show or hide sliders and
 * Generate alm filters
 */
$options = get_option( 'autosofta_json_options_mileage' );
$mileage = esc_attr( $options );
if ($mileage == '1') $sliders = array(
array(
    "key" =>  "meta",
    "field_type" => "range_slider",
    "classes"      => "year",
    "meta_key" =>  "car_vuosimalli",
    "meta_operator" => "BETWEEN",
    "meta_type" =>  "NUMERIC",
    "label" => __('Vuosimalli'),
    "rangeslider_min" => $yearMin,
    "rangeslider_max" => $yearMax,
    "rangeslider_steps" => "1", 
    "rangeslider_start" => $yearMin,
    "rangeslider_end" =>  $yearMax,
    "rangeslider_decimals" => "false"
),                  

array(
    "key" =>  "meta",
    "field_type" => "range_slider",
    "classes"      => "km",
    "meta_key" =>  "car_km",
    "meta_operator" =>  "BETWEEN",
    "meta_type" =>  "NUMERIC",
    "label" => __('Mittarilukema'),
    "rangeslider_min" => $kmMin,
    "rangeslider_max" => $kmMax,
    "rangeslider_steps" => "10000",
    "rangeslider_start" => $kmMin,
    "rangeslider_end" =>  $kmMax,
    "rangeslider_decimals" => "false"
));      
?>

<a href="#/" id="show-filters"><?php _e('Näytä hakuehdot'); ?></a>

<div class="filter-section">

<?php  
    /** 
     * Alm filter values
     */
    function createAcfFilter($field) {
        if (!empty($field)) {
            $values = explode(',', get_field($field));
            $valueFilter = array();
            foreach ($values as $value) {
                $valueArr = array(
                    "label" => $value,
                    "value" => $value
                );
                $valueFilter[] = $valueArr;
            }
            sort($valueFilter);
            return $valueFilter;
        }
    }

    /**
     * Default filter values
     */
    $brandFilter        = createAcfFilter('carfilter_merkki');
    $bodyFilter         = createAcfFilter('carfilter_korimalli');
    $fuelFilter         = createAcfFilter('carfilter_polttoaine');
    $wheeldriveFilter   = createAcfFilter('carfilter_vetotapa');
    $transmissionFilter = createAcfFilter('carfilter_vaihteisto');

    /**
     * Special cases
     */
    $kilometers = explode(',', get_field('carfilter_km'));
    $kmMin = 0;
    $kmMax = round(max($kilometers),-4) + 10000;

    $years = explode(',', get_field('carfilter_vuosimalli'));
    $yearMin = (int)min($years) - 1;
    // $yearMax = max($years);      
    $curYear = date('Y');
    $yearMax = (int)$curYear;   

    $modelFilter = array();
    $field = 'carfilter_malli'; 
    if (!empty($field)) {
        $values = explode(',', get_field($field));
        $valueFilter = array();
        foreach ($values as $value) {
            $label = str_replace('/:/', ' ', $value);
            $option = str_replace('/:/', '', strstr($value, '/:/'));
            $valueArr = array(
                "label" => $label,
                "value" => $option
            );
            $valueFilter[] = $valueArr;
        }
        sort($valueFilter);
        $modelFilter = $valueFilter;
    }

    /** 
     * Alm filter
     */
    $filter_array = array(
        "id"            => "cars",
        "style"         => "change",     
        "reset_button"  => false,                
        "date_created"  => 1603988670,
        "date_modified" => 1603989773,
        "filters"       => array(       

            /*
            array(
                "key"          => "search",
                "field_type"   => "text",
                "placeholder"  => __('Hae kohteita'),
                "classes"      => "search",
                "button_label" => __('Hae')
            ),
            */

            // Dropdowns                         

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_merkki",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "classes" => "brand",
                "label" => __('Merkki'),
                "values" => $brandFilter
            ),

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_malli",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "classes" => "model",
                "label" => __('Malli'),
                "values" => $modelFilter
            ),

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_korimalli",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "label" => __('Korimalli'),
                "values" => $bodyFilter
            ),

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_polttoaine",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "label" => __('Polttoaine'),
                "values" => $fuelFilter
            ),

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_vetotapa",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "label" => __('Vetotapa'),
                "values" => $wheeldriveFilter
            ),

            array(
                "key" => "meta",
                "field_type" => "select",
                "meta_key" => "car_vaihteisto",
                "meta_operator" => "IN",
                "meta_type" => "CHAR",
                "label" => __('Vaihteisto'),
                "values" => $transmissionFilter
            ),       

            // Break row

            array(
                "key"          => "",
                "field_type"   => "",
                "placeholder"  => "",
                "classes"      => "clear",
                "button_label" => ""
            ),       

            // Range sliders

          $sliders[0],
          $sliders[1],                        

            // Ordering 

            array(
                "key" => "order",
                "field_type" => "radio",
                "values" =>  array(
                    array(
                        "label" => "Laskeva",
                        "value" => "DESC"
                    ),                              
                    array(
                        "label" => "Nouseva",
                        "value" => "ASC"
                    )
                ),
                "title" => __('Järjestys'),
                "classes" => "order",
                "selected_value" => "DESC",
                "default_value" => "DESC"
            ),

            array(
                "key" => "orderby",
                "field_type" => "radio",
                "values" => array(
                    array(
                        "label" => __('Päivämäärä'),
                        "value" => "date"
                    ),
                    array(
                        "label" => __('Hinta'),
                        "value" => "menu_order",
                    )
                ),
                "classes" => "orderby",
                "selected_value" => "date",
                "default_value" => "date"
            ),

        )
    );

    echo alm_filters($filter_array, 'alm-cars');
?>

<a href="#/" id="clear-filters"><?php _e('Tyhjennä hakuehdot'); ?></a>

</div><!-- /.filter-section -->
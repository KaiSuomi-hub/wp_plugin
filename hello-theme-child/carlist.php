n<?php
/**
 * Generate a listing of cats
 *
 * $json = result variable
 */

// Filter vars

$curPage = get_the_ID();

/**
 * Loop through JSON data
 */
foreach ($json as $key => $v) {

    /*==================================*/
    /* Add ACF filter values to database
    /* Continues after the foreach
    /*==================================*/

    $brands[] = $v['merkki'];
    $models[] = $v['merkki'] . '/:/' . $v['malli'];
    $bodys[] = $v['korimalli'];
    $fuels[] = $v['polttoaine'];
    $years[] = $v['vuosimalli'];
    $wheeldrives[] = $v['vetotapa'];
    $kilometers[] = $v['km'];
    $transmissions[] = $v['vaihteisto'];

    /*==================================*/
    /* Add post objects to database
    /*==================================*/

    // Vars
    $id = $v['id'];
    $ids[] = $id;
    $modified = get_the_modified_date('Ymd', $id);
    $selldate = $v['myyntipvm'];

    // Format API object data time for comparison
    $time = $v['last_update'];
    $time = substr($time, 0, strpos($time, " "));
    $time = str_replace('-', '', $time);

    $time     = intval($time);
    $modified = intval($modified);

    // Generate meta fields for meta_input post data
    $meta_fields = array(
        'car_id' => $id,
        'car_rekisteritunnus' => $v['rekisteritunnus'],
        'car_kuva' => $v['kuva'],
        'car_kuvat' => $v['kuvat'],
        'car_merkki' => $v['merkki'],
        'car_malli' => $v['malli'],
        'car_alusta' => $v['alusta'],
        'car_mallitarkenne' => $v['mallitarkenne'],
        'car_varusteet' => $v['varusteet'],
        'car_lisavarusteet' => $v['lisavarusteet'],
        'car_ty' => $v['ty'],
        'car_vuosimalli' => $v['vuosimalli'],
        'car_km' => $v['km'],
        'car_pyyntihinta' => $v['pyyntihinta'],
        'car_toimituskulut' => $v['toimituskulut'],
        'car_kaytetty' => $v['kaytetty'],
        'car_ajoneuvolaji' => $v['ajoneuvolaji'],
        'car_sijainti' => $v['sijainti'],
        'car_polttoaine' => $v['polttoaine'],
        'car_kuukausiera' => $v['kuukausiera'],
        'car_todellinen_vuosikorko' => $v['todellinen_vuosikorko'],
        'car_ostopaiva' => $v['ostopaiva'],
        'car_kuvia' => $v['kuvia'],
        'car_info' => $v['info'],
        'car_ilmoitusteksti' => $v['ilmoitusteksti'],
        'car_sis_alv' => $v['sis_alv'],
        'car_alv_pro' => $v['alv_pro'],
        'car_nettisivun_nosto1' => $v['nettisivun_nosto1'],
        'car_nettisivun_nosto2' => $v['nettisivun_nosto2'],
        'car_panorama_url' => $v['panorama_url'],
        'car_video_url' => $v['video_url'],
        'car_portaali' => $v['portaali'],
        'car_ajokortti' => $v['ajokortti'],
        'car_viimeinen_katsastus' => $v['viimeinen_katsastus'],
        'car_moottoritilavuus' => $v['moottoritilavuus'],
        'car_vetotapa' => $v['vetotapa'],
        'car_vaihteisto' => $v['vaihteisto'],
        'car_last_update' => $v['last_update'],
        'car_kayttoonottopaiva' => $v['kayttoonottopaiva'],
        'car_myyntipvm' => $v['myyntipvm'],
        'car_vari' => $v['vari'],  
        'car_varityyppi' => $v['varityyppi'],
        'car_teho' => $v['teho'], 
        'car_co2' => $v['co2'],
        'car_paastoluokka' => $v['paastoluokka'], 
        'car_keskikulutus' => $v['keskikulutus'],
        'car_henkilomaara' => $v['henkilomaara'],   
        'car_ovet' => $v['ovet'],    
        'car_weight' => $v['weight'],   
        'car_total_weight' => $v['total_weight'],
        'car_width' => $v['width'],   
        'car_height' => $v['height'],    
        'car_length' => $v['length'],   
        'car_makuupaikat' => $v['makuupaikat'],
        'car_nopeusrajoitus' => $v['nopeusrajoitus'],   
        'car_korimalli' => $v['korimalli'],    
        'car_varastotieto' => $v['varastotieto'],                                                           
    );

    // Post object array for wp_insert_post();
    $car_post = array(
        'import_id'     => $id,      
        'post_title'    => wp_strip_all_tags($v['merkki'] . ' ' . $v['malli']),
        'post_name'     => wp_strip_all_tags($id . '-' . $v['merkki']),
        'post_content'  => '',
        'post_type'     => 'vaihtoauto',
        'post_status'   => 'publish',
        'menu_order'    => $v['pyyntihinta'],
        'meta_input'    => $meta_fields,
    );

    // Post object array for wp_update_post();
    $car_update = array(
        'ID'            => $id,
        'post_title'    => wp_strip_all_tags($v['merkki'] . ' ' . $v['malli']),
        'post_name'     => wp_strip_all_tags($id . '-' . $v['merkki']),
        'post_content'  => '',
        'post_type'     => 'vaihtoauto',
        'post_status'   => 'publish',
        'menu_order'    => $v['pyyntihinta'],
        'meta_input'    => $meta_fields,
    );

    // wp_update_post($car_update); 

    /**
     * Pre query check
     * Check if we have any new objects not saved
     * in database or any existing ones have changed
     */
    if (!get_post_status($id) || ($time && $time > $modified)) {

        // Create a new post
        if (!get_post_status($id)) { 

            // Insert the new post to the database
            if ($selldate == '0000-00-00') {
                wp_insert_post($car_post);
            }

        // Update existing post
        } else { 

            // Compare single API object modified time to post modified time
            if ($time && $time > $modified) {

                // Check if car is not sold
                if ($selldate == '0000-00-00') {

                    // Update the post data
                    // wp_update_post($car_update);

                } else {

                    // Set post as draft if it has been sold 
                    /* wp_update_post(array(
                        'ID' => $id,
                        'post_status' => 'draft'
                    )); */

                    // Delete post
                    wp_delete_post($id);         
               
                }
            }
        }
    }

    // Update the post data
    if (get_post_status($id)) { 
        wp_update_post($car_update);
    }

} // foreach

/*==================================*/
/* Check for missing ids and delete 
/* those posts
/*==================================*/

$all_post_ids = get_posts(array(
    'fields'          => 'ids',
    'posts_per_page'  => -1,
    'post_type' => 'vaihtoauto'
));

if (!empty($ids)) {
    foreach ($all_post_ids as $id) {
        if (!in_array($id, $ids)) {
            // Delete post
            wp_delete_post($id);           
        }
    }    
}

/*==================================*/
/* Add ACF filter values to database
/*==================================*/

function saveAcfFilter($value, $field, $page) {
    if (!empty($value)) {
        $value = implode(',', array_unique($value));
        if ($value != get_field($field, $page)) {
            update_field($field, $value, $page);
        }        
    }
}

function saveAcfFilterMinMax($value, $field, $page) {
    if (!empty($value)) {
        $vals = array();
        foreach ($value as $val) {
            if ($val != '') {
                $vals[] = $val;
            }
        }
        $minMax = array();
        $minMax[] = min($vals);
        $minMax[] = max($vals);
        $minMax = implode(',', $minMax);
        if ($minMax != get_field($field, $page)) {
            update_field($field, $minMax, $page);
        }        
    }
}

saveAcfFilter($brands, 'carfilter_merkki', $curPage);
saveAcfFilter($models, 'carfilter_malli', $curPage);
saveAcfFilter($bodys, 'carfilter_korimalli', $curPage);
saveAcfFilter($fuels, 'carfilter_polttoaine', $curPage);
saveAcfFilter($wheeldrives, 'carfilter_vetotapa', $curPage);
saveAcfFilter($transmissions, 'carfilter_vaihteisto', $curPage);

saveAcfFilterMinMax($years, 'carfilter_vuosimalli', $curPage);
saveAcfFilterMinMax($kilometers, 'carfilter_km', $curPage);

?>
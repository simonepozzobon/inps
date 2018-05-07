<?php
function cineteca_inail_subfield( $where ) {
    
    $where = substr($where, 0,-1);

    $valori = explode("'%", $where);
    
    $where = str_replace("'%".$valori[1], "", $where);

    $valori[1] = str_replace("%' )", "", $valori[1]);
    $keywords = explode(" ", $valori[1]); 


    $where = str_replace("( wp_postmeta.meta_key = 'parole_chiave' AND CAST(wp_postmeta.meta_value AS CHAR) LIKE", " ( wp_postmeta.meta_key = 'parole_chiave' AND CAST(wp_postmeta.meta_value AS CHAR) LIKE '%".$keywords[0]."%')", $where);
    
    for ($i=1; $i < count($keywords); $i++) { 
        $where = $where." OR  ( wp_postmeta.meta_key = 'parole_chiave' AND CAST(wp_postmeta.meta_value AS CHAR) LIKE '%".$keywords[$i]."%' )";
    }

    $where = $where.")";

    return $where;
}

function cineteca_inail_query_builder($titolo,$tipologia,$genere,$nazionalita,$regia,$cast,$keyword,$eta,$annoProd){
  
    if($keyword != NULL)
        if (count($keyword)>1)
            add_filter('posts_where', 'cineteca_inail_subfield');

    $args = array();

    $args["post_type"] = 'film';
    $args["posts_per_page"] = -1;
    $args["meta_query"] = array(); //Creo lo spazio per la meta query

    $nrParam = cineteca_inail_countparam($titolo,$tipologia,$genere,$nazionalita,$regia,$cast,$keyword,$eta,$annoProd);
    
    global $wpdb;
    
    $postIds = -1;
    if($keyword != null){
        $whereResult = "";
        $primo = 1;
        foreach ($keyword as $key) {
            if($primo){
                $whereResult.="WHERE meta_value LIKE '%".$key."%'";
                $primo = 0;
            }else
                $whereResult.=" AND meta_value LIKE '%".$key."%'";
        }

        $query="SELECT post_id
                FROM $wpdb->postmeta ".$whereResult;
        $postIds = $wpdb->get_col($query);
    }

    if($titolo != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT ID
                        FROM $wpdb->posts
                        WHERE ID IN (".implode(", ", $postIds).")";
                $query.= " AND post_title LIKE '%".$titolo."%'";
            }
        }else{
            $query="SELECT ID
                    FROM $wpdb->posts
                    WHERE post_title LIKE '%".$titolo."%'";
        }
    
        $postIds = $wpdb->get_col($query);
    }

    if($tipologia != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '%".$tipologia."%'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '%".$tipologia."%'";
        }

        $postIds = $wpdb->get_col($query);
    }

    if($genere != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '%".$genere."%'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '%".$genere."%'";
        }
        
        $postIds = $wpdb->get_col($query);
    }

    if($nazionalita != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '%".$nazionalita."%'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '%".$nazionalita."%'";
        }
    
        $postIds = $wpdb->get_col($query);
    }

    if($regia != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '%".$regia."%'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '%".$regia."%'";
        }
    
        $postIds = $wpdb->get_col($query);
    }

    if($cast != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '%".$cast."%'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '%".$cast."%'";
        }
    
        $postIds = $wpdb->get_col($query);
    }

    if($eta != NULL){
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value LIKE '".$eta."'";
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value LIKE '".$eta."'";
        }
    
        $postIds = $wpdb->get_col($query);
    }

    if($annoProd != NULL){
        $arrayAnni = explode(" - ", $annoProd);
        if($postIds != -1){
            if(count($postIds) != 0){
                $query="SELECT post_id
                        FROM $wpdb->postmeta
                        WHERE post_id IN (".implode(", ", $postIds).")";
                $query.= " AND meta_value BETWEEN ".$arrayAnni[0]." AND ".$arrayAnni[1];
            }
        }else{
            $query="SELECT post_id
                    FROM $wpdb->postmeta
                    WHERE meta_value BETWEEN ".$arrayAnni[0]. " AND ".$arrayAnni[1];
        }
    
        $postIds = $wpdb->get_col($query);
    }
   
    if(count($postIds) != 0  && $postIds != -1)
        $args["post__in"] = $postIds;
    elseif ($postIds != -1) { //Abbiamo trovato 0 id con i parametri cercati, ritorno i wp_query vuoto
        $args["post__in"] = array("-1");
    }
        
    return new WP_Query( $args );
}

function cineteca_inail_query_all_films(){
 
 		if (DEBUG)
			echo "query all films";

 		return new WP_Query( array( "post_type"=>"film", "posts_per_page" => -1 ));
}

function cineteca_inail_join_wp_postmeta_to_from($join){

    global $wp_query, $wpdb;

    if (!empty($wp_query->get['parole_chiave'])) {
        $join .= "LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";
    }
    echo "<br> Join clause: ".$join."<br>";
    return $join;
}

function cineteca_inail_search_keywords($where, &$wp_query){
    global $wpdb;

    if ( $search_term = $wp_query->get( 'parole_chiave' ) ) {
        foreach ($search_term as $keyword) {
            $where .=" AND ".$wpdb->postmeta.".meta_value LIKE '%".$wpdb->esc_like( like_escape( $keyword ) ) ."%'";
        }
    }
    if(DEBUG)
        echo "<br>Where clause: ".$where."<br>"; 

    return $where;
}

function cineteca_inail_countparam($titolo,$tipologia,$genere,$nazionalita,$regia,$cast,$keyword,$eta,$annoProd){
    $tot = 0;
    if($titolo != NULL)
        $tot++;
    if($tipologia != NULL)
        $tot++;
    if($genere != NULL)
        $tot++;
    if($nazionalita != NULL)
        $tot++;
    if($regia != NULL)
        $tot++;
    if($cast != NULL)
        $tot++;
    if($keyword != NULL)
        $tot++;
    if($eta!= NULL)
        $tot++;
    if($annoProd != NULL)
        $tot++;
    return $tot;
}

function cineteca_inail_query_get_option_guid_search(){
    // WP_Query arguments
    $fields = array();
    $field = NULL;

    cineteca_inail_query_get_country();

    //$decennio_produzione = cineteca_inail_query_get_decades(); 
    
    $field = get_field_object("field_55032b57bde9c");
    $fields["anni_studenti"] = $field["choices"];
    
    $field = get_field_object("field_55032b61bde9d");
    $fields["tematiche"]  = $field["choices"];
    
    
    $fields["nazionalita"]  = cineteca_inail_query_get_country();
    
    $fields["anno_produzione"]  = cineteca_inail_query_get_decades();
    
    $field= get_field_object("field_55032a6ebde94");
    $fields["tipologia"]  = $field["choices"];
    
    $field= get_field_object("field_55032ac7bde95");
    $fields["genere"]  = $field["choices"];
    

    return $fields;
}

function cineteca_inail_query_get_option_free_search(){

    $fields["anno_produzione"]  = cineteca_inail_query_get_decades();

    $field= get_field_object("field_55032a6ebde94");
    $fields["tipologia"]  = $field["choices"];

    $field= get_field_object("field_55032ac7bde95");
    $fields["genere"]  = $field["choices"];

    $field = get_field_object("field_55032b57bde9c");
    $fields["anni_studenti"] = $field["choices"];

    $field = get_field_object("field_55032b61bde9d");
    $fields["tematiche"]  = $field["choices"];

    return $fields;
}


function cineteca_inail_query_get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) )
        return;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $r;
}

function cineteca_inail_query_get_decades(){
    $anno_produzione = cineteca_inail_query_get_meta_values("anno_di_produzione","film");
    sort($anno_produzione);
    $soglia = 1920;
    $decenni = array();
    array_push($decenni, "1895 - 1919");
    $nuovasoglia = false;
    foreach($anno_produzione as $produzione){
        while($produzione>($soglia+10)){
            $soglia = $soglia + 10;
            $nuovasoglia = true;
        }
        if($nuovasoglia){
            $decennio = $soglia." - ";
            $decennio.= ($soglia + 9);
            array_push($decenni, $decennio);
            $nuovasoglia = false;
        }
    }

    return $decenni;
}

function cineteca_inail_query_get_country(){
    $nazionalita = cineteca_inail_query_get_meta_values("nazionalità","film");

    $nazionalita = array_map('strtolower',$nazionalita);
    $nazionalita = array_map('ucfirst',$nazionalita);
    $nazionalita = array_unique($nazionalita);

    return $nazionalita;
}

function cineteca_inail_get_film_info_from_id($id){
    return get_post_meta( $id );
}

?>

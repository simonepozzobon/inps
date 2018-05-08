<?php

add_action( 'personal_options_update', 'cineteca_inail_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'cineteca_inail_save_extra_user_profile_fields' );
function cineteca_inail_save_extra_user_profile_fields( $user_id ) {
  $saved = false;
  echo "entrato";
  if ( current_user_can( 'edit_user', $user_id ) ) {
    echo "modifico";
    //update_user_meta( $user_id, 'ambito_lavorativo', $_POST['ambito-lavorativo'] );
    update_field( 'ambito_lavorativo', $_POST['ambito-lavorativo'], $user_id );
    $saved = true;
  }
  return true;
}
?>

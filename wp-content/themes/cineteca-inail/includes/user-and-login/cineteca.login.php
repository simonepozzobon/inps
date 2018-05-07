<?php
function cineteca_add_lost_password_link() {
	return '<a href="/wp-login.php?action=lostpassword" class="bb-forgot-password" title="Password dimenticata">hai dimenticato la password?</a>';
}
add_action( 'login_form_middle', 'cineteca_add_lost_password_link' );

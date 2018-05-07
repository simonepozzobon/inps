<?php

  /*
   * Disables the admin bar for logged-in users
   */
  add_filter( 'show_admin_bar', '__return_false' );
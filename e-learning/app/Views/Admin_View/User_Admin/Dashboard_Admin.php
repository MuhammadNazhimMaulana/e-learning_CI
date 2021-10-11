<?php
//  echo get_cookie("username_admin");

$session = session();

echo $session->get('remember');
?>
<!DOCTYPE html>
<html>
  <head>
	<title></title>
  	<link rel="stylesheet" href="main.css" type="text/css" />
  </head>
  <body>
<?php
  require_once 'functions.php';

  print_header();

  if_logged_add_tournament();

  list_tournaments();

  print_footer();

?>
  </body>
</html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="main.css" />
  </head>
  <body>
<?php
  require_once 'bracket.php';
  require_once 'functions.php';
  require_once 'db_conn.php';

  session_start();

  if(isset($_POST['submit'])) {
  	$tournament_name = mysql_real_escape_string($_POST['tournament_name']);
  	$sport_game = mysql_real_escape_string($_POST['sport_game']);
  	$tournament_type = mysql_real_escape_string($_POST['tournament_type']);
  	$number_of_participants = mysql_real_escape_string($_POST['number_of_participants']);
    $start_time = mysql_real_escape_string($_POST['start_time']);
  	$description = mysql_real_escape_string($_POST['description']);

  	$_SESSION['tournament_name'] = $tournament_name;
  	$_SESSION['sport_game'] = $sport_game;
  	$_SESSION['tournament_type'] = $tournament_type;
  	$_SESSION['number_of_participants'] = $number_of_participants;
  	$_SESSION['start_time'] = $start_time;
  	$_SESSION['description'] = $description;

    echo '<p>Enter names of participants</p>';
    echo '<p>No1 plays first round against no2, no3 plays against no4, etc.. 
     if there is odd number of players then winner of the last two participants plays with the 3rd from behind, etc..</p>';
  
    //FORM////////////////////////////////////////////////////////////////
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
	  for($i = 0; $i < $number_of_participants; $i++) {
        echo ($i+1).'<input type="text" name="participant'.$i.'" /><br />';
	  }
	  echo '<input type="submit" name="finish" value="Finish" />';
      echo '<input type="submit" name="randomize" value="Generate Random" />';
    echo '</form>';
    //END OF FORM/////////////////////////////////////////////////////////
  }

  if(isset($_POST['finish'])) {
  	$number_of_participants = $_SESSION['number_of_participants'];
  	$participants = [];

  	for($i = 0; $i < $number_of_participants; $i++) {
  	  $value_of_input = "participant".$i;
  	  $participants[$i] = mysql_real_escape_string($_POST[$value_of_input]);
  	}

    //pronadjem prvi stepen broja 2 koji je veci od broja ekipa 
    $s = 0;
    while(2 ** $s < $number_of_participants) {
      $s++;
    }

    for( $i = 0; $i < 2 ** $s; $i++) {
      echo '<input class="v'.(2**$s).' first" type="text" name="'.$s.($i+1).'" />';
    }

    $s--;

    for( $i = 0; $i < 2 ** $s; $i++) {
      echo '<input class="v'.(2**$s).' second" type="text" name="'.$s.($i+1).'" />';
    }

//  $bracket = new Bracket();
//  $bracket->make_new_bracket($tournament_type,$number_of_participants);
  }

  if(isset($_POST['randomize'])) {
  	$number_of_participants = $_SESSION['number_of_participants'];
  	$participants = [];
  	$new_participants = [];

  	for($i = 0; $i < $number_of_participants; $i++) {
  	  $value_of_input = "participant".$i;
  	  $participants[$i] = mysql_real_escape_string($_POST[$value_of_input]);
  	}

  	$new_participants = make_new_array_participants($number_of_participants,$participants);

  	//FORM////////////////////////////////////////////////////////////////
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
	  for($i = 0; $i < $number_of_participants; $i++) {
        echo ($i+1).'<input type="text" name="participant'.$i.'" value="'.$new_participants[$i].'" /><br />';
	  }
	  echo '<input type="submit" name="finish" value="Finish" />';
      echo '<input type="submit" name="randomize" value="Generate Random" />';
    echo '</form>';
    //END OF FORM/////////////////////////////////////////////////////////

  }

?>
  </body>
</html>
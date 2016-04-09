<?php
session_start();

  function is_logged_in() {
      if(isset($_SESSION['user_id'])) {
        return true;
      }
      else {
        return false;
      }
  }

  function print_header() {

    if(is_logged_in()) {
        echo "<ul class=\"navbar\">
                <li><a href=\"index.php\">Home</a></li>
                <li><a href=\"tournaments.php\">Tournaments</a></li>
                <li><a href=\"profile.php\">Profile</a></li>
                <li><a href=\"contact.php\">Contact</a></li>
                <li><a href=\"about.php\">About Us</a></li>
              </ul>";
        echo "<a href=\"sign_out.php\">Sign Out</a><br />";
    }
    else {
      echo "<ul class=\"navbar\">
            <li><a href=\"index.php\">Home</a></li>
            <li><a href=\"tournaments.php\">Tournaments</a></li>
            <li><a href=\"contact.php\">Contact</a></li>
            <li><a href=\"about.php\">About Us</a></li>
          </ul>";
      echo "<a href=\"login.php\">Log In / Register</a>";
    }
  }

  function print_footer() {
    echo "<footer>
            <div class=\"social\">
              <h3 class=\"contact\">You can contact us via:</h3>
              <a class=\"facebook\" href=\"https://www.facebook.com/Dreamhackfestival/\"><img class=\"facebook\" src=\"img/facebook.png\"></a>
              <a href=\"https://www.youtube.com/watch?v=wl6h9XfHCTs\"><img class=\"youtube\" src=\"img/youtube.png\"></a>
              <a href=\"https://github.com\"><img class=\"github\" src=\"img/Github.png\"></a>
            </div>

            <div class=\"copyright\">
              <h3 class=\"copyrighttext\"> &copy Devteam, </h3>".date("Y")."
            </div>
          </footer>";
  }


  function if_logged_add_tournament() {
    if(is_logged_in()) {
      echo "<a href=\"add_tournament.php\">Add Tournament</a>";
    }
  }

  // OVO TREBA OBRADITI NAKON ADD TOURNAMENT
  function list_tournaments() {

  }

  function make_new_array_participants($number_of_participants,$participants) {
    for($i = 0; $i < $number_of_participants; $i++) {
      $random = mt_rand(1,2000)%$number_of_participants;
      $tmp = $participants[$i];
      $participants[$i] = $participants[$random];
      $participants[$random] = $tmp;
      }
    return $participants;
  }
?>
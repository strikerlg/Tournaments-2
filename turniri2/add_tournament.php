<!DOCTYPE html>
<html>
  <head>
    <title></title>
  	<link rel="stylesheet" href="main.css" type="text/css" />
  </head>
  <body>
  
    <form method="post" action="add_participants.php">
      <label for="tournament_name">Tournament Name:</label>
      <input type="text" name="tournament_name" /><br />
      <label for="sport_game">Sport / Game</label>
      <input type="text" name="sport_game" /><br />
      <label for="tournament_type">Tournament Type:</label>
      <select name="tournament_type">
        <option value="single_elimination">Single Elimination</option>
        <option value="double_elimination">Double Elimination</option>
        <option value="round_robin">Round Robin</option>
      </select><br />
      <label for="nubmer_of_participants">Number of participants</label>
      <input type="number" name="number_of_participants" /><br />
      <label for="start_time">Start time:</label>
      <input type="date" name="start_time" /><br />
      <label for="description">Description:</label>
      <textarea rows="4" cols="50" name="description"></textarea><br />
      <input type="submit" name="submit" value="Next" />
    </form>

  </body>
</html>
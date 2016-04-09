<?php
class Bracket {

	private $tournament_type;
	private $number_of_participants;
	private $new_bracket;

	function Bracket() {
	}

	function make_new_bracket($tournament_type, $number_of_participants) {
		switch ($tournament_type) {
			case 'single_elimination':
				$single = new Single($number_of_participants);

				$this->new_bracket = $single;
				break;
			case 'double_elimination':
				$double = new Double($number_of_participants);

				$this->new_bracket = $double;
				break;
			default:
				break;
		}
	}
}

class Single {
	private $number_of_participants;

	function Single($number_of_participants) {
		$this->number_of_participants = $number_of_participants;
		// THERE SHOULD BE THE BRACKET MAKING
	}



	function print_bracket() {
		//THERE SHOULD BE THE BRACKET PRINTING
	}

}

class Double {

}
?>
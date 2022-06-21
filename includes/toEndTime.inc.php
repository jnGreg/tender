<?php 

function format_interval(DateInterval $interval) {
	$result = "";
	if ($interval->d > 1) {$result .= $interval->format("%d dni.");}
	else if ($interval->d === 1) {
		$result .= $interval->format("%d dzień");
		if ($interval->h === 0) { $result .= "."; }
		else if ($interval->h === 1) {$result .= $interval->format(", %h godzina.");}
		else if ($interval->h > 1 and $interval->h < 5) {$result .= $interval->format(", %h godziny.");}
		else if ($interval->h > 4 and $interval->h < 22) {$result .= $interval->format(", %h godzin.");}
		else {$result .= $interval->format(", %h godziny. ");}}
	else {	
		if ($interval->h < 1) {
			if ($interval->i < 1)  {$result .= "Poniżej minuty.";}
			else if ($interval->i === 1) { $result .= $interval->format("%i minuta."); }
			else if ($interval->i > 1 and $interval->i < 5) { $result .= $interval->format("%i minuty."); }
			else if ($interval->i > 4 and $interval->i < 22) { $result .= $interval->format("%i minut."); }
			else if ($interval->i > 21 and $interval->i < 25) { $result .= $interval->format("%i minuty."); }
			else if ($interval->i > 24 and $interval->i < 32) { $result .= $interval->format("%i minut."); }
			else if ($interval->i > 31 and $interval->i < 35) { $result .= $interval->format("%i minuty."); }
			else if ($interval->i > 34 and $interval->i < 42) { $result .= $interval->format("%i minut."); }
			else if ($interval->i > 41 and $interval->i < 45) { $result .= $interval->format("%i minuty."); }
			else if ($interval->i > 44 and $interval->i < 52) { $result .= $interval->format("%i minut."); }
			else if ($interval->i > 51 and $interval->i < 55) { $result .= $interval->format("%i minuty."); }
			else { $result .= $interval->format("%i minut."); }
		}
		else if ($interval->h === 1) { $result .= $interval->format("%h godzina");
			if ($interval->i < 1) { $result .= $interval->format("."); }
			else if ($interval->i === 1) { $result .= $interval->format(", %i minuta."); }
			else if ($interval->i > 1 and $interval->i < 5) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 4 and $interval->i < 22) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 21 and $interval->i < 25) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 24 and $interval->i < 32) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 31 and $interval->i < 35) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 34 and $interval->i < 42) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 41 and $interval->i < 45) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 44 and $interval->i < 52) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 51 and $interval->i < 55) { $result .= $interval->format(", %i minuty."); }
			else { $result .= $interval->format(", %i minut."); }
		}
		else if ($interval->h > 1 and $interval->h < 5) { $result .= $interval->format("%h godziny");
			if ($interval->i < 1) { $result .= $interval->format("."); }
			else if ($interval->i === 1) { $result .= $interval->format(", %i minuta."); }
			else if ($interval->i > 1 and $interval->i < 5) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 4 and $interval->i < 22) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 21 and $interval->i < 25) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 24 and $interval->i < 32) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 31 and $interval->i < 35) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 34 and $interval->i < 42) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 41 and $interval->i < 45) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 44 and $interval->i < 52) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 51 and $interval->i < 55) { $result .= $interval->format(", %i minuty."); }
			else { $result .= $interval->format(", %i minut."); }
		}
		else if ($interval->h > 4 and $interval->h < 22) { $result .= $interval->format("%h godzin");
			if ($interval->i < 1) { $result .= $interval->format("."); }
			else if ($interval->i === 1) { $result .= $interval->format(", %i minuta."); }
			else if ($interval->i > 1 and $interval->i < 5) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 4 and $interval->i < 22) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 21 and $interval->i < 25) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 24 and $interval->i < 32) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 31 and $interval->i < 35) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 34 and $interval->i < 42) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 41 and $interval->i < 45) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 44 and $interval->i < 52) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 51 and $interval->i < 55) { $result .= $interval->format(", %i minuty."); }
			else { $result .= $interval->format(", %i minut."); }
		}
		else { $result .= $interval->format("%h godziny");
			if ($interval->i < 1) { $result .= $interval->format("."); }
			else if ($interval->i === 1) { $result .= $interval->format(", %i minuta."); }
			else if ($interval->i > 1 and $interval->i < 5) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 4 and $interval->i < 22) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 21 and $interval->i < 25) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 24 and $interval->i < 32) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 31 and $interval->i < 35) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 34 and $interval->i < 42) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 41 and $interval->i < 45) { $result .= $interval->format(", %i minuty."); }
			else if ($interval->i > 44 and $interval->i < 52) { $result .= $interval->format(", %i minut."); }
			else if ($interval->i > 51 and $interval->i < 55) { $result .= $interval->format(", %i minuty."); }
			else { $result .= $interval->format(", %i minut."); }
		}
	}

	return $result;
}

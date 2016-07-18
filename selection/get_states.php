<?php
/*

This file will pass the states to the user.

*/

require "dbconnect.php";

if(isset($_POST['country']) and isset($_POST['state'])){
	$country = $_POST['country'];
	$state = $_POST['state'];
	$q1 = "SELECT Code FROM Country WHERE Name = :country";

	$pre1 = $pdo->prepare($q1);
	$pre1->bindValue(':country', $country);

	if($pre1->execute()){
		$cnt1 = $pre1->rowCount();
		$row1 = $pre1->fetch();
		if($cnt1 > 0){
			$q2 = "SELECT District FROM City WHERE CountryCode = :code AND District<>''";

			$pre2 = $pdo->prepare($q2);
			$pre2->bindValue(':code', $row1['Code']);

			if($pre2->execute()) {
				$cnt2 = $pre2->rowCount();
				$row2 = $pre2->fetch();
				if($cnt2 > 0){
					if($state != ""){
						$q3 = "SELECT DISTINCT District FROM City WHERE CountryCode = :code AND District LIKE :stated";
					} else {
						$q3 = "SELECT DISTINCT District FROM City WHERE CountryCode = :code";
					}

					$pre3 = $pdo->prepare($q3);
					$pre3->bindValue(':code', $row1['Code']);
					if($state != ""){
						$pre3->bindValue(':stated', $state . "%");
					}

					if($pre3->execute()) {
						$cnt3 = $pre3->rowCount();
						if($cnt3 > 0){
							while ($row3 = $pre3->fetch()) {
								echo "<label class='dataLabel' onclick=\"insertValState('". $row3['District'] ."');\">". $row3['District'] ."</label>";
							}
						} else {
							echo "No matching state found: ". $state;
						}
					} else {
						echo "Error in q3: ". $state;
					}
				} else {
					echo $country ." has no states.";
				}
			} else {
				echo "Error in q2";
			}
		} else {
			echo $country ." not found.";
		}
		echo "<label class='dataLabel' onclick=\"insertValState('No State');\">-- No State --</label>";
	} else {
		echo "Error in q1";
	}
}

?>
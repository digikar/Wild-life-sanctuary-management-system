<?php
/*

This file will pass the cities to the user.

*/

require "dbconnect.php";

if(isset($_POST['country']) and isset($_POST['state']) and isset($_POST['city'])){
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];

	$q1 = "SELECT Code FROM Country WHERE Name = :country";

	$pre1 = $pdo->prepare($q1);
	$pre1->bindValue(':country', $country);
	
	if($pre1->execute()){
		$cnt1 = $pre1->rowCount();
		$row1 = $pre1->fetch();
	} else {
		echo "Error with q1";
	}

	if($cnt1 > 0){
		if($state == "No State"){
			$q2 = "SELECT Name FROM City WHERE CountryCode = :code AND Name LIKE :city";
		} else if ($state == ""){
			$q2 = "SELECT Name FROM City";
		} else {
			$q2 = "SELECT Name FROM City WHERE District = :state AND Name LIKE :city";
		}

		$pre2 = $pdo->prepare($q2);

		if($state != ""){
			$pre2->bindValue(':city', $city ."%");
			if($state == "No State"){
				$pre2->bindValue(':code', $row1['Code']);
			} else {
				$pre2->bindValue(':state', $state);
			}
		}

		if ($pre2->execute()) {
			$cnt = $pre2->rowCount();
			if($cnt > 0){
				while ($row2 = $pre2->fetch()) {
					echo "<label class='dataLabel' onclick=\"insertValCity('". $row2['Name'] ."');\">". $row2['Name'] ."</label>";
				}
			} else {
				echo "No city found: ". $city .":". $state;
			}
		} else {
			echo "Error with q2";
		}
	} else {
		echo "Country code not found.";
	}
}

?>
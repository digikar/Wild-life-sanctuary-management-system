<?php
/*

This file will pass the countries to the user.

*/

require "dbconnect.php";

if(isset($_POST['country'])){
	$country = $_POST['country'];
	if($country != ""){
		$q1 = "SELECT Name FROM Country WHERE Name LIKE :country";
	} else {
		$q1 = "SELECT Name FROM Country";
	}

	$pre = $pdo->prepare($q1);
	$pre->bindValue(':country', $country . "%");

	if ($pre->execute()) {
		$cnt = $pre->rowCount();
		if($cnt > 0){
			while ($row = $pre->fetch()) {
				echo "<label class='dataLabel' onclick=\"insertValCountry('". $row['Name'] ."');\">". $row['Name'] ."</label>";
			}
		} else {
			echo "No results found.";
		}
	} else {
		echo "Error in q1";
	}
} else {
	echo "No country received";
}

?>
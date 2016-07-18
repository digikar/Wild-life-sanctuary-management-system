<?php
/*

This file will pass all the info we have to the user.

*/

require "dbconnect.php";

if(isset($_POST['country']) and isset($_POST['state']) and isset($_POST['city'])){
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];

	$html = "";

	$q1 = "SELECT * FROM Country WHERE Name = :country";

	$pre = $pdo->prepare($q1);
	$pre->bindValue(':country', $country);

	if($pre->execute()) {
		$row = $pre->fetch();

		$html .= "Country Code: ". $row['Code'] ."<br />";
		$html .= "Country: ". $row['Name'] ."<br />";
		$html .= "State: ". $state ."<br />";
		$html .= "City: ". $city ."<br />";
		$html .= "Continent: ". $row['Continent'] ."<br />";
		$html .= "Region: ". $row['Region'] ."<br />";
		$html .= "Surface Area: ". $row['SurfaceArea'] ."<br />";
		$html .= "Independence Year: ". $row['IndepYear'] ."<br />";
		$html .= "Population: ". $row['Population'] ."<br />";
		$html .= "Life Expectancy: ". $row['LifeExpectancy'] ."<br />";
		$html .= "GNP: ". $row['GNP'] ."<br />";
		$html .= "GNP Old: ". $row['GNPOld'] ."<br />";
		$html .= "Local Country Name: ". $row['LocalName'] ."<br />";
		$html .= "Government Form: ". $row['GovernmentForm'] ."<br />";
		$html .= "Head Of State: ". $row['HeadOfState'] ."<br />";

		$q2 = "SELECT Name FROM City WHERE ID = :capital";

		$pre2 = $pdo->prepare($q2);
		$pre2->bindValue(':capital', $row['Capital']);

		if($pre2->execute()) {
			$row2 = $pre2->fetch();
			$html .= "Capital: ". $row2['Name'] ."<br />";
		} else {
			echo "Error in q2";
			exit;
		}

		$html .= "Country Code(2): ". $row['Code2'] ."<br />";
		$html .= "<br />";
		$html .= "Spoken Languages:<br /><br />";
	} else {
		echo "Error in q1";
		exit;
	}

	$q3 = "SELECT * FROM CountryLanguage WHERE CountryCode = :code";

	$pre3 = $pdo->prepare($q3);
	$pre3->bindValue(':code', $row['Code']);

	if($pre3->execute()) {
		while ($row3 = $pre3->fetch()) {
			$html .= "Language: ". $row3['Language'] ."<br />";
			if($row3['IsOfficial'] == "F"){
				$html .= "Official: No<br />";
			} else {
				$html .= "Official: Yes<br />";
			}
			$html .= "Percentage of population spoken: ". $row3['Percentage'] ."<br /><br />";
		}
	} else {
		echo "Error in q2";
		exit;
	}

	echo $html;
}

?>
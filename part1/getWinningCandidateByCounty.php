<?php

// Reading from file system. Otherwise the request could be via POST request, with $json being read from $_FILES['file']['tmp_name']
$json = file_get_contents("votesPerCounty.json");
$data = json_decode($json, true);

$winning_candidates = [];
foreach ($data as $state_name => $state) {
	foreach ($state as $county_name => $county) {
		foreach ($county as $party_name => $party) {

			$winning_candidate = [
				"name" => "",
				"votes" => 0,
			];
			foreach ($party as $candidate => $votes) {
				if ($votes > $winning_candidate["votes"]) {
					$winning_candidate["votes"] = $votes;
					$winning_candidate["name"] = $candidate;
				}
			}
			$winning_candidates[$state_name][$county_name][$party_name] = $winning_candidate["name"];
		}
	}
}

echo json_encode($winning_candidates);

SELECT r1.state, r1.county, r1.party, r1.candidate
	FROM results r1
    	LEFT JOIN results r2 ON
        	r2.state = r1.state
            AND r2.county = r1.county
            AND r2.party = r1.party
            AND r2.candidate <> r1.candidate
        	AND r2.votes > r1.votes
    WHERE r2.votes IS NULL
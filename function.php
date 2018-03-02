<?php

	function sanitize($dbc, $data){
		$data = trim($data);
		$data = mysqli_real_escape_string($dbc, $data);
		$data = htmlentities($data);
		$data = strip_tags($data);
		return $data;
	}

?>
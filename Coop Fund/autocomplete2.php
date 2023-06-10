<?php

    include("connection.php");

	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		
		$q = $conn->real_escape_string($_POST['q']);
        // $r = $conn->real_escape_string($_POST['r']);

		// $sql = $conn->query("SELECT * FROM coopfund.society WHERE AC_office_idAC_office = $r AND Society_name LIKE '%$q%'");
		$sql = $conn->query("SELECT * FROM coopfund.society WHERE Society_name LIKE '%$q%'");

        if ($sql->num_rows > 0) {
			$response = '<ul >';

			while ($data = $sql->fetch_array())
				$response .= "<li  id='sid' data-sid='". $data['sid'] ."'>" . $data['Society_name'] . "</li>";



			$response .= "</ul>";
		}


		exit($response);
	}
?>
<html>
    <head>
        <title>jQuery Autocomplete</title>
        <style type="text/css">
            ul {
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top: 0px;
            }

            input, ul {
                width: 250px;
            }

            li:hover {
                color: silver;
                background: #0088cc;
            }
        </style>
    </head>
    <body>
    </body>
</html>
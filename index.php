<html>

<head>
    <title>Teller</title>
    <link href="./style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta http-equiv="refresh" content="60" >
</head>

<body>
    <a href='controls.php'>input</a>

<?php

	//Connecting to sql db.
	$db_host="";
	$db_db="";
	$db_user="";
	$db_pw="";

	$conn = mysqli_connect($db_host,$db_db,$db_user,$db_pw);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	
	// get data from sql
	$sql = "SELECT * FROM `Data` ORDER BY `Data`.`Tijd` DESC Limit 1";
	$result = $conn->query($sql);
	$row = mysqli_fetch_row($result);
	$tijd  = $row[0]; //zet sqlresult om in var
	$start = $row[1]; //zet sqlresult om in var		
	//echo '<pre>';
	//print_r($row); //$row[0] = tijd, $row[1]=leden. Comment dit nadat het verwerkt is.
	
	$conn->close();

?>

        
    
    <div class="container-fluid">
        <div class="row center leden">
            <div class="col-md-4"></div>
            <div class="col-md-4 Aantal">Er zijn
                <br><span id="number"><?php echo htmlspecialchars($start); ?></span>
                <br>nieuwe Catenianen bij!
                <p id="update">Laatste geupdate: <?php echo htmlspecialchars($tijd); ?></p>
            </div>

            <div class="col-md-4"></div>
        </div>

    </div>
</body>

</html>

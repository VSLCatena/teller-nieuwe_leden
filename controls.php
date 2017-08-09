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

</head>

<body>
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
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$start = $_POST['AantalLeden'];
		$waarde = $_POST['waarde'];
        $newvalue = $_POST['AantalLeden'];
			if ($waarde == "plus 1"){
				$start = $start +1;
			}
			if ($waarde =="minus 1"){
				$start = $start -1;
			}
            if ($waarde =="set new value"){
                $start = $newvalue;
            }
		//Sending form data to sql db.
		mysqli_query($conn,"INSERT INTO Data (Waarde)  VALUES ('$start')");
		
		} 
	
	// get data from sql
	$sql = "SELECT * FROM `Data` ORDER BY `Data`.`Tijd` DESC Limit 1";
	$result = $conn->query($sql);
	$row = mysqli_fetch_row($result);
	
	$tijd  = $row[0]; //zet sqlresult om in var
	$start = $row[1]; //zet sqlresult om in var		
		
	//echo '<pre>';
	//print_r($_POST);
	$conn->close();

?>

    
    
    
    
    
    <div class="container-fluid">

        <div class="row center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Teller Controls</h2>
                <form class="form-inline"action="controls.php" method="post">
                    <p>Huidig aantal:
                        <input type="text" name="AantalLeden" class="form-control" value="<?php echo htmlspecialchars($start); ?>" disabled> <br>
                    </p>
                     <span>Laatste geupdate: <?php echo htmlspecialchars($tijd); ?></span>
                    <hr>

                    <p>
                        <input type="submit" value="plus 1" name="waarde" class="btn btn-success btn-lg">
                        <input type="submit" value="minus 1" name="waarde" class="btn btn-danger btn-lg">


                        <input type="text" name="AantalLeden" class="form-control" value="<?php echo htmlspecialchars($start); ?>">
                        <input type="submit" value="set new value" name="waarde" class="btn btn-default">
                    </p>
                </form>
                <div id="footer">Martijn Koetsier & Mark de Reijer | 2016</div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>

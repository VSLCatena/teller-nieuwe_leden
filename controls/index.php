<html>

<head>
    <title>Teller</title>
    <link href="../style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
<br>
<a class="btn-lg btn-success" href="../index.php">Hoofdscherm</a>
    <?php
include("./password_protect.php");
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

$filename = "data.txt";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AantalLeden'])){
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
		$filename = "data.txt";
		$file = fopen($filename, "w") or die("Unable to open file!");
		$txt = date_format(new DateTime,"Y-m-d H:i:s") . ";" . $start;
		fwrite($file, $txt);
		fclose($file);
		
		} 
	
	// get data from text
	$file = fopen($filename, "rb") or die("Unable to open file!");
	$data= fread($file,filesize($filename));
	fclose($file);
	$data=explode(";",$data);
	$tijd  = $data[0]; //zet sqlresult om in var
	$start = $data[1]; //zet sqlresult om in var		
		

?>

    
    
    
    
    
    <div class="container-fluid">

        <div class="row center input">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Teller Controls</h2>
                <form class="form-inline"action="index.php" method="post">
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
			<br><br>
			<form action="upload.php"  method="post" enctype="multipart/form-data">
			<h4>Select background image to upload:</h4>
			<button class="btn-info"><input type="file" class="btn-lg" name="fileToUpload" id="fileToUpload"></button><br>
			<input type="submit" class="btn-info btn-lg" value="Upload Image" name="submit">
			</form>

				
				<a class="btn-lg btn-danger" href="./password_protect.php?logout=1">Logout</a>
				
                <div id="footer">Martijn Koetsier & Mark de Reijer | 2016</div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>

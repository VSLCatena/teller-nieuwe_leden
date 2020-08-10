
<?php
    $filename = "./controls/data.txt";
    $file = fopen($filename, "r") or die("Unable to open file!");
    $data= fread($file,filesize($filename));
    fclose($file);
    $data=explode(";",$data);

    $tijd  = $data[0]; //zet sqlresult om in var
    $start = $data[1]; //zet sqlresult om in var
?>
<html>
<head>
    <title>Teller</title>
    <link href="./style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<meta http-equiv="refresh" content="60" >
</head>
<body>
    <a class="position-fixed btn-lg btn-warning settings" href='./controls/index.php'>Invoer</a>

    <div class="container h-100 w-100">
        <div class="row h-100 w-100 align-items-center justify-content-center text-center">
            <div class="col aantal">Er zijn
                <br><span id="number"><?php echo htmlspecialchars($start); ?></span>
                <br>nieuwe Catenianen bij!
                <p id="update">Laatste geupdate: <?php echo htmlspecialchars($tijd); ?></p>
            </div>
        </div>
    </div>
</body>
</html>

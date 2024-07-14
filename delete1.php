<?php
$pdo = new PDO("mysql:host=localhost; dbname=funtasy; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
	$stmt = $pdo->prepare("DELETE FROM ใบนัด WHERE รหัสใบนัด=?");
	$stmt->bindParam(1, $_GET["รหัสใบนัด"]); 
	if ($stmt->execute()) 
	    header("location: cancle.php");
?>

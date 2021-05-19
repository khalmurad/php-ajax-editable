<?php
echo "AJAX is working!";

/*include_once "db.php";

$id = $_POST['id'];
$counter = $_POST['counter'];
sleep(1);

$sql = "UPDATE cards_count SET counter = :counter WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam('id', $id);
$stmt->bindParam('counter', $counter);
if ($stmt->execute())
{
	echo "Successfully updated!";
}
else
{
	echo "Failed!";
}*/

if (isset($_POST['id']))
{
	$id = $_POST['id']; // md5()
	$counter = $_POST['counter'];
	$value = $_POST['value'];
	
	echo "{$value} - {$column} - {$id}";
}
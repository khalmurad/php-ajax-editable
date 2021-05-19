<?php
include_once "db.php";

$id = 1;
$sql = "SELECT * FROM cards_count WHERE id = ? LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$counterID = md5($data['id']);
$counterValue = $data['counter'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Editable with AJAX</title>
  </head>
  <body>
    
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="badge badge-success" id="card-count" contenteditable="true" onBlur="updateCounter(this, 'counter', '<?= $counterID; ?>')" onclick="activate(this)"><?= $counterValue; ?></div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
    <!-- <script src="js/jquery-3.6.0.slim.min.js"></script> -->
    <script>
		function activate(element){
			// alert(element.innerText)
		}
		
		function updateCounter(element, column, id) {
			let value = element.innerText
			
			$.ajax({
				url: 'update.php',
				type: 'post',
				data: {
					value: value,
					element: element,
					id: id
				},
				success:function(php_result) {
					console.log(php_result);
				}
				/*success:function(data) {
					console.log(data);
				}*/

			});
		}
	</script>
  </body>
</html>
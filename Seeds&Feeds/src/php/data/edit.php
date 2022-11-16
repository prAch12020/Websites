<?php 
$id = $_GET['id'];
require_once 'config.php';
$conn = connect();
if(getPreviousPage() == 'seller'){
	$sql = "SELECT * FROM tbl_inputs WHERE input_id = $id";
	if($res = mysqli_query($conn, $sql)){
		if($row = $res->fetch_assoc()){?>
			<script>
				let editinputcontent = $(
				    "<form id='input-form' class='animate__animated animate__fadeInUp back' enctype='multipart/form-data' method='POST'>"+
				    "<div class='glass'>"+
				        "<div class='control'>"+
				            "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
				            "<a href='seller.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
				        "</div>"+
				        "<h2>Edit Input Item</h2><br>"+
				        "<section class='input-form'>"+
				            "<div>"+
				                "<label for='name'>Input Name</label><br><br>  "+                  
				                "<label for='desc'>Input Description</label><br><br>"+
				                "<label for='img'>Input Image</label><br><br>"+
				                "<label for='pri'>Input Price</label><br><br>"+
				                "<label for='pri'>Input Unit</label><br><br>"+
				            "</div>"+
				            "<div>"+
				                "<input name='name' id='name' type='text' value='<?php echo $row['name']?>'/><br><br>"+
				                "<input name='description' id='description' type='text' value='<?php echo $row['desc']?>'/><br><br>"+
				                "<input name='img' id='img' type='file' accept='.png,.jpeg,.jpg,.webp' value='<?php echo $row['image']?>'/><br><br>"+
				                "<input name='pri' id='pri' type='text' value='<?php echo $row['price']?>'/><br><br>"+
				                "<input name='unit' id='unit' type='text' value='<?php echo $row['unit']?>'/><br><br>"+
				            "</div>"+
				        "</section>"+
				        " <button id='sellinput' name='editinput' class='pri-button' type='submit'>Edit Input</button>"+
				        "<span class='material-symbols-outlined close close4'>close</span>"+
				    "</div>"+
				    "</form>");
			</script>";
		<?php }
		if(isset($_POST['editinput'])){
			$sql2 = "UPDATE `tbl_inputs` SET name = '$_POST[name]', `desc` = '$_POST[description]', price = '$_POST[pri]', unit = '$_POST[unit]' WHERE input_id = ".$id;
			if($results = mysqli_query($conn,$sql2))
				header('location:../seller.php');
			else{
				echo "Error in processing changes";
			}
		}
	}
	else{
		echo "Error in fetching data";
	}
}
else if(getPreviousPage() == 'sell_produce'){
	$sql = "SELECT * FROM tbl_inputs WHERE input_id = $id";
	if($res = mysqli_query($conn, $sql)){
		if($row = $res->fetch_assoc()){?>
			<script>
				let editproducecontent = $(
				    "<form id='produce-form' method='POST' enctype='multipart/form-data'>"+
				    "<div class='glass'>"+
				        "<div class='control'>"+
				            "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
				            "<a href='sell_produce.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
				        "</div>"+
				        "<h2>Add Product for Sale</h2><br>"+
				                "<section class='produce-form'>"+
				                    "<div>"+
				                        "<label for='name'>Produce Name</label><br><br>  "+                  
				                        "<label for='desc'>Produce Description</label><br><br>"+
				                        "<label for='img'>Produce Image</label><br><br>"+
				                        "<label for='pri'>Produce Price</label><br><br>"+
				                        "<label for='stock'>Produce Stock</label><br><br>"+
				                        "<label for='unit'>Stock Unit</label><br><br>"+
				                    "</div>"+
				                    "<div>"+
				                        "<input name='name' id='name' type='text' value='<?php echo $row['name']?>'/><br><br>"+
				                        "<input name='desc' id='desc' type='text value='<?php echo $row['desc']?>'/><br><br>"+
				                        "<input name='img' id='img' type='file' accept='.png,.jpeg,.jpg,.webp' value='<?php echo $row['image']?>'/><br><br>"+
				                        "<input name='pri' id='pri' type='text' value='<?php echo $row['price']?>'/><br><br>"+
				                        "<input name='stock' id='stock' type='number' value='<?php echo $row['produce_stock']?>'/><br><br>"+
				                        "<input name='unit' id='unit' type='text' value='<?php echo $row['unit']?>'/><br><br>"+
				                    "</div>"+
				                "</section>"+
				                "<button id='sell' class='pri-button' type='submit'>Add for Sale</button>"+
				            "</form>");
			</script>
		<?php }
		if(isset($_POST['editproduce'])){
			$sql2 = "UPDATE `tbl_farmproduce` SET name = '$_POST[name]', `desc` = '$_POST[description]', price = '$_POST[pri]', unit = '$_POST[unit]', produce_stock = '$_POST[stock]' WHERE input_id = ".$id;
			if($results = mysqli_query($conn,$sql2))
				header('location:../seller.php');
			else{
				echo "Error in processing changes";
			}
		}
	}
	else{
		echo "Error in fetching data";
	}
}
else echo "Unable to load page. Try again";
?>
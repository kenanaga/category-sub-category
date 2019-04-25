<!DOCTYPE html>
<html>
<head>
	<title>Kategori / Alt kategori</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	
	
</head>
<body>
<?php 
require_once "lib/db.php";
require_once "lib/functions.php";
$category_list=$db->query("SELECT * FROM category",PDO::FETCH_OBJ)->fetchALL();

?>

<div class="container">
	<h3 class="text-center">Kategori/Alt Kategori Islemleri</h3>
	<div class="row">
		<div class="col-md-6 well">
			<h4 class="text-center">Kategori Ekleme</h4>
			<hr>
			<form action="lib/category_db.php" method="POST">
				<div class="form-group">
					<label>Kategori Adi</label>
					<input type="text" class="form-control" name="title"></input>
				</div>
				<div class="form-group">
					<label> Varsa Ust Kategori </label>
					<select class="form-control" name="parent_id">
					<option selected="" value="0">Yok</option>
					<?php foreach ($category_list as $category) { ?>
						<option  value="<?php echo $category->id; ?>"><?php echo $category->title;?></option>
				<?php	} ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
				<button type="reset" class="btn btn-danger btn-sm">Iptal</button>
			</form>
		</div>
		<div class="col-md-6 ">
			<div class="col-md-11 well">
				<h4 class="text-center">Kategori Hiyerarsisi</h4>
			<hr>
			<?php drawElements(buildTree($category_list)); ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>



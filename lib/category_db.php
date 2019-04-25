<?php  

require_once "db.php";

if (isset($_POST['title']) && isset($_POST['parent_id'])) {
$prepare=$db->prepare("INSERT INTO category SET title=:title,parent_id=:parent_id");
$insert=$prepare->execute(
	array(
"title"     =>$_POST["title"],
"parent_id" =>$_POST["parent_id"]
         )
);
if ($insert) {
	header("Location:../index.php");
	
}else{
	echo "ekleme sirasinda problem olusdu";
}

}else{
	echo "islem basarisiz";
}
?>
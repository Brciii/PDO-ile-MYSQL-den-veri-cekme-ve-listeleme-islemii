<?php
$term=isset($_GET['term'])? $_GET['term']:null;

$con=new PDO('mysql:host=localhost;dbname=gonderici','root','');
$sql="SELECT Firma_Adi from gontable where Firma_Adi like '%$term%'";
$stmt=$con->prepare($sql);
$stmt->execute();
$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
$data=array();
foreach($arr as $key=>$val){
	$data[]=$val['Firma_Adi'];
}
echo json_encode($data);
?>
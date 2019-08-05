<?php

$dsn = 'mysql:host=127.0.0.1;dbname=gonderici';
$username='root';
$password='';


try{
    $con=new PDO($dsn,$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception  $ex ){
    echo 'bağlanti yok'.$ex->getMessage();
}



$listStmt=$con->prepare('SELECT *FROM gontable');
$listStmt->execute();
$personellist=$listStmt-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>
 
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="bootstrap3-typeahead.min.js"></script>
</head>
<body id="page-top" ng-app="myApp" ng-controller="myCtrl">
   

            <div class="container-fluid"
                style="width: 1059px;">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0"></h3>
                </div>

                <div class="row" style="padding-bottom: -10px;padding-top: 2px;">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4" style="width: 1390px;margin-left: -190px;margin-top: -10px;margin-right: 20px;height: 500px;background-color: rgb(255,255,255);margin-bottom: 42px;padding-left: -15px;" align="center">
                            <div class="card-header py-3" style="margin-bottom: -3px;height: 43px;padding: 16px;padding-top: 17px;padding-bottom: 17px;">
                                <h6 class="text-primary font-weight-bold m-0" style="font-size: 15px;padding-bottom: 20px;padding-top: -15px;margin-top: 7px;padding-left: -7px;">Gönderici Tablosu</h6>

		 <table id="fixed_table" style="width:100%" border="2">
		 	


			<tr align="center">

			 <th >Firma No</th>
			 <th >Tipi</th>
			 <th >Firma Adı</th>
			 <th >Adı </th>
			 <th >Soyadı</th>
			 <th >Yetkili Adı</th>
			 <th >Mail</th>
			 <th >Şifre</th>
			     <th>Cep Telefonu</th>
			      <th>TC Kimlik No</th>
			       <th>Adres</th>
			        <th>Şehir</th>
			         <th>Posta Kodu</th>
			             <th>Vergi Dairesi</th>
			             <th>Vergi Kimlik No</th>
			             <th>Özel Not</th>			           	       
			 </tr>
			

			 <?php

			 foreach($personellist as $person){?>
			 

			 	<tr>

			 	<td ><?= $person->Firma_No ?></td>
				<td ><?= $person->Tipi ?></td>
			 	<td ><?= $person->Firma_Adi ?></td>
			 	<td ><?= $person->Adi ?></td>
			 	<td ><?= $person->SoyAdi ?></td>
			 	<td><?= $person->Yetki_Adi ?></td>
			 	<td><?= $person->mail ?></td>
			 	<td><?= $person->sifre ?></td>
			 	<td><?= $person->ceptel ?></td>
			 	<td><?= $person->Tckimlikno ?></td>
			 	<td><?= $person->Adres ?></td>
			 	<td><?= $person->Sehir ?></td>
			 	<td><?= $person->PostaKodu ?></td>
			 	<td><?= $person->Vergi_D ?></td>
			 	<td><?= $person->Vergikimlikno ?></td>
			 	<td><?= $person->txtNot ?></td>


			    </tr>
				 
			 <?php } ?>

			 

  </table>  
                            </div>
                
                              
                              

</body>
	  
		  </div>  
	  </div>
	  </div>
 
 
  
  </body>
</html>
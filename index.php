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
$Tipi  = '';
$Firma_Adi  = '';
$Adi  = '';
$SoyAdi  = '';
$Yetki_Adi  = '';
$mail  = '';
$sifre  = '';
$ceptel  = '';
$Tckimlikno  = '';
$Adres  = '';
$Sehir  = '';
$PostaKodu  = '';
$Vergi_D  = '';
$Vergikimlikno  = '';
$txtNot  = '';


function getPosts(){

    $posts=array();
    $posts[0]=$_POST['Tipi'];
    $posts[1]=$_POST['Firma_Adi'];
    $posts[2]=$_POST["Adi"];
    $posts[3]=$_POST["SoyAdi"];
    $posts[4]=$_POST["Yetki_Adi"];
    $posts[5]=$_POST["mail"];
    $posts[6]=$_POST["sifre"];
    $posts[7]=$_POST["ceptel"];
    $posts[8]=$_POST["Tckimlikno"];
    $posts[9]=$_POST["Adres"];
    $posts[10]=$_POST["Sehir"];
    $posts[11]=$_POST["PostaKodu"];
    $posts[12]=$_POST["Vergi_D"];
    $posts[13]=$_POST["Vergikimlikno"];
    $posts[14]=$_POST["txtNot"];



    return $posts;    
}


if(isset($_POST['insert']))
{
    $data=getPosts();
    if($data[0]=="")
        {
            echo '<script type="text/javascript">alert(" Yeni veri Girişi için Boşlukları Doldurun:");</script>';
        }
        else
        {
            $insertStmt=$con->prepare('INSERT INTO gontable(Tipi,Firma_Adi,Adi,SoyAdi,Yetki_Adi,mail,sifre,ceptel,Tckimlikno,Adres,Sehir,PostaKodu,Vergi_D,Vergikimlikno,txtNot) VALUES(:Tipi,:Firma_Adi,:Adi,:SoyAdi,:Yetki_Adi,:mail,:sifre,:ceptel,:Tckimlikno,:Adres,:Sehir,:PostaKodu,:Vergi_D,:Vergikimlikno,:txtNot)');
            $insertStmt->execute(array(
            	 		':Tipi'=> $data[0],
                        ':Firma_Adi'=> $data[1],
                        ':Adi'=> $data[2],
                        ':SoyAdi'=> $data[3],
                        ':Yetki_Adi'=> $data[4],
                        ':mail'=> $data[5],
                        ':sifre'=> $data[6],
                        ':ceptel'=> $data[7],
                        ':Tckimlikno'=> $data[8],
                        ':Adres'=> $data[9],
                        ':Sehir'=> $data[10],
                        ':PostaKodu'=> $data[11],
                        ':Vergi_D'=> $data[12],
                        ':Vergikimlikno'=> $data[13],
                        ':txtNot'=> $data[14]
                        ));
            if($insertStmt)
            {
                    echo'<script type="text/javascript">alert("Veri Girildi");</script>';
            }
        }
}

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
<script type="text/JavaScript">


function Checkradiobutton()
 {
  
      if(document.getElementById('formCheck-4').checked)
     {

        document.getElementById('vergikimlikno').disabled=true; 
        document.getElementById('tckimlikno').disabled=false; 
     }
     else
     {
                document.getElementById('vergikimlikno').disabled=false; 
                document.getElementById('tckimlikno').disabled=true; 
            
     }
 }
</script>
    <script>
    var app=angular.module("myApp",[]);
    app.controller('myCtrl',function($scope,$http){
        
        $scope.complete=function(string){
            
            
            $http.get("http://localhost:81/new/search.php?term="+string)
  .then(function(response) {
    $scope.filterCountry = response.data;

  });

         
        }
        $scope.fillTextbox=function(string){
            $scope.country=string;
            $scope.filterCountry=null;
        }
    });
</script>
<body id="page-top" ng-app="myApp" ng-controller="myCtrl">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </li>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter">7</span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </li>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </li>
                    </li>
                    </ul>
            </div>
            </nav>

            <form action="index.php" method="POST" >
            <footer class="bg-white sticky-footer" style="margin-top: -19px;height: 71px;"> <button class="btn btn-primary" type="submit" name="insert" value="insert" style="margin-left: 160px;margin-bottom: 23px;padding-left: 10px;width: 116px;height: 45px;font-size: 15px;margin-top: -20px;"><i class="fa fa-save"></i>&nbsp;Kaydet</button>

            <a href="listele1.php"  ><input type="button"  class="btn btn-primary"style="margin-bottom: 23px;padding-left: 10px;width: 116px;height: 45px;font-size: 15px;margin-top: -20px;" value="Listeleme" name="list" class="d"></a>   


           </footer>
            <div class="container-fluid"
                style="width: 1059px;">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0"></h3>
                </div>
                <div class="row" style="padding-bottom: -10px;padding-top: 2px;">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4" style="width: 748px;margin-left: 152px;margin-top: -24px;margin-right: 20px;height: 298px;background-color: rgb(255,255,255);margin-bottom: 42px;padding-left: -15px;">
                            <div class="card-header py-3" style="margin-bottom: -3px;height: 43px;padding: 16px;padding-top: 17px;padding-bottom: 17px;">
                                <h6 class="text-primary font-weight-bold m-0" style="font-size: 15px;padding-bottom: 11px;padding-top: -15px;margin-top: 7px;padding-left: -7px;">Gönderici Kartı İşlemi</h6>
                            </div>
                            <div class="card-body" style="margin-top: 11px;height: 228px;margin-bottom: -32px;margin-left: 31px;color: rgba(133,135,150,0.73);background-color: #f5f5f5;width: 689px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check" style="margin-top: -13px;font-size: 15px;"><input class="form-check-input" name="Tipi"type="radio" value="bireysel"  onclick="Checkradiobutton()" id="formCheck-4"><label class="form-check-label" for="formCheck-4" style="margin-top: 0px;color: #000000;">BİREYSEL</label></div>
                                    </div>
                                    <div class="col" style="margin-top: -13px;">
                                        <div class="form-check" style="padding-left: -64px;padding-bottom: 19px;padding-right: 19px;height: 33px;padding-top: -2px;margin-left: -202px;"><input class="form-check-input" name="Tipi" value="kurumsal"type="radio" id="formCheck-5"  onclick="Checkradiobutton()" ><label class="form-check-label" for="formCheck-5" style="font-size: 15px;color: #000000;">KURUMSAL</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="padding-top: -5px;padding-left: 8px;"><label style="width: 110px;font-size: 15px;color: #000000;">Firma Adı</label>
                                        <input type="text" style="width: 453px;font-size: 15px;" id="firmadi"name="Firma_Adi" ng-model="country" ng-keyup="complete(country)" >
                                        <ul class="list-group">
                <li class="list-group-item" ng-repeat="countrydata in filterCountry  track by $index" ng-click="fillTextbox(countrydata)">{{countrydata}}</li>
            </ul>


                                    </div>
                                </div>

                              
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Adı Soyadı</label><input type="text" style="width: 200px;font-size: 13px;" name="Adi"><input type="text" name="SoyAdi" style="margin-left: 52px;width: 200px;font-size: 13px;"></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Yetkili Adı</label><input type="text" style="width: 200px;font-size: 13px;" name="Yetki_Adi"></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Mail</label><input type="mail" style="width: 200px;font-size: 13px;" name="mail"></div>
                                    <div class="col"><label style="margin-left: -14px;font-size: 15px;color: #000000;">Şifre</label><input type="password" style="margin-left: 10px;width: 200px;font-size: 13px;" name="sifre"></div>
                                </div>
                                <div class="row">
                                    <div class="col" style="font-size: 15px;"><label style="width: 110px;font-size: 15px;color: #000000;">Cep Telefonu</label><input type="number" style="width: 200px;font-size: 13px;" name="ceptel" id="ceptel">
                                        <div class="row">
                                            <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">TC Kimlik No</label><input type="number" id="tckimlikno" style="width: 200px;font-size: 13px;" name="Tckimlikno"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="card shadow mb-4" style="margin-left: 152px;height: 313px;width: 748px;margin-top: -23px;margin-bottom: 37px;margin-right: -3px;padding-top: -10px;padding-bottom: -10px;">
                            <div class="card-body" style="margin-top: 9px;height: -6px;margin-bottom: -26px;margin-left: 31px;color: rgba(133,135,150,0.73);background-color: #f5f5f5;width: 689px;padding-top: 7px;">
                                <h6 class="text-primary font-weight-bold m-0" style="font-size: 15px;padding-bottom: 11px;padding-top: -15px;margin-top: -6px;padding-left: -4px;margin-bottom: -4px;margin-left: 23px;">Fatura Bilgileri</h6>
                                <header></header>
                                <div class="row">
                                    <div class="col" style="margin-top: -7px;"><label style="width: 110px;font-size: 15px;padding-bottom: 9px;padding-top: -102px;margin-top: 0px;margin-bottom: 13px;height: 9px;margin-right: 0px;color: #000000;">Adres</label><textarea style="font-size: 13px;margin-top: -5px;padding-top: -2px;padding-bottom: -17px;margin-bottom: 7px;width: 453px;" name="Adres"></textarea></div>
                                </div>
                                <div class="row">
                                    <div class="col" style="padding-top: -5px;" "padding-left: -5px"><label style="width: 110px;font-size: 15px;color: #000000;">Şehir</label>
                                    	<select style="width: 453px;font-size: 15px;margin-left: -5px;" name="Sehir">
                                    		<option value=" "></option>

									    <option value="Adana">Adana</option>

									    <option value="Adıyaman">Adıyaman</option>

									    <option value="Afyonkarahisar">Afyonkarahisar</option>

									    <option value="Ağrı">Ağrı</option>

									    <option value="Amasya">Amasya</option>

									    <option value="Ankara">Ankara</option>

									    <option value="Antalya">Antalya</option>

									    <option value="Artvin">Artvin</option>

									    <option value="Aydın">Aydın</option>

									    <option value="Balıkesir">Balıkesir</option>

									    <option value="Bilecik">Bilecik</option>

									    <option value="Bingöl">Bingöl</option>

									    <option value="Bitlis">Bitlis</option>

									    <option value="Bolu">Bolu</option>

									    <option value="Burdur">Burdur</option>

									    <option value="Bursa">Bursa</option>

									    <option value="Çanakkale">Çanakkale</option>

									    <option value="Çankırı">Çankırı</option>

									    <option value="Çorum">Çorum</option>

									    <option value="Denizli">Denizli</option>

									    <option value="Diyarbakır">Diyarbakır</option>

									    <option value="Edirne">Edirne</option>

									    <option value="Elazığ">Elazığ</option>

									    <option value="Erzincan">Erzincan</option>

									    <option value="Erzurum">Erzurum</option>

									    <option value="Eskişehir">Eskişehir</option>

									    <option value="Gaziantep">Gaziantep</option>

									    <option value="Giresun">Giresun</option>

									    <option value="Gümüşhane">Gümüşhane</option>

									    <option value="Hakkâri">Hakkâri</option>

									    <option value="Hatay">Hatay</option>

									    <option value="Isparta">Isparta</option>

									    <option value="Mersin">Mersin</option>

									    <option value="İstanbul">İstanbul</option>

									    <option value="İzmir">İzmir</option>

									    <option value="Kars">Kars</option>

									    <option value="Kastamonu">Kastamonu</option>

									    <option value="Kayseri">Kayseri</option>

									    <option value="Kırklareli">Kırklareli</option>

									    <option value="Kırşehir">Kırşehir</option>

									    <option value="Kocaeli">Kocaeli</option>

									    <option value="Konya">Konya</option>

									    <option value="Kütahya">Kütahya</option>

									    <option value="Malatya">Malatya</option>

									    <option value="Manisa">Manisa</option>

									    <option value="Kahramanmaraş">Kahramanmaraş</option>

									    <option value="Mardin">Mardin</option>

									    <option value="Muğla">Muğla</option>

									    <option value="Muş">Muş</option>

									    <option value="Nevşehir">Nevşehir</option>

									    <option value="Niğde">Niğde</option>

									    <option value="Ordu">Ordu</option>

									    <option value="Rize">Rize</option>

									    <option value="Sakarya">Sakarya</option>

									    <option value="Samsun">Samsun</option>

									    <option value="Siirt">Siirt</option>

									    <option value="Sinop">Sinop</option>

									    <option value="Sivas">Sivas</option>

									    <option value="Tekirdağ">Tekirdağ</option>

									    <option value="Tokat">Tokat</option>

									    <option value="Trabzon">Trabzon</option>

									    <option value="Tunceli">Tunceli</option>

									    <option value="Şanlıurfa">Şanlıurfa</option>

									    <option value="Uşak">Uşak</option>

									    <option value="Van">Van</option>

									    <option value="Yozgat">Yozgat</option>

									    <option value="Zonguldak">Zonguldak</option>

									    <option value="Aksaray">Aksaray</option>

									    <option value="Bayburt">Bayburt</option>

									    <option value="Karaman">Karaman</option>

									    <option value="Kırıkkale">Kırıkkale</option>

									    <option value="Batman">Batman</option>

									    <option value="Şırnak">Şırnak</option>

									    <option value="Bartın">Bartın</option>

									    <option value="Ardahan">Ardahan</option>

									    <option value="Iğdır">Iğdır</option>

									    <option value="Yalova">Yalova</option>

									    <option value="Karabük">Karabük</option>

									    <option value="Kilis">Kilis</option>

									    <option value="Osmaniye">Osmaniye</option>

									    <option value="Düzce">Düzce</option>

                                    	</select></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Posta Kodu</label><input type="text" style="width: 200px;font-size: 13px;" name="PostaKodu"></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Vergi Dairesi</label><select style="font-size: 15px;width: 200px;" name="Vergi_D"><option value="12" selected="">1</option><option value="13">2</option><option value="14"> 3</option></select></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style="width: 110px;font-size: 15px;color: #000000;">Vergi Kimlik No</label><input type="text"  id="vergikimlikno" style="width: 200px;font-size: 13px;" name="Vergikimlikno"></div>
                                </div>
                                <div class="row">
                                    <div class="col" style="font-size: 15px;"><label style="padding-left: -25px;width: 110px;font-size: 15px;margin-left: 1px;color: #000000;">Özet Not</label><input type="text" name="txtNot" style="width: 453px;padding-left: -5px;margin-left: -1px;font-size: 13px;">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check" style="padding-left: 77px;margin-bottom: 9px;margin-top: 9px;"><input class="form-check-input" type="checkbox" id="formCheck-1" style="font-size: 15px;"><label class="form-check-label" for="formCheck-1" style="font-size: 15px;color: rgb(3,67,252);">Kullanıcı Koşullarını Ve Gizlilik Politikasını Kabul Ediyorum</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
            </div>
        </footer>
    </form>
    <script>
    $(function(){
        $('.ceptel').autocomplete({
            source:'search.php',
            minLength:1
        });
    });
    </script>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
    <style>

                              

</body>

</html>
<?php

//tambahan
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html; //untuk memanggil api component
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Pengguna;
  $id_uname = Yii::$app->user;
  $id = $id_uname->id;
  $user = Pengguna::findOne($id);

AppAsset::register($this);
 if(Yii::$app->controller->action->id==='login') { //memanggil controller yang mempunyai action login
    echo $this->render(
        'main_login', //untuk memanggil content
        ['content'=>$content]
        );
}else {

?>

<!--tambahan yang baru-->
<?php $this->beginPage() ?> 
<!DOCTYPE html>
<html>
<head>
  <!--untuk seo !-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
   <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

<!-- memulai body-->
<?php $this->beginBody() ?>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand">Beranda</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
           <!--  <li class="active"><a href="#">Data Pengguna <span class="sr-only">(current)</span></a></li> -->

           <!--MENU-->

           <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Manajemen Data <span class="caret"></span></a>
             
              <ul class="dropdown-menu" role="menu">
             
                <li><a href="<?=Url::to(['pengguna/index']);?>">Data Pengguna</a></li>
                <li><a href="<?=Url::to(['jabatan/index']);?>">Data Jabatan</a></li>
                <li><a href="<?=Url::to(['klasifikasi/index']);?>">Data Klasifikasi</a></li>
             
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Manajemen Surat <span class="caret"></span></a>
             
              <ul class="dropdown-menu" role="menu">
             
                <li><a href="<?=Url::to(['surat-masuk/index']);?>">Surat Masuk</a></li>
                <li><a href="<?=Url::to(['surat-keluar/index']);?>">Surat Keluar</a></li>
                <li><a href="<?=Url::to(['surat-disposisi/index']);?>">Surat Disposisi</a></li>
             
              </ul>
            </li>


            <li><a href="<?=Url::to(['agenda-kegiatan/index']);?>">Manajemen Agenda</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manajemen Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Laporan Surat Masuk</a></li>
                <li><a href="#">Laporan Surat Keluar</a></li>
                <li><a href="#">Laporan Surat Disposisi</a></li>
                <!-- <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
          </ul>
          
        </div>

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- Tasks Menu -->
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= Url::to('@web/' . $user->foto) ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= Url::to('@web/' . $user->foto) ?>" class="img-circle" alt="User Image">

                  <p>
                    Alexander Pierce 
                   
                  </p>
                </li>
                <!-- Menu Body -->
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= Url::to(['pengguna/changepassword','id'=>$id]) ?>" class="btn btn-default btn-flat">Ubah Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= Url::to(['site/logout']) ?>" class="btn btn-default btn-flat" data-method='post'>Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1> -->
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
       
        <div class="box box-default">
          <!-- <div class="box-header with-border">
            <h3 class="box-title">Blank Box</h3>
          </div> -->
          <div class="box-body">
            <?= $content ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.2
      </div>
      <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!--tambahan-->

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
<?php } ?>

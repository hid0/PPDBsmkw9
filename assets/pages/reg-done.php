<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Sukses</title>
    <link rel="shortcut icon" href="./assets/img/logo-smk.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/AdminLTE.min.css">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <div class="container">
        <div class="col-md-2">
            <img src="<?=getImg()?>logo-smk.png">
        </div>
        <div class="col-md-10">
            <h2 class="text-uppercase"><b>SMK Walisongo Pecangaan Jepara</b></h2>
            <h6 class="lead">Penerimaan Peserta Didik Baru TP. 2020/2021</h6>
        </div>
    </div>
</div>
  <div class="container">
    <div class="page-header jumbotron row">
        <div class="col-sm-12">
            <div class="text-center">
                <a href="export.php?e=single&id=<?=$_GET['id']?>" target="_blank" class="btn btn-flat btn-success btn-lg">
                    <i class="fa fa-check"></i>
                    Cetak Formulir
                </a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
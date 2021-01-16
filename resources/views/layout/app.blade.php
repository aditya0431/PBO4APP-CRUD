<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Aditya Alhafiz Sundana</title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('')}}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('')}}dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	@include('layout.header')
	@include('layout.sidebar')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	@yield('content')
	<div class="card">
  <div class="card-body">
    <!---- Start Tampilan Inputnya --->
    <div class="row mb-4">
      <div class="col-md-4">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control">
      </div>
      <div class="col-md-4 pt-4">
        <button type="button" id="btnTambah" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
      </div>
    </div>
    <!---- End Tampilan Inputnya --->

    <!---- Start Tampilan Tablenya --->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered align-middle table-hover">
        <thead class="text-center">
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="datarow">
        </tbody>
      </table>
    </div>
    <!---- End Tampilan Tablenya --->
  </div>
</div>

	<div>
	<!-- /.content-wrapper -->
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	<div class="p-3">
	<h5> Title </h5>
	<p>Sidebar content </p>
	<div>
	</aside>
	<!-- /.control-sidebar -->
	@include('layout.footer')
	</div>
	<!-- ./wrapper -->
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuesry -->
	
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script>
	$(function(){
		var nama = $("#nama");
		var alamat = $("#alamat");
		var btnTambah = $("#btnTambah");
		var datarow = $("#datarow");
		var aksi = "tambah";
		var tdNama;
		var tdAlamat;
		
		btnTambah.click(function(){
			if(aksi==="ubah"){
				tdNama.text(nama.val());
				tdAlamat.text(alamat.val());
			} else {
				var tr = '<tr>';
				tr += '<td class="nomor"></td>';
				tr += '<td>' + nama.val() + '</td>';
				tr += '<td>' + alamat.val() + '</td>';
				tr += '<td>';
				tr += '<button type="button" class="btn btn-success btnEdit"><i class="fa fa-edit"></i> Edit</button> ';
				tr += '<button type="button" class="btn btn-danger btnDelt"><i class="fa fa-trash-alt"></i> Delete</button>';
				tr += '</td>';
				tr += '</tr>';
				if(nama.val() !== "" && nama.val() !== ""){
					datarow.append(tr);
				}
			}
			aksi = "tambah";
			nama.val("");
			alamat.val("");
			bikinFunction();
		});
		
		function bikinFunction(){
			var no = 0;
			$(".nomor").unbind("map").off("map").map(function () {
				no++;
				$(this).text(no);
			});
			
			$(".btnEdit").unbind("click").off("click").each(function(){
				var _this_tombol = $(this);
				_this_tombol.click(function(){
					var row = _this_tombol.closest("tr");
					var tds = row.find("td");
					aksi = "ubah";
					tdNama = $(tds[1]);
					tdAlamat = $(tds[2]);
					nama.val(tdNama.text());
					alamat.val(tdAlamat.text());
				});
			});
			
			$(".btnDelt").unbind("click").off("click").each(function () {
				var _this_tombol = $(this);
				_this_tombol.click(function () {
					var bapaknya = _this_tombol.parent().parent();
					bapaknya.remove();
					bikinFunction();
				});
			});
		}
		
		bikinFunction();
    });
 </script>
	<script src="dist/js/adminlte.min.js"></script>
	</body>
	</html>
@extends('layouts.layout')

@section('title', 'Anggota')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New anggota</h2>
</div>
<!-- <?php
$auto = mysql_query("select max(id) as max_code from tbl_id");
$data = mysql_fetch_array($auto);
$code = $data['max_code'];
$urutan = (int)substr($code,1,3);
$urutan++;
$huruf = "K";
$kd_kat =huruf . sprintf("%03s", $urutan);
?> -->
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('anggotas.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('anggotas.store') }}" method="POST">
@csrf
<!-- Nama anggota -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID Anggota:</strong>
<input min="0"  type="number" name="IUD" class="form-control"  placeholder="Harga Beli" required></textarea> 
</div>
</div>
<!-- Nama anggota -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Anggota:</strong>
<input  type="text" class="form-control" name="nama" placeholder="Nama anggota" required> </input>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Jenis Kelamin:</strong>
                    <input type="radio"  name="jk" id="p" value="Perempuan" required>
                    <label for="p">Perempuan</label>
                    <input type="radio" name="jk" id="l" value="Laki-laki">
                    <label for="l">Laki-laki</label>
                </div>
            </div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>No Telepon:</strong>
<input  type="number" class="form-control" name="no_hp" placeholder="NO HP" required> </input>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Alamat:</strong>
<input  type="text" class="form-control" name="alamat" placeholder="Alamat" required> </input>
</div>
</div>
           
               
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection


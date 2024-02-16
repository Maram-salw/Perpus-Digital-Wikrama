@extends('components.master')
@section('title', 'historis')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class align="center">
<h2>Add New peminjaman</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('peminjamans.index') }}"> Back</a>
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
<form action="{{ route('peminjamans.store') }}" method="POST">
@csrf


<!-- Nama -->
<!-- Pembimbing -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID Peminjam:</strong>
<input type="text" pattern="/d*"class="form-control" name="IUD" placeholder="ID Peminjam"></input>
</div>
</div>
<!-- Pembimbing -->
<!-- Alamat -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Tanggal Balik:</strong>
    <input class="form-control" type="date"  name="tgl_balik" placeholder="Tanggal Balik"></input>
    </div>
    </div>
    <!-- /Alamat -->
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama buku:</strong>
    
    <select class="form-control" name="judul" id="judul">
        <option disabled selected option>Pilih judul Buku</option>
       @foreach ($peminjamans as $peminjaman )
       
           
       <option value="{{$peminjaman->judul}}">{{$peminjaman->judul}} {{$peminjaman->}</option>
       @endforeach
       
    </select>
    </div>
    </div>
    <!-- petugas -->
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama Petugas:</strong>
    <input class="form-control"  name="nama_pet" placeholder="Nama Petugas"></input>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama Peminjam:</strong>
    <input class="form-control"  name="nama" placeholder="Tanggal Balik"></input>
    </div>
    </div>
<!-- no telepon-->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>No Telepon:</strong>
<input type="text" pattern="/d*"type="integer" name="no_hp" class="form-control" placeholder="No Telepon"> 
</div>
</div>
<!-- no telepon-->

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

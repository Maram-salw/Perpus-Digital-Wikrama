@extends('components.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit histori</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('historis.index') }}"> Back</a>
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
<form action="{{ route('historis.update',$histori->id) }}" method="POST">
@csrf
@method('PUT')
<!-- Nama -->

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID Peminjam:</strong>
<input min="0"class="form-control"type="number"  name="i" value="{{$histori->i}}" placeholder="ID histori">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Judul Buku:</strong>
<input  type="text" class="form-control"  name="judul" value="{{$histori->judul}}"placeholder="" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Peminjam:</strong>
<input  type="text" class="form-control"  name="nama" value="{{$histori->nama}}"placeholder="" >
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>No Handphone:</strong>
    <input min="0"type="number" class="form-control" name="no_hp" value="{{ $histori->no_hp }}"placeholder="No Telepon"></input>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Alamat:</strong>
        <input type="text" class="form-control" name="alamat" value="{{ $histori->alamat }}" placeholder="Alamat"></input>
        </div>
        </div>

        


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

@extends('components.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit buku</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('bukus.index') }}"> Back</a>
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
<form action="{{ route('bukus.update',$buku->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>judul Buku:</strong>
<input type="text" name="judul" value="{{$buku->judul}}" class="form-control" placeholder="Judul Buku">
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>pengarang:</strong>
<input type="text" name="pengarang" value="{{$buku->pengarang}}" class="form-control" placeholder="Pengarang">
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Penerbit:</strong>
<input type="text" name="penerbit" value="{{$buku->penerbit}}" class="form-control" placeholder="penerbit">
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Kategori Buku:</strong>
<select class="form-control"  name="kategori" value="{{ $buku->kategori }}">
<!-- <option value="{{$buku->kategori}}" selected disabled>{{$buku->kategori}}</option> -->
         <option value="Romantis">Romantis</option>
         <option value="Horor">Horor</option>
         <option value="Misteri">Misteri</option>
         <option value="Komedi">Komedi</option>
         <option value="Inspiratif">Inspiratif</option>
         <option value="Sejarah">Sejarah</option>
         <option value="Petualangan">Petualangan</option>
 </select>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tahun:</strong>
<input min="0"type="number" name="tahun" value="{{$buku->tahun}}" class="form-control" placeholder="kategori">
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

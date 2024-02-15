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
                <strong>Judul:</strong>
                <input type="string" name="judul" value="{{ $buku->judul }}" class="form-control" placeholder="Judul">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Penulis:</strong>
                <input type="string" name="penulis" value="{{ $buku->penulis }}" class="form-control" placeholder="Penulis">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Penerbit:</strong>
                <input type="string" name="penerbit" value="{{ $buku->penerbit }}" class="form-control" placeholder="Penerbit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Nama Kategori:</strong>
                <input type="string" name="nama_kategori" value="{{ $buku->nama_kategori }}" class="form-control" placeholder="Nama Kategori">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Tahun Terbit:</strong>
                <input type="number" min='0' name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="form-control" placeholder="Tahun Terbit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
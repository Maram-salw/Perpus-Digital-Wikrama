@extends('components.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show buku</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bukus.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul:</strong>
            {{ $buku->judul }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Penulis:</strong>
            {{ $buku->penulis }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Penerbit:</strong>
            {{ $buku->penerbit }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Kategori:</strong>
            {{ $buku->nama_kategori }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tahun Terbit:</strong>
            {{ $buku->tahun_terbit }}
        </div>
    </div>
</div>
@endsection
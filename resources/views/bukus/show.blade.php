@extends('components.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <pre>
    <h2> Show buku</h2>
    </div>
    <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('bukus.index') }}"> Back</a>
    </div>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>ID Buku:</strong>
    {{ $buku->IUD }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Judul:</strong>
    {{ $buku->judul }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>pengarang:</strong>
    {{ $buku->pengarang }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>penerbit:</strong>
    {{ $buku->penerbit }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>penerbit:</strong>
    {{ $buku->penerbit }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>kategori:</strong>
    {{ $buku->kategori }}
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>tahun:</strong>
    {{ $buku->tahun }}
    </div>
    </div>
@endsection

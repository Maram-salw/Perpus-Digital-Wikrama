@extends('components.master')
@section('title', 'historis')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
    <pre>
<h2> Show histori</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('historis.index') }}"> Back</a>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID peminjam:</strong>
{{ $histori->IUD}}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul</strong>
        {{ $histori->judul}}
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nama petugas</strong>
                {{ $histori->nama_pet}}
        </div>
    </div>
        
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
        <strong>nama peminjam</strong>
        {{ $histori->nama}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>no telepon</strong>
        {{ $histori->no_hp}}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Tgl Pinjam:</strong>
    {{ $histori->tgl_pinjam}}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>tgl_balik</strong>
        {{ $histori->tgl_balik}}
    </div>
</div>
@endsection
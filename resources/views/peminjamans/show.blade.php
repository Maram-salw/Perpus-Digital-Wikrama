@extends('components.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
    <pre>
<h2> Show peminjaman</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('peminjamans.index') }}"> Back</a>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID peminjam:</strong>
{{ $peminjaman->id}}
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Tgl Pinjam:</strong>
    {{ $peminjaman->tgl_pinjam}}
    </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>tgl_balik</strong>
        {{ $peminjaman->tgl_balik}}
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Judul</strong>
        {{ $peminjaman->judul}}
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>nama petugas</strong>
        {{ $peminjaman->nama_pet}}
        </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>nama peminjam</strong>
        {{ $peminjaman->nama}}
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>no telepon</strong>
        {{ $peminjaman->no_hp}}
        </div>
        </div>
@endsection
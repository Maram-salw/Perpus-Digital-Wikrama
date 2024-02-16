@extends('anggotas.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
    <pre>
<h2> Show anggota</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('anggotas.index') }}"> Back</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID anggota:</strong>
{{ $anggota->IUD}}
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama Anggota:</strong>
    {{ $anggota->nama}}
    </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Jenis Kelamin:</strong>
        {{ $anggota->jk}}
        </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>No Telepon:</strong>
            {{ $anggota->no_hp}}
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Alamat:</strong>
                {{ $anggota->alamat}}
                </div>
                </div>
   
                    

@endsection
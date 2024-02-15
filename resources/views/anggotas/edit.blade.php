@extends('components.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit anggota</h2>
</div>
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
<form action="{{ route('anggotas.update',$anggota->id) }}" method="POST">
@csrf
@method('PUT')
<!-- Nama -->

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID Anggota:</strong>
<input min="0"class="form-control"type="number"  name="IUD" required value="{{$anggota->IUD}}" placeholder="ID anggota">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Anggota:</strong>
<input  type="text" class="form-control"  name="nama" value="{{$anggota->nama}}"placeholder="" >
</div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
                <div>
                    <strong>Jenis Kelamin:</strong>
                    <select class="form-control" id="jk" value="{{ $anggota->jk }}"name="jk" required="jk">
                        <!-- <option value="--Pilih Jenis Kelamin anda--" selected disabled>{{$anggota->jk}}</option> -->
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>No Handphone:</strong>
    <input min="0"type="number" class="form-control" name="no_hp" value="{{ $anggota->no_hp }}"placeholder="No Telepon"></input>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Alamat:</strong>
        <input type="text" class="form-control" name="alamat" value="{{ $anggota->alamat }}" placeholder="Alamat"></input>
        </div>
        </div>

        


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

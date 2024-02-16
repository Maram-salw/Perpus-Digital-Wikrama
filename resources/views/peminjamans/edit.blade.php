@extends('components.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit peminjaman</h2>
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
<form action="{{ route('peminjamans.update',$peminjaman->id) }}" method="POST">
@csrf
@method('PUT')
<div class="row">


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Id Peminjaman:</strong>
<input class="form-control"  name="id" readonly value="{{ $peminjaman->id }}"placeholder="id peminjaman"></input>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tgl pinjam:</strong>
<input class="form-control"  name="tgl_pinjam" readonly value="{{ $peminjaman->tgl_pinjam }}"placeholder="Nama peminjaman"></input>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tgl Balik:</strong>
<input type="date"class="form-control"  name="tgl_balik"  readonly value="{{ $peminjaman->tgl_balik }}"placeholder="Nama peminjaman"></input>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Judul Buku:</strong>
                                        <select class="form-control" id="judul" name="judul" required="judul">
                                            <!-- <option value="{{ $peminjaman->judul }}" selected disabled>{{ $peminjaman->judul }}
                                            </option> -->
                                            @foreach ($bukus as $bk)
                                                <option  value="{{ $bk->judul }}">{{ $bk->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>nama Petugas:</strong>
        <input   type="text" class="form-control" readonly value="{{ $peminjaman->nama_pet }}" name="nama_pet" placeholder="" readonly value="{{auth()->user()->name}} ">
        </div>
        </div>
                    
            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Peminjam:</strong>
                                 
                                        <select class="form-control" value="{{ $peminjaman->nama}}">
                                            <!-- <option value="--Cari Nama Anda--" selected disabled>--Cari Nama Anda--
                                            </option> -->
                                            @foreach ($anggotas as $anggota)
                                                <option value="{{ $anggota->nama }}">{{ $anggota->nama }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
      
                                <!-- <div class="form-group">
                                        <strong>No Hp:</strong>
                                 
                                        <select class="form-control" readonly name="no_hp" >
                                            <option value="--Cari Nama Anda--" selected disabled>{{ $peminjaman->nama }} </option>
                                            @foreach ($anggotas as $anggota)
                                                <option value="{{ $anggota->no_hp }}">{{ $anggota->no_hp }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->
                              
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

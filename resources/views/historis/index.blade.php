@extends('components.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Pengembalian</h2>
                </div>
               
                @role("Petugas")
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Masukan Pengembalian Baru
                    </button>
                </div>
                @endrole
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr class align="center">
                <th>No</th>
                <th width="20px">Kode</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Nama Petugas</th>
                <th>No Hp</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th width=90px>Action</th>
            </tr>
            @foreach ($historis as $histori)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $histori->id }}</td>
                    <td>{{ $histori->judul }}</td>
                    <td>{{ $histori->nama }}</td>
                    <td>{{ $histori->nama_pet }}</td>
                    <td>{{ $histori->no_hp }}</td>
                    <td>{{ $histori->tgl_pinjam }}</td>
                    <td>{{ $histori->tgl_balik }}</td>
                    <td>
                        <form action="{{ route('historis.destroy', $histori->id) }}" method="POST">
                            @csrf
                            <select  id="option" width="90px" height="30px"> 
                            <option value="{{('')}}">Buku Di Pinjam </option>
                             <option  value="{{ route('historis.show', $histori->id) }}" id="option" class="btn btn-info"><class="btn btn-info">Buku Sudah Di Kembalikan</option>
                            <option type="submit" class="btn btn-danger" id="option"onclick="return confirm('Apakah yakin {{ $histori->nama }} sudah mengembalikan Buku?')"><i class="fa-solid fa-trash-can"></i>Buku Belum di kembalikan</option>
                            @method('DELETE')
                            </option>
                            </select>
                            <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin {{ $histori->nama }} sudah mengembalikan Buku?')"><i class="fa-solid fa-trash-can"></i></button> -->
                        </form>
                    </td>
                 
                </tr>
            @endforeach
        </table>
        {!! $historis->links() !!}

        <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Tambahkan histori</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('historis.index') }}"> Back</a>
                                </div> 
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada input yang salah!<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('historis.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>ID:</strong>
                                        <input pattern="/d*" type="number" name="id" class="form-control" placeholder="ID">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Judul Buku:</strong>
                                        <select class="form-control" id="judul" name="judul" required="judul">
                                            <option value="--Pilih Buku--" selected disabled>--Pilih Buku--
                                            </option>
                                            @foreach ($bukus as $bk)
                                                <option value="{{ $bk->judul }}">{{ $bk->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Peminjam:</strong>
                                        <select class="form-control" id="nama" name="nama" required="nama">
                                            <option value="--Pilih Peminjam--" selected disabled>--Pilih Peminjam--
                                            </option>
                                            @foreach ($anggotas as $cr)
                                                <option value="{{ $cr->nama }}">{{ $cr->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Petugas:</strong>
                                        <input type="text" name="nama_pet" class="form-control"  placeholder="" readonly value="{{auth()->user()->name}} ">
                                    </div>
                                </div>
                        
                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nomor Telepon:</strong>
                                        <select class="form-control" id="no_hp" name="no_hp" required="no_hp">
                                            <option value="--Nomor Telepon--" selected disabled>--Pilih Nomor Telepon--
                                            </option>
                                            @foreach ($anggotas as $cr)
                                                <option value="{{ $cr->no_hp }}">{{ $cr->no_hp }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nomor Telepon:</strong>
                                        <input type="integer"  pattern="/d*" name="no_hp" class="form-control"
                                        pattern="/d*" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tanggal Pengembalian :</strong>
                                        <input type="date" name="tgl_balik" class="form-control">
                                    </div>
                                </div>
                                  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
@endsection

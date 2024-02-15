@extends('components.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class align="center">Daftar peminjaman</h2>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Masukan Peminjaman Baru
                    </a>
                </div>
            </div>
        </div>
        <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif -->
        <table class="table table-bordered">
            <!-- <tr>
                <th>No</th>
                <th width="120px">ID</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Judul Buku</th>
                <th>Nama Petugas</th>
                <th>Nama Peminjam</th>
                <th>Nomor Telepon</th>
                <th width=240px>Action</th>
            </tr> -->
            <!-- @foreach ($peminjamans as $peminjaman)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $peminjaman->IUD }}</td>
                    <td>{{ $peminjaman->tgl_pinjam }}</td>
                    <td>{{ $peminjaman->tgl_balik }}</td>
                    <td>{{ $peminjaman->judul }}</td>
                    <td>{{ $peminjaman->nama_pet }}</td>
                    <td>{{ $peminjaman->nama }}</td>
                    <td>{{ $peminjaman->no_hp }}</td>
                    <td>
                        <form action="{{ route('peminjamans.destroy', $peminjaman->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('peminjamans.show', $peminjaman->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-primary"  href="{{ route('peminjamans.edit', $peminjaman->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $peminjaman->nama }}?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach -->
        </table>
        <!-- {!! $peminjamans->links() !!} -->

        <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Tambahkan peminjaman</h2>
                                </div>
                                <!-- <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('peminjamans.index') }}"> Back</a>
                                </div> -->
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
                        <form action="{{ route('peminjamans.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>ID:</strong>
                                        <input pattern="/d*" type="number" name="id" class="form-control" readonly placeholder="">
                                    </div>
                                </div> -->
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tanggal Pengembalian :</strong>
                                        <input type="date" name="tgl_balik" readonly class="form-control">

                                    </div>
                                </div>  -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Judul Buku:</strong>
                                        <select class="form-control" id="judul" name="judul" required>
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
                                        <strong>Nama Petugas:</strong>
                                        <input  type="text" name="nama_pet" class="form-control" required placeholder=""readonly value="{{auth()->user()->name}} ">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Peminjam:</strong>

                                        <select class="form-control" id="nama" name="nama" required>
                                            <option value="--Cari Nama Anda--" selected disabled>--Cari Nama Anda--
                                            </option>
                                            @foreach ($anggotas as $anggota)
                                                <option value="{{ $anggota->nama }}">{{ $anggota->nama }} </option>
                                            @endforeach
                                        </select>
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
        </div>
    </div>


    <!-- edit -->



@endsection

@extends('components.master')

@section('title', 'Anggota')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Anggota</h2>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Masukan Anggota Baru
                    </a>
                </div>
                <!-- <div class="pull-right">
<a class="btn btn-success" href="{{ route('anggotas.create') }}"> Create New anggota</a>
</div> -->
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
                <th width="80px">NIS</th>
                <th width="120px">Nama</th>
                <th>Jenis Kelamin</th>
                <th width="200px">Nomor Telepon</th>
                <th>Alamat</th>
                <th width="190px">Action</th>
            </tr>
            @foreach ($anggotas as $anggota)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $anggota->IUD }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->jk }}</td>
                    <td>{{ $anggota->no_hp }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>
                        <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('anggotas.show', $anggota->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{ route('anggotas.edit', $anggota->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus {{ $anggota->nama }}?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $anggotas->links() !!}
        <!-- Button trigger modal -->


        <!-- Modal -->
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
                                    <h2>Tambahkan Anggota</h2>
                                </div>

                                <!-- <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('anggotas.index') }}"> Back</a>
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
                        <form action="{{ route('anggotas.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>NIS Anggota:</strong>
                                        <input min="0"type="number" name="IUD" class="form-control" required placeholder="Nis Anggota">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Anggota:</strong>
                                        <input type="text" name="nama" class="form-control" required placeholder="Nama Anggota">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <input type="radio"  name="jk" id="p" value="Perempuan">
                    <label for="p">Perempuan</label>
                    <input type="radio" name="jk" id="l" value="Laki-laki">
                    <label for="l">Laki-laki</label>
                </div>
            </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nomor Telepon:</strong>
                                        <input min="0"type="number" name="no_hp" class="form-control" required placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Alamat:</strong>
                                        <input type="text" name="alamat" class="form-control" required placeholder="Alamat">
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

@endsection

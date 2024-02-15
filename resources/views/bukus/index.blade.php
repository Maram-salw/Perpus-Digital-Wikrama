@extends('bukus.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Buku</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('bukus.create') }}"> Create New Buku</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Nama Kategori</th>
        <th>Tahun Terbit</th>
        <th width="260px">Action</th>
    </tr>
@foreach ($bukus as $buku)
<tr>
    <td>{{ ++$i }}</td>
    <td>{{ $buku->judul }}</td>
    <td>{{ $buku->penulis }}</td>
    <td>{{ $buku->penerbit }}</td>
    <td>{{ $buku->nama_kategori }}</td>
    <td>{{ $buku->tahun_terbit }}</td>
    <td>
        <form action="{{ route('bukus.destroy',$buku->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('bukus.show',$buku->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('bukus.edit',$buku->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"  onclick="return confirm('apakah anda yakin menghapus? {{ $buku->judul }}')"><i class="fa-solid fa-trash"></i></button>
        </form>
    </td>
</tr>
@endforeach
</table>
{!! $bukus->links() !!}
@endsection
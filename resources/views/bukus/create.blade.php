@extends('components.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class align="center">
                <h2>Add New buku</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bukus.index') }}"> Back</a>
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
    <form action="{{ route('bukus.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID Buku:</strong>
                    <input min="0"type="number" name="IUD" class="form-control" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>judul buku:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul Buku">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerbit:</strong>
                    <input type="text" name="penerbit" class="form-control" placeholder="penerbit">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>pengarang:</strong>
                    <input type="text" name="pengarang" class="form-control" placeholder=" pengarang">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>kategori:</strong>
                    <input type="text" name="kategori" class="form-control" placeholder="kategori">
                </div>
            </div>
            <div>


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tahun:</strong>
                            <input type="number" name="tahun" class="form-control" placeholder="tahun">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
@endsection

@extends('layout.admin')
@section('content')
@include('layout/pesan')
<!-- <h1>Tambah Kategori</h1> -->
<div class="card mb-4"> 
<div class="card-header"><h5>Tambah Kategori</h5></div>
 <div class="card-body">
<form action="{{ route('kategori.store') }}" method="post">
    @csrf
    Nama Kategori : <input type="text"  name="nama_kategori">
    @error('nama_kategori')
    <strong>{{ $message }}</strong>
    @enderror
    Keterangan: <input type="text" name="ket">
    @error('ket')
    <strong>{{ $message }}</strong>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{ route('kategori.index') }}" type="submit">Kembali</a>
</div>
</div>

<!-- <div class="card mb-4"> 
<div class="card-header">Tambah Kategori</div>
 <div class="card-body">

<form action="{{ route('kategori.store') }}" method="post">
    @csrf
    <div class="mb-3">
    <label class="form-lavel">Nama Kategori :</label>
    <input type="text"  name="nama_kategori">
    @error('nama_kategori')
    <strong>{{ $message }}</strong>
    @enderror
    </div>
    <div class="mb-3"> 
        <label class="form-label">Keterangan</label> 
        <input type="text" name="ket">
    @error('ket')
    <strong>{{ $message }}</strong>
    @enderror
    </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{ route('kategori.index') }}" type="submit">Kembali</a>
    </div>
</div> -->
@endsection
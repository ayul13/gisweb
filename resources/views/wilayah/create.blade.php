@extends('layout.admin')
@section('content')
@include('layout/pesan')
<!-- <h1>Tambah wilayah</h1> -->
<div class="card mb-4"> 
<div class="card-header"><h5>Tambah Wilayah</h5></div>
 <div class="card-body">
<form action="{{ route('wilayah.store') }}" method="post">
    @csrf
    <div class="mb-3">
    Nama Wilayah : <input type="text"  name="nama">
    </div>
    @error('nama')
    <strong>{{ $message }}</strong>
    @enderror
    <div class="mb-3">
    Data Geojson: <input type="text" name="data_geojson">
    </div>
    @error('data_geojson')
    <strong>{{ $message }}</strong>
    @enderror
    <div class="mb-3">
    Warna: <input type="text" name="warna">
    </div>
    @error('warna')
    <strong>{{ $message }}</strong>
    @enderror
    <div class="mb-3">
    Nama Kecamatan: <input type="text" name="nama_kecamatan">
    </div>
    @error('nama_kecamatan')
    <strong>{{ $message }}</strong>
    @enderror
    <div class="mb-3">
    Nama Desa: <input type="text" name="nama_desa">
    </div>
    @error('nama_desa')
    <strong>{{ $message }}</strong>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{ route('wilayah.index') }}" type="submit">Kembali</a>
</div>
</div>

<!-- <div class="card mb-4"> 
<div class="card-header">Tambah wilayah</div>
 <div class="card-body">

<form action="{{ route('wilayah.store') }}" method="post">
    @csrf
    <div class="mb-3">
    <label class="form-lavel">Nama wilayah :</label>
    <input type="text"  name="nama_wilayah">
    @error('nama_wilayah')
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
<a href="{{ route('wilayah.index') }}" type="submit">Kembali</a>
    </div>
</div> -->
@endsection
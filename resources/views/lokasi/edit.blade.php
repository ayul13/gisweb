@extends('layout.app')
@section('content')
@include('layout/pesan')
<h1>Edit Lokasi</h1>
<form action="{{ route('lokasi.update', $lokasi->id_lokasi) }}" method="post">
    @csrf
    @method('put')
    Nama Lokasi : <input type="text" name="nama" value="{{ $lokasi->nama }}">
    @error('nama_lokasi')
    <strong>{{ $message }}</strong>
    @enderror

    @csrf
    @method('put')
    Latitude : <input type="text" name="lat" value="{{ $lokasi->lat }}">
    @error('lat')
    <strong>{{ $message }}</strong>
    @enderror

    @csrf
    @method('put')
    Langitude : <input type="text" name="lang" value="{{ $lokasi->lang }}">
    @error('nama_lokasi')
    <strong>{{ $message }}</strong>
    @enderror

    @method('put')
    Marker : <input type="text" name="marker" value="{{ $lokasi->marker }}">
    @error('marker')
    <strong>{{ $message }}</strong>
    @enderror

    <button type="submit">Update</button>
</form>
<a href="{{ route('lokasi.index') }}" type="submit">Kembali</a>
@endsection
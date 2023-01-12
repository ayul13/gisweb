@extends('layout.app')
@section('content')
@include('layout/pesan')
<h1>Tambah Lokasi</h1>
<form action="{{ route('lokasi.store') }}" method="post">
    @csrf
    Nama Lokasi : <input type="text" name="nama">
    @error('nama')
    <strong>{{ $message }}</strong>
    @enderror

    Latitude : <input type="text" name="lat">
    @error('lat')
    <strong>{{ $message }}</strong>
    @enderror

    Longitude : <input type="text" name="lang">
    @error('lang')
    <strong>{{ $message }}</strong>
    @enderror

    Marker : <input type="text" name="marker">
    @error('marker')
    <strong>{{ $message }}</strong>
    @enderror

   
    <button type="submit">Save</button>
</form>
<a href="{{ route('lokasi.index') }}" type="submit">Kembali</a>
@endsection
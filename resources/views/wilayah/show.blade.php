@extends('layout.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-4"> 
<div class="card-header"><h5>Tambah Wilayah</h5></div>
 <div class="card-body">
<p>Nama wilayah : {{ $wilayah->nama }}</p>
<p>Data Geojson : {{ $wilayah->data_geojson }}</p>
<p>Warna : {{ $wilayah->warna }}</p>
<p>Nama Kecamatan : {{ $wilayah->nama_kecamatan }}</p>
<p>Nama Desa : {{ $wilayah->nama_desa }}</p>
<a href="{{ route('wilayah.index') }}" type="submit">Kembali</a>
 </div>
</div>
@endsection
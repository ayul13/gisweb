@extends('layout.app')
@section('content')
<h1>Data Lokasi</h1>
<p>Nama Lokasi : {{ $lokasi->nama }}</p>
<p>Lat : {{ $lokasi->lat }}</p>
<p>Lang : {{ $lokasi->lang }}</p>
<p>Marker : {{ $lokasi->marker }}</p>
<p>id_kategori : {{ $lokasi->id_kategori }}</p>
<a href="{{ route('lokasi.index') }}" type="submit">Kembali</a>
@endsection
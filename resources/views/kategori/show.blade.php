@extends('layout.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<h1>Detail Kategori</h1>
<p>Nama Kategori : {{ $kategori->nama_kategori }}</p>
<p>Keterangan : {{ $kategori->ket }}</p>
<a href="{{ route('kategori.index') }}" type="submit">Kembali</a>
@endsection
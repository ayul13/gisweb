@extends('layout.admin')
@section('content')
<!-- <h1>Data Lokasi</h1> -->
@include('layout/pesan')

<div class="card">
    <div class="card-header"><h4>Data Lokasi</h4></div>
    <div class="card-body"> 
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama lokasi</th>
            <th>Latitude</th>
            <th>longitude</th>
            <th>Marker</th>
            <th>Kategori</th>
            <!-- <th>Keterangan</th> -->
            <th><a href="{{ route('lokasi.create' )}}" class="mt-2 btn bg-primary text-white">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($lokasi as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td><a href="{{ route('lokasi.show', $data->id_lokasi)}}">{{ $data->nama }}</a></td>
            <td><a href="{{ route('lokasi.show', $data->id_lokasi)}}">{{ $data->lat }}</a></td>
            <td><a href="{{ route('lokasi.show', $data->id_lokasi)}}">{{ $data->lang }}</a></td>
            <td><a href="{{ route('lokasi.show', $data->id_lokasi)}}">{{ $data->marker }}</a></td>
            <td><a href="{{ route('lokasi.show', $data->id_lokasi)}}">{{ $data->id_kategori }}</a></td>
            <td>
                <form action="{{ route('lokasi.destroy', $data->id_lokasi) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('lokasi.edit', $data->id_lokasi) }}" class="mt-2 btn bg-primary text-white">Edit</a>
                    <button type="submit" class="mt-2 btn bg-danger text-white" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
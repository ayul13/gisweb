@extends('layout.admin')
@section('content')
@include('layout/pesan')

<div class="card">
    <div class="card-header"><h4>Data Wilayah</h4></div>
    <div class="card-body"> 
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama wilayah</th>
            <th scope="col">Data Geojson</th>
            <th scope="col">Warna</th>
            <th scope="col">Nama Kecamatan</th>
            <th scope="col">Nama Desa</th>
            <th scope="col"><a href="{{ route('wilayah.create' )}}">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($wilayah as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td><a href="{{ route('wilayah.show', $data->id)}}">{{ $data->nama }}</a></td>
            <td><a href="{{ route('wilayah.show', $data->id)}}">{{ $data->data_geojson }}</a></td>
            <td><a href="{{ route('wilayah.show', $data->id)}}">{{ $data->warna }}</a></td>
            <td><a href="{{ route('wilayah.show', $data->id)}}">{{ $data->nama_kecamatan }}</a></td>
            <td><a href="{{ route('wilayah.show', $data->id)}}">{{ $data->nama_desa }}</a></td>
            <td>
                <form action="{{ route('wilayah.destroy', $data->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('wilayah.edit', $data->id) }}">Edit</a>
                    <button type="submit" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
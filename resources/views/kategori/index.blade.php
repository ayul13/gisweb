@extends('layout.admin')
@section('content')
@include('layout/pesan')

<div class="card">
    <div class="card-header"><h4>Data kategori</h4></div>
    <div class="card-body"> 
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Keterangan</th>
            <th scope="col"><a href="{{ route('kategori.create' )}}">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($kategori as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td><a href="{{ route('kategori.show', $data->id_kategori)}}">{{ $data->nama_kategori }}</a></td>
            <td><a href="{{ route('kategori.show', $data->id_kategori)}}">{{ $data->ket }}</a></td>
            <td>
                <form action="{{ route('kategori.destroy', $data->id_kategori) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('kategori.edit', $data->id_kategori) }}">Edit</a>
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
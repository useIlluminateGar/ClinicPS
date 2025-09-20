@extends('layouts.app_modern', ['title' => 'Data Poli'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Poli</h5>
        <div class="card-body">
            <h3>Data Poli</h3>
            <a href="/poli/create" class="btn btn-primary">Tambah Poli</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poli as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->biaya }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" 
                                onclick="return confirm('Anda yakin untuk menghapus?')">
                                Hapus
                            </button>


                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $poli->links() !!}
        </div>
    </div>
@endsection
@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <h3>Data Pendaftaran</h3>
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Nama atau nomor pasien" value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-secondary">CARI</button>
                    </div>
                </div>
            </form>
            <a href="/daftar/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Poli</th>
                        <th>Keluhan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                        <td>{{ $item->tanggal_daftar }}</td>
                        <td>
                            <div>{{ $item->poli->nama }}</div>
                            <div>{{ $item->biaya }}</div>
                        </td>
                        <td>{{ $item->keluhan }}</td>
                        <td>
                            <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
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
            {!! $daftar->links() !!}
        </div>
    </div>
@endsection
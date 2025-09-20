@extends('layouts.app_modern', ['title' => 'Edit Data Poli'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Poli <b>{{ $poli->nama }}</b></h5>
        <div class="card-body">
            <form action="/poli/{{ $poli->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Poli</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $poli->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="biaya">Biaya</label>
                    <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya" value="{{ old('biaya') ?? $poli->biaya }}">
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') ?? $poli->keterangan }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
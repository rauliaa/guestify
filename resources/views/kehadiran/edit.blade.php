@extends('layouts.app')

@section('title', 'Edit Kehadiran')

@section('content')
<div class="container">
    <h3>Edit Kehadiran</h3>

    <form action="{{ route('kehadiran.update', $kehadiran->id_kehadiran) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tamu_id" class="form-label">Tamu</label>
            <select class="form-control" id="tamu_id" name="id_tamu">
                <option selected disabled>Pilih Tamu</option>
                @foreach ($tamu as $t)
                    <option value="{{ $t->id_tamu }}" {{ $t->id_tamu == $kehadiran->id_tamu ? 'selected' : '' }}>
                        {{ $t->nama_tamu }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Acara</label>
            <input type="text" name="acara" class="form-control" value="{{ $kehadiran->acara }}">
        </div>

        <div class="card-body">
            <div>
                <label class="form-check">
                    <input class="form-check-input" type="radio" value="hadir" name="status_kehadiran"
                        {{ $kehadiran->status_kehadiran === 'hadir' ? 'checked' : '' }}>
                    <span class="form-check-label">
                        Hadir
                    </span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="radio" value="tidak hadir" name="status_kehadiran"
                        {{ $kehadiran->status_kehadiran === 'tidak hadir' ? 'checked' : '' }}>
                    <span class="form-check-label">
                        Tidak Hadir
                    </span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="radio" value="pending" name="status_kehadiran"
                        {{ $kehadiran->status_kehadiran === 'pending' ? 'checked' : '' }}>
                    <span class="form-check-label">
                        Pending
                    </span>
                </label>
            </div>
        </div><br>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

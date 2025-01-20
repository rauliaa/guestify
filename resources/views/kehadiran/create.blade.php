    @extends('layouts.app')

    @section('title', 'Catat Kehadiran')

    @section('content')
    <div class="container">
        <h3>Catat Kehadiran</h3>

        <form action="{{ route('kehadiran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_tamu" class="form-label">Tamu</label>
                <select class="form-control" name="id_tamu" required>
                    <option selected disabled>Pilih Tamu</option>
                    @foreach ($tamu as $t)
                        <option value="{{ $t->id_tamu }}">{{ $t->nama_tamu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Acara</label>
                <input type="string" name="acara" class="form-control" required>
            </div>
            <div class="card-body">
                <div>
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="hadir" name="status_kehadiran">
                        <span class="form-check-label">
                            Hadir
                        </span>
                    </label>
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="tidak hadir" name="status_kehadiran">
                        <span class="form-check-label">
                            Tidak Hadir
                        </span>
                    </label>
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="pending" name="status_kehadiran">
                        <span class="form-check-label">
                            Pending
                        </span>
                    </label><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div><br>
    @endsection

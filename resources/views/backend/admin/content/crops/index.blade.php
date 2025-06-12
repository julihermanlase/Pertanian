@extends('backend/admin/layout/main')
@section('content')
        <div class="container">
            <h2 class="mb-4">List Tanaman</h2>

            <a href="{{ route('crops.create') }}" class="btn btn-primary rounded-pill mb-3">Tambah Tanaman</a>

            <form action="{{ route('crops.index') }}" method="GET" class="form-inline mb-3">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari lahan...">
                <button type="submit" class="btn btn-secondary">🔍 Cari</button>
            </form>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nama Tanaman</th>
                    <th>Varietas</th>
                    <th>Lahan</th>
                    <th>Tanggal Tanam</th>
                    <th>Estimasi Panen</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($crops as $crop)
                    <tr>
                        <td>{{ $crop->name }}</td>
                        <td>{{ $crop->variety }}</td>
                        <td>{{ $crop->land->name }}</td>
                        <td>{{ $crop->start_date }}</td>
                        <td>{{ $crop->est_harvest_date }}</td>
                        <td>
                            <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection

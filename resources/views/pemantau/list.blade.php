@extends('layouts.user')

@section('title', 'Data Penerima')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>QR Code</th>
                        <th>Nama Anak</th>
                        <th>Nama Aya</th>
                        <th>Nama Ibu</th>
                        <th>Sekolah</th>
                        <th>Kelas</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($recipients as $recipient)
                        <tr>
                            <td>
                                <span class="badge bg-primary">{{ $recipient->qr_code }}</span>
                            </td>
                            <td>{{ $recipient->child_name }}</td>
                            <td>{{ $recipient->Ayah_name }}</td>
                            <td>{{ $recipient->Ibu_name }}</td>
                            <td>{{ $recipient->school_name }}</td>
                            <td>{{ $recipient->class }}</td>
                            <td>
                                @if($recipient->is_distributed)
                                    <span class="badge bg-success">Sudah Menerima</span>
                                @else
                                    <span class="badge bg-warning">Belum Menerima</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data penerima</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $recipients->links() }}
        </div>
    </div>
</div>
@endsection

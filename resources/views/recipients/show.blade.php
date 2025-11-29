@extends('layouts.app')

@section('title', 'Detail Penerima')

@section('content')
    <div class="row">
        <!-- Detail Penerima -->
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Penerima</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Info Utama -->
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>QR Code:</strong></td>
                                    <td>
                                        <span class="badge bg-primary">{{ $recipient->qr_code }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Anak:</strong></td>
                                    <td>{{ $recipient->child_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Ayah:</strong></td>
                                    <td>{{ $recipient->Ayah_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Ibu:</strong></td>
                                    <td>{{ $recipient->Ibu_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tempat, Tanggal Lahir:</strong></td>
                                    <td>{{ $recipient->birth_place }}, {{ $recipient->birth_date->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tingkat Sekolah:</strong></td>
                                    <td>{{ $recipient->school_level }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Sekolah:</strong></td>
                                    <td>{{ $recipient->school_name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>

                    <h5 class="mt-4 mb-3">
                        <i class="fas fa-hand-holding-heart text-primary me-2"></i>Status Penyaluran
                    </h5>

                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">

                            <!-- Registrasi -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">
                                    <i class="fas fa-check-circle text-success me-2"></i>Registrasi
                                </span>
                                <span class="badge bg-{{ $recipient->registrasi ? 'success' : 'secondary' }} px-3 py-2">
                                    {{ $recipient->registrasi ? 'Sudah' : 'Belum' }}
                                </span>
                            </div>

                            <!-- Khitan -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">
                                    <i class="fas fa-user-md text-info me-2"></i>Khitan
                                </span>
                                <span class="badge bg-{{ $recipient->khitan_received ? 'success' : 'danger' }} px-3 py-2">
                                    {{ $recipient->khitan_received ? 'Sudah' : 'Belum' }}
                                </span>
                            </div>

                            <!-- Uang & Bingkisan -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">
                                    <i class="fas fa-gift text-warning me-2"></i>Uang & Bingkisan
                                </span>
                                <span
                                    class="badge bg-{{ $recipient->uang_bingkisan_received ? 'success' : 'danger' }} px-3 py-2">
                                    {{ $recipient->uang_bingkisan_received ? 'Sudah' : 'Belum' }}
                                </span>
                            </div>

                            <!-- Fotobooth -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">
                                    <i class="fas fa-camera text-purple me-2"></i>Fotobooth
                                </span>
                                <span
                                    class="badge bg-{{ $recipient->fothobooth_received ? 'success' : 'danger' }} px-3 py-2">
                                    {{ $recipient->fothobooth_received ? 'Sudah' : 'Belum' }}
                                </span>
                            </div>

                            <!-- Tanggal Penyaluran -->
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">
                                    <i class="fas fa-calendar-check text-primary me-2"></i>Tanggal Penyaluran
                                </span>

                                @if ($recipient->distributed_at)
                                    <span class="badge bg-primary px-3 py-2">
                                        {{ $recipient->distributed_at->format('d F Y H:i') }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">Belum Disalurkan</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Keterangan Penyaluran --}}
              <div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
        <h5 class="fw-bold mb-3">
            <i class="fas fa-comment-dots text-secondary me-2"></i>Keterangan Penyaluran
        </h5>

        <div class="p-3 rounded"
             style="background:#f9fafb; border-left:4px solid #3b82f6;">
            <p class="mb-0" style="white-space:pre-line;">
                {{ $recipient->keterangan ?? 'Tidak ada keterangan.' }}
            </p>
        </div>
    </div>
</div>


                    </table>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('recipients.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <div>
                            <a href="{{ route('recipients.edit', $recipient) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <a href="{{ route('recipients.qr-code', $recipient) }}" class="btn btn-info" target="_blank">
                                <i class="fas fa-qrcode me-2"></i>Lihat QR
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- QR Code -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="mb-0">QR Code</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{ route('recipients.qr-code', $recipient) }}" alt="QR Code" class="img-fluid mb-3"
                        style="max-width: 200px;">
                    <br>
                    <strong>{{ $recipient->qr_code }}</strong>
                    <br>
                    <a href="{{ route('recipients.qr-print', $recipient) }}" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fas fa-download me-1"></i>Download QR
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

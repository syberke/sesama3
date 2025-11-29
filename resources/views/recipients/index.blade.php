@extends('layouts.app')

@section('title', 'Data Penerima')

@section('content')
<style>
/* === Banner Header === */
.page-header {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    border-radius: 16px;
    padding: 28px;
    margin-bottom: 28px;
    color: white;
    box-shadow: 0 6px 20px rgba(30,64,175,0.25);
}

/* === Search Card & Buttons === */
.search-container { background: white; border-radius:16px; padding:22px; box-shadow:0 6px 22px rgba(0,0,0,0.08); margin-bottom:28px; border:1px solid #e2e8f0; }
.search-wrapper { position: relative; width: 100%; max-width: 380px; }
.search-wrapper input { width:100%; height:42px; padding:8px 40px 8px 14px; font-size:14px; border-radius:10px; border:1px solid #d1d5db; transition:0.2s; }
.search-wrapper input:focus { border-color:#3b82f6; box-shadow:0 0 0 3px rgba(59,130,246,0.2); outline:none; }
.search-wrapper button { position:absolute; right:8px; top:50%; transform:translateY(-50%); background:#2563eb; border:none; color:white; border-radius:8px; width:32px; height:32px; display:flex; align-items:center; justify-content:center; transition:0.2s; }
.search-wrapper button:hover { background:#1e40af; }
.btn-custom { border-radius:10px; padding:10px 20px; font-weight:600; transition:0.25s; }
.btn-custom:hover { transform:translateY(-2px); box-shadow:0 6px 18px rgba(0,0,0,0.15); }
.action-buttons { display:flex; gap:12px; flex-wrap:wrap; justify-content:flex-end; }

/* === Data Table === */
.data-table { background:white; border-radius:16px; padding:28px; box-shadow:0 6px 22px rgba(0,0,0,0.08); border:1px solid #e2e8f0; }
.table th { background:#f1f5f9; color:#334155; font-weight:600; border-bottom:2px solid #e2e8f0; padding:14px; white-space: nowrap; }
.table td { padding:14px; border-bottom:1px solid #e2e8f0; vertical-align: middle; }
.table tbody tr:hover { background:#f8fafc; }

/* Alamat panjang tampil sebagian */
.address-text {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.address-text.expanded {
    white-space: normal;
    overflow: visible;
}

/* Status Badge */
.status-badge { padding:6px 12px; border-radius:20px; font-size:0.82rem; font-weight:600; display:inline-flex; align-items:center; gap:5px; }
.status-completed { background:#dcfce7; color:#166534; }
.status-registered { background:#fef3c7; color:#92400e; }
.status-pending { background:#fee2e2; color:#991b1b; }

/* Responsive fixes */
@media (max-width:768px) { .action-buttons { justify-content:center; } .search-wrapper { max-width:100%; } .data-table { padding:20px; } .table th, .table td { font-size:13px; } }
</style>

<!-- Banner -->
<div class="page-header">
    <h2 class="mb-2">Data Penerima</h2>
    <p class="mb-0">Kelola data penerima bantuan pendidikan</p>
</div>

<!-- Search + Actions -->
<div class="search-container">
    <div class="row align-items-center gy-3">
        <div class="col-lg-6 col-md-12">
            <form action="{{ route('recipients.index') }}" method="GET" class="d-flex align-items-center flex-wrap gap-2">
                <div class="search-wrapper">
                    <input type="text" name="search" placeholder="Cari penerima..." value="{{ request('search') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="action-buttons">
                <a href="{{ route('recipients.import') }}" class="btn btn-success btn-custom"><i class="fas fa-plus me-2"></i>Import Excel</a>
                <a href="{{ route('recipients.printAll') }}" class="btn btn-info btn-custom text-white"><i class="fas fa-download me-2"></i>Download QR</a>
            </div>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="data-table">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>QR Code</th>
                    <th>Nama Anak</th>
                    <th>Nama Ayah</th>
                    <th>Alamat</th>
                    <th>Wilayah</th>
                    <th>Telephone</th>
                    <th>Referensi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recipients as $recipient)
                    <tr>
                        <td><span class="badge bg-primary">{{ $recipient->qr_code }}</span></td>
                        <td>{{ $recipient->child_name }}</td>
                        <td>{{ $recipient->Ayah_name }}</td>
                      <td style="max-width:250px; cursor:pointer;" onclick="this.querySelector('span').classList.toggle('expanded')">
    <span class="address-text">{{ $recipient->address }}</span>
</td>

                        <td>{{ $recipient->wilayah }}</td>
                        <td>{{ $recipient->no_tlp }}</td>
                        <td>{{ $recipient->reference }}</td>
                        <td>
                            @if ($recipient->is_distributed && $recipient->registrasi)
                                <span class="status-badge status-completed"><i class="fas fa-check-circle"></i> Completed</span>
                            @elseif ($recipient->registrasi && !$recipient->is_distributed)
                                <span class="status-badge status-registered"><i class="fas fa-check"></i> Sudah registrasi</span>
                            @else
                                <span class="status-badge status-pending"><i class="fas fa-times"></i> Belum registrasi</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('recipients.show', $recipient) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('recipients.edit', $recipient) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('recipients.destroy', $recipient) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-inbox fa-2x mb-3"></i>
                                <p>Belum ada data penerima</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination-container mt-4">
        {{ $recipients->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

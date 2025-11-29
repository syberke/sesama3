    @extends('layouts.app')


    @section('title', 'Penyaluran Bantuan')


    @section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <style>

    .page-header {
        background: linear-gradient(135deg, #1e40af, #3b82f6);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        color: white;
        text-align: center;
    }
    .scan-container, .result-container {
        border-radius: 16px;
        background: #fff;
        padding: 30px;
        box-shadow: 0 6px 12px rgba(0,0,0,0.08),
                    0 12px 24px rgba(0,0,0,0.12),
                    0 18px 32px rgba(0,0,0,0.06);
    }
    .scan-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        border-radius: 50%;
        display:flex;
        justify-content:center;
        align-items:center;
        margin:0 auto 20px;
    }
    .form-control { border-radius:8px; border:1px solid #e5e7eb; padding:12px; }
    .form-control:focus { border-color:#3b82f6; box-shadow:0 0 0 3px rgba(59,130,246,0.1); }
    .btn-custom { border-radius:10px; padding:12px 25px; font-weight:600; }
    .btn-custom:hover { transform: translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,0.15);}
    .hidden { display:none !important; }
    </style>


    <div class="page-header">
        <h2>Penyaluran Bantuan</h2>
        <p>Scan QR penerima untuk memproses penyaluran</p>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="scan-container">


                <div class="text-center mb-3">
                    <div class="scan-icon">
                        <i class="fas fa-qrcode fa-2x text-white"></i>
                    </div>
                    <h4>Pilih Mode Scan</h4>
                    <button type="button" class="btn btn-primary btn-custom me-2" id="btnCamera">
                        <i class="fas fa-camera me-2"></i>Scan via Kamera
                    </button>
                    <button type="button" class="btn btn-secondary btn-custom" id="btnManual">
                        <i class="fas fa-keyboard me-2"></i>Input Manual
                    </button>
                </div>



                <div id="camera-area" class="mb-3 hidden">
                    <div id="reader" style="width:100%; max-width:400px; margin:0 auto;"></div>
                    <p class="text-center text-muted mt-2">Arahkan kamera ke QR Code</p>
                    <div class="text-center mt-2">
                        <button type="button" id="btnStopCamera" class="btn btn-sm btn-outline-danger">Stop Kamera</button>
                    </div>
                </div>


                <form id="verifyForm" class="mb-3">
                    @csrf
                    <div id="manual-input-wrapper">
                        <label class="form-label">Kode QR</label>
                        <input type="text" id="qr_code" name="qr_code" class="form-control" placeholder="Scan atau ketik QR" required>
                        <small class="form-text text-muted mt-2 d-block">
                            <i class="fas fa-info-circle me-1"></i>
                            Gunakan scanner atau ketik manual kode QR
                        </small>
                    </div>
                    <div class="text-center mt-2">
                        <button class="btn btn-primary btn-custom"><i class="fas fa-search me-2"></i>Verifikasi</button>
                    </div>
                </form>



                <div id="result" class="hidden">
                    <div class="result-container">
                        <h5 class="text-center fw-bold mb-3">
                            <i class="fas fa-user-check text-success me-2"></i>Data Penerima
                        </h5>
                        <input type="hidden" id="recipient_id">


                        <div class="mb-3">
                            <label class="form-label">Nama Anak</label>
                            <input class="form-control" id="child_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input class="form-control" id="Ayah_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input class="form-control" id="Ibu_name" readonly>
                        </div>
                            <div class="mb-3">
                            <label class="form-label">address</label>
                            <input class="form-control" id="address" readonly>
                        </div>
                            <div class="mb-3">
                            <label class="form-label">reference</label>
                            <input class="form-control" id="reference" readonly>
                        </div>
                            <div class="mb-3">
                            <label class="form-label">wilayah</label>
                            <input class="form-control" id="wilayah" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">telephone</label>
                            <input class="form-control" id="no_tlp" readonly>
                                    </div>
                        </div>


                        <hr class="my-3">
                      <h5 class="text-center fw-bold mb-3">
    <i class="fas fa-hand-holding-heart text-primary me-2"></i>
    Form Penyaluran
</h5>


 <form id="distributeForm">
    @csrf
    <input type="hidden" name="recipient_id" id="recipient_id_2">

    <div class="mb-3">
        <label class="form-label">Tanggal Penyaluran</label>
        <input type="datetime-local" name="delivery_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Status Penyaluran</label>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" checked disabled>
            <label class="form-check-label">Registrasi (Otomatis)</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="khitan_received" name="khitan_received">
            <label class="form-check-label">Khitan</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="uang_bingkisan_received" name="uang_bingkisan_received">
            <label class="form-check-label">Uang & Bingkisan</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="fothobooth_received" name="fothobooth_received">
            <label class="form-check-label">Fotobooth</label>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3"></textarea>

    </div>

    <div class="text-center">
        <button class="btn btn-success btn-custom">
            <i class="fas fa-check me-2"></i>Simpan
        </button>
    </div>
</form>



                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const btnCamera = document.getElementById('btnCamera');
    const btnManual = document.getElementById('btnManual');
    const cameraArea = document.getElementById('camera-area');
    const manualWrapper = document.getElementById('manual-input-wrapper');
    const readerId = 'reader';
    const btnStopCamera = document.getElementById('btnStopCamera');
    let scannerInstance = null;



    function showPopup(type, message){
        Swal.fire({icon:type, text:message, timer:2000, showConfirmButton:false});
    }

    const deliveryDateInput = document.querySelector('input[name="delivery_date"]');

    const now = new Date();
    const yyyy = now.getFullYear();
    let mm = now.getMonth() + 1;
    let dd = now.getDate();
    let hh = now.getHours();
    let min = now.getMinutes();


    if(mm < 10) mm = '0' + mm;
    if(dd < 10) dd = '0' + dd;
    if(hh < 10) hh = '0' + hh;
    if(min < 10) min = '0' + min;


    deliveryDateInput.value = `${yyyy}-${mm}-${dd}T${hh}:${min}`;

    function showCamera(){ cameraArea.classList.remove('hidden'); manualWrapper.classList.add('hidden'); }
    function hideCamera(){ cameraArea.classList.add('hidden'); manualWrapper.classList.remove('hidden'); }


    btnCamera.addEventListener('click', ()=>{ showCamera(); startCameraScanner(); });
    btnManual.addEventListener('click', ()=>{ hideCamera(); stopScannerIfAny(); });
    btnStopCamera.addEventListener('click', ()=>{ stopScannerIfAny(); hideCamera(); });


    function startCameraScanner(){
        if(scannerInstance) return;
        scannerInstance = new Html5Qrcode(readerId);
        scannerInstance.start({facingMode:"environment"}, {fps:10, qrbox:250}, qrMessage=>{
            document.getElementById('qr_code').value = qrMessage;
            stopScannerIfAny();
            verifyQr(qrMessage);
        }, err=>{}).catch(err=>{ showPopup('error','Gagal akses kamera, pastikan izin diberikan.'); });
    }
    function stopScannerIfAny(){ if(!scannerInstance) return; scannerInstance.stop().then(()=>{scannerInstance.clear(); scannerInstance=null;}).catch(()=>{scannerInstance=null;}); }


    function verifyQr(qrCode){
        const fd = new FormData();
        fd.append('qr_code', qrCode);
        fetch('{{ route('recipients.verify-qr') }}', { method:'POST', body:fd, headers:{'X-CSRF-TOKEN':csrfToken,'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.json()).then(data=>{
            if(!data.success){ showPopup('error', data.error || 'QR tidak valid!'); return; }
            showPopup('success','QR Berhasil Diverifikasi!');
            document.getElementById('result').classList.remove('hidden');
            const r = data.recipient;
            document.getElementById('recipient_id').value = r.id;
            document.getElementById('recipient_id_2').value = r.id;
            document.getElementById('child_name').value = r.child_name;
            document.getElementById('Ayah_name').value = r.Ayah_name;
            document.getElementById('Ibu_name').value = r.Ibu_name;
            document.getElementById('reference').value = r.reference;
            document.getElementById('wilayah').value = r.wilayah;
            document.getElementById('no_tlp').value = r.no_tlp;
            document.getElementById('address').value = r.address;
document.getElementById('khitan_received').checked = r.khitan_received == 1;
document.getElementById('uang_bingkisan_received').checked = r.uang_bingkisan_received == 1;
document.getElementById('fothobooth_received').checked = r.fothobooth_received == 1;

        }).catch(()=>showPopup('error','Gagal koneksi server!'));
    }


    // FORM MANUAL SUBMIT
    document.getElementById('verifyForm').addEventListener('submit', e=>{
        e.preventDefault();
        const code = document.getElementById('qr_code').value.trim();
        if(!code){ showPopup('warning','Masukkan kode QR terlebih dahulu'); return; }
        verifyQr(code);
    });


    // PENYALURAN SUBMIT
    document.getElementById('distributeForm').addEventListener('submit', e=>{
        e.preventDefault();
        const id = document.getElementById('recipient_id').value;
        fetch(`/recipients/${id}/distribute`, { method:'POST', body:new FormData(e.target), headers:{'X-CSRF-TOKEN':csrfToken,'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.json()).then(data=>{
            if(data.success){ showPopup('success','Penyaluran Berhasil!'); setTimeout(()=>location.reload(),1500); }
            else{ showPopup('warning',data.error ?? 'Terjadi kesalahan'); }
        }).catch(()=>showPopup('error','Gagal koneksi server!'));
    });
    </script>


    @endsection





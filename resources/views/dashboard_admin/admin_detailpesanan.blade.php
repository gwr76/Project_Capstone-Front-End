<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Instrument+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin_wait.css') }}">

    <title>Detail Pesanan - NEXAKUN</title>
</head>

<body>

    <div class="page-overlay"></div>

    <div class="modal-wrapper" id="orderModal">

        <header class="modal-navbar">
            <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN" class="modal-logo">
            <a href="/admin/pesanan" class="modal-close" aria-label="Tutup">
                <i class="fa fa-times"></i>
            </a>
        </header>

        <div class="modal-body">

            <div class="order-header">
                <h1 class="order-title"><span class="text-blue">Detail</span> Pesanan</h1>

                <div class="customer-row">
                    <div class="customer-avatar">
                        <i class="fa fa-user"></i>
                    </div>

                    <div class="customer-info">
                        <strong id="customerName">Andi Pratama</strong>
                        <small id="transactionId">ID Transaksi: TRX001</small>
                    </div>

                    <span class="status-badge" id="statusBadge">Menunggu Verifikasi</span>
                </div>
            </div>

            <section class="detail-section">
                <h2 class="section-heading">
                    <span class="sec-icon"><i class="fa fa-clipboard-list"></i></span>
                    Informasi Pembeli
                </h2>

                <div class="fields-grid">
                    <div class="field-box">
                        <span class="field-label">Nama Pembeli</span>
                        <strong id="buyerName">Andi Pratama</strong>
                    </div>

                    <div class="field-box">
                        <span class="field-label">Email Tujuan</span>
                        <strong id="buyerEmail">Andi@gmail.com</strong>
                    </div>

                    <div class="field-box full-width">
                        <span class="field-label">No WhatsApp</span>
                        <strong id="buyerPhone">081234567801</strong>
                    </div>
                </div>
            </section>

            <section class="detail-section">
                <h2 class="section-heading">
                    <span class="sec-icon"><i class="fa fa-credit-card"></i></span>
                    Informasi Pembayaran
                </h2>

                <div class="payment-box">
                    <div class="payment-left">
                        <div class="payment-field">
                            <span class="field-label">Metode Pembayaran</span>
                            <strong id="paymentMethod">Dana / E-Wallet</strong>
                        </div>
                        <div class="payment-field">
                            <span class="field-label">Total Pembayaran</span>
                            <strong id="paymentTotal">Rp 450.000</strong>
                        </div>
                    </div>

                    <div class="payment-proof-thumb">
                        <img src="{{ asset('images/v273_379.png') }}" alt="Bukti Pembayaran" id="proofImg">
                    </div>

                    <button type="button" class="btn-proof" onclick="openProofModal()">
                        Lihat Bukti <i class="fa fa-check"></i>
                    </button>
                </div>
            </section>

            <section class="detail-section">
                <h2 class="section-heading">
                    <span class="sec-icon"><i class="fa fa-gamepad"></i></span>
                    Informasi Data Akun
                </h2>

                <div class="product-box">
                    <div class="product-desc" id="productDesc">
                        <strong>Deskripsi Produk</strong>
                        <p>Akun game terverifikasi Rekber NEXAKUN.</p>
                    </div>

                    <div class="product-imgs">
                        <img src="{{ asset('images/v1_994.png') }}" alt="Preview akun 1" id="productPreviewImg1">
                        <img src="{{ asset('images/v1_1005.png') }}" alt="Preview akun 2" id="productPreviewImg2">
                    </div>
                </div>
            </section>

            <div class="order-footer">
                <p class="footer-note" id="footerNote">
                    Pastikan semua informasi dan dokumen sudah diperiksa sebelum mengambil keputusan.
                </p>

                <div class="action-row" id="actionButtons">
                    <button type="button" class="btn-send" onclick="openConfirmModal('selesai')">
                        <i class="fa fa-check"></i> Kirim Akun
                    </button>
                    <button type="button" class="btn-reject" onclick="openConfirmModal('ditolak')">
                        <i class="fa fa-times"></i> Tolak
                    </button>
                </div>
            </div>

        </div>

    </div>

    <div class="confirm-modal-overlay" id="confirmOverlay" onclick="closeConfirmModal()">
        <div class="confirm-modal-card" onclick="event.stopPropagation()">
            <h3 class="confirm-modal-title" id="confirmTitle">Konfirmasi Pengiriman</h3>
            <p class="confirm-modal-text" id="confirmText">Kirim akun ke pembeli sekarang?</p>
            <div class="confirm-modal-actions">
                <button type="button" class="btn-confirm-cancel" onclick="closeConfirmModal()">Cancel</button>
                <button type="button" class="btn-confirm-ok" id="confirmOkBtn" onclick="executeOrderDecision()">Oke</button>
            </div>
        </div>
    </div>

    <div class="proof-modal-overlay" id="proofOverlay" onclick="closeProofModal()">
        <div class="proof-modal-box" onclick="event.stopPropagation()">
            <button type="button" class="proof-modal-close" onclick="closeProofModal()"><i class="fa fa-times"></i></button>
            <img src="{{ asset('images/v273_379.png') }}" alt="Bukti Pembayaran" class="proof-modal-img" id="proofModalImg">
        </div>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        const orderId = params.get('id') || 'TRX001';
        const buyerName = params.get('name') || 'Andi Pratama';
        const buyerEmail = params.get('email') || 'Andi@gmail.com';
        const buyerPhone = params.get('phone') || '081234567801';
        const payMethod = params.get('method') || 'Dana / E-Wallet';
        const payTotal = params.get('total') || 'Rp 450.000';
        const productName = params.get('product') || 'PUBG Mobile – Akun Sultan Level 75';
        let statusParam = params.get('status') || 'menunggu';
        let pendingDecision = 'selesai';

        const badge = document.getElementById('statusBadge');
        const actionButtons = document.getElementById('actionButtons');
        const footerNote = document.getElementById('footerNote');

        try {
            const statusMap = JSON.parse(localStorage.getItem('nexakun_admin_order_status') || '{}');
            if (statusMap[orderId]) {
                statusParam = statusMap[orderId];
            }
        } catch (e) {}

        let matchedOrder = null;
        try {
            const historyList = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
            const lastInv = JSON.parse(localStorage.getItem('nexakun_last_invoice') || 'null');
            matchedOrder = historyList.find(item => item.kodeOrder === orderId)
                || (lastInv && lastInv.kodeOrder === orderId ? lastInv : null);

            if (matchedOrder && matchedOrder.buktiFoto) {
                const thumbImg = document.getElementById('proofImg');
                const modalImg = document.getElementById('proofModalImg');
                if (thumbImg) thumbImg.src = matchedOrder.buktiFoto;
                if (modalImg) modalImg.src = matchedOrder.buktiFoto;
            }
        } catch (e) {}

        document.getElementById('customerName').textContent = buyerName;
        document.getElementById('buyerName').textContent = buyerName;
        document.getElementById('transactionId').textContent = 'ID Transaksi: ' + orderId;
        document.getElementById('buyerEmail').textContent = buyerEmail;
        document.getElementById('buyerPhone').textContent = buyerPhone;
        document.getElementById('paymentMethod').textContent = payMethod;
        document.getElementById('paymentTotal').textContent = payTotal;

        function extractCleanAccountTitle(rawTitle) {
            const str = String(rawTitle || '').trim();
            const dashMatch = str.split(/\s*[–—-]\s*/);
            if (dashMatch.length > 1) {
                return dashMatch.slice(1).join(' - ').trim();
            }
            return str;
        }

        function renderMatchedProductInfo(prodTitle, orderObj) {
            const lower = (prodTitle + ' ' + (orderObj?.game || '')).toLowerCase();
            const img1 = document.getElementById('productPreviewImg1');
            const img2 = document.getElementById('productPreviewImg2');
            const descBox = document.getElementById('productDesc');

            let gameLabel = orderObj?.game || 'Game Pilihan';
            let defaultImg1 = '{{ asset("images/v1_994.png") }}';
            let defaultImg2 = '{{ asset("images/v1_1005.png") }}';
            let defaultSpec = 'Akun siap main, login bersih, data lengkap & bergaransi Rekber NEXAKUN.';

            if (lower.includes('mobile legends') || lower.includes('mlbb') || lower.includes('mythic') || lower.includes('ml')) {
                gameLabel = 'Mobile Legends: Bang Bang';
                defaultImg1 = '{{ asset("images/v1_994.png") }}';
                defaultImg2 = '{{ asset("images/v1_1005.png") }}';
                defaultSpec = 'Akun Mobile Legends full skin pilihan, emblem maksimal, rank tinggi, dan bind Moonton/Email bersih.';
            } else if (lower.includes('free fire') || lower.includes('ff') || lower.includes('s8') || lower.includes('evo gun') || lower.includes('m1014')) {
                gameLabel = 'Free Fire';
                defaultImg1 = '{{ asset("images/v1_1165.png") }}';
                defaultImg2 = '{{ asset("images/v1_1187.png") }}';
                defaultSpec = 'Akun Free Fire koleksi bundle langka, skin senjata permanen, dan login siap pindah tangan.';
            } else if (lower.includes('pubg')) {
                gameLabel = 'PUBG Mobile';
                defaultImg1 = '{{ asset("images/v1_693.png") }}';
                defaultImg2 = '{{ asset("images/v1_704.png") }}';
                defaultSpec = 'Akun PUBG Mobile koleksi outfit Mythic, senjata upgradeable, dan akun bersih siap amankan.';
            }

            const preview1 = (orderObj && orderObj.fotoProduk) ? orderObj.fotoProduk : defaultImg1;
            const preview2 = (orderObj && orderObj.fotoProduk2)
                ? orderObj.fotoProduk2
                : (orderObj && orderObj.fotoProduk ? orderObj.fotoProduk : defaultImg2);
            const specText = (orderObj && orderObj.deskripsiProduk) ? orderObj.deskripsiProduk : defaultSpec;

            if (img1) {
                img1.src = preview1;
                img1.onerror = () => { img1.src = defaultImg1; };
            }
            if (img2) {
                img2.src = preview2;
                img2.onerror = () => { img2.src = defaultImg2; };
            }

            if (descBox) {
                descBox.innerHTML = `
                    <strong>Deskripsi Produk (${gameLabel})</strong>
                    <p>${specText}</p>
                    <p>Nama Produk: ${prodTitle}</p>
                    <p>Penjual: ${orderObj?.penjual || 'NEXAKUN Official Store'}</p>
                    <p>Harga Pembayaran: ${payTotal}</p>
                    <p>Email Penerima Akun: ${buyerEmail}</p>
                `;
            }
        }

        renderMatchedProductInfo(productName, matchedOrder);

        function applyStatusUI(status) {
            badge.className = 'status-badge';
            if (status === 'selesai') {
                badge.textContent = 'Selesai';
                badge.classList.add('badge-done');
                actionButtons.style.display = 'none';
                footerNote.textContent = 'Data akun telah dikirim secara manual lewat email oleh Admin.';
            } else if (status === 'ditolak') {
                badge.textContent = 'Ditolak';
                badge.classList.add('badge-rejected');
                actionButtons.style.display = 'none';
                footerNote.textContent = 'Pesanan telah ditolak oleh Admin.';
            } else {
                badge.textContent = 'Menunggu Verifikasi';
                badge.classList.add('badge-waiting');
            }
        }

        applyStatusUI(statusParam);

        function openConfirmModal(decision) {
            pendingDecision = decision;
            const titleEl = document.getElementById('confirmTitle');
            const textEl = document.getElementById('confirmText');
            const okBtn = document.getElementById('confirmOkBtn');

            if (decision === 'selesai') {
                titleEl.textContent = 'Konfirmasi Pengiriman';
                textEl.textContent = 'Kirim akun ke pembeli sekarang?';
                okBtn.textContent = 'Oke';
                okBtn.classList.remove('reject-mode');
            } else {
                titleEl.textContent = 'Konfirmasi Penolakan';
                textEl.textContent = 'Tolak pesanan ini?';
                okBtn.textContent = 'Tolak';
                okBtn.classList.add('reject-mode');
            }

            document.getElementById('confirmOverlay').classList.add('active');
        }

        function closeConfirmModal() {
            document.getElementById('confirmOverlay').classList.remove('active');
        }

        function executeOrderDecision() {
            try {
                const statusMap = JSON.parse(localStorage.getItem('nexakun_admin_order_status') || '{}');
                statusMap[orderId] = pendingDecision;
                localStorage.setItem('nexakun_admin_order_status', JSON.stringify(statusMap));

                const cleanTitle = extractCleanAccountTitle(productName);
                const prodId = matchedOrder?.idProduk || '';

                const buyerHistory = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
                const idx = buyerHistory.findIndex(item => item.kodeOrder === orderId);
                if (idx !== -1) {
                    buyerHistory[idx].status = pendingDecision === 'selesai' ? 'selesai' : 'batal';
                    buyerHistory[idx].akunEmail = `${orderId.toLowerCase().replace(/[^a-z0-9]/g, '')}_buyer@gmail.com`;
                    buyerHistory[idx].akunPassword = `Nexakun#${orderId.replace(/[^A-Za-z0-9]/g, '')}`;
                    localStorage.setItem('nexakun_order_history', JSON.stringify(buyerHistory));
                }

                if (pendingDecision === 'selesai') {
                    const delivered = JSON.parse(localStorage.getItem('nexakun_delivered_accounts') || '[]');
                    delivered.unshift({
                        kodeOrder: orderId,
                        idProduk: prodId,
                        namaProduk: productName,
                        namaAkunBersih: cleanTitle,
                        pembeli: buyerName,
                        emailTujuan: buyerEmail,
                        akunEmail: `${orderId.toLowerCase().replace(/[^a-z0-9]/g, '')}_buyer@gmail.com`,
                        akunPassword: `Nexakun#${orderId.replace(/[^A-Za-z0-9]/g, '')}`,
                        waktuKirim: new Date().toLocaleString('id-ID')
                    });
                    localStorage.setItem('nexakun_delivered_accounts', JSON.stringify(delivered));

                    // Hapus juga dari daftar produk baru yang diposting penjual jika cocok
                    const uploadedList = JSON.parse(localStorage.getItem('nexakun_uploaded_products') || '[]');
                    const filteredUploaded = uploadedList.filter(p => {
                        const pId = String(p.id || '').toLowerCase().trim();
                        const pTitle = String(p.title || p.nama || '').toLowerCase().trim();
                        if (prodId && pId === String(prodId).toLowerCase().trim()) return false;
                        if (pTitle && (pTitle === productName.toLowerCase().trim() || pTitle === cleanTitle.toLowerCase().trim())) return false;
                        return true;
                    });
                    localStorage.setItem('nexakun_uploaded_products', JSON.stringify(filteredUploaded));
                }
            } catch (e) {}

            closeConfirmModal();
            applyStatusUI(pendingDecision);
            window.location.href = 'admin_pesanan.html';
        }

        function openProofModal() { document.getElementById('proofOverlay').classList.add('active'); }
        function closeProofModal() { document.getElementById('proofOverlay').classList.remove('active'); }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                closeProofModal();
                closeConfirmModal();
            }
        });
    </script>

</body>

</html>
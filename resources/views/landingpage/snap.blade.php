<h1>Halaman Pembayaran Midtrans</h1>

@if (session('pesanan'))
    <p>Nomor Pesanan: {{ session('pesanan')->id }}</p>
    <p>Total Pembayaran: Rp{{ session('pesanan')->total }}</p>
@endif

<!-- Tambahkan kode JavaScript untuk memanggil Snap Midtrans -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"></script>
<script>
    // Panggil Snap Midtrans dengan mengirimkan snapToken
    snap.pay('{{ $snapToken }}');
</script>
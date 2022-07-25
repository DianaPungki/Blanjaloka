<section class="mt-0">
    <div class="container d-flex flex-wrap p-2 shadow-tebel-bawah">
        <button onclick="window.location.href = '{{ url('/order') }}'" type="button" class="btn mx-1 rounded-pill mb-xl-0 mb-2 notif-active">Belum Bayar</button>
        <button onclick="window.location.href = '{{ url('/order/dikemas') }}'" type="button" class="btn cai-border cai-color-text mx-1 rounded-pill mb-xl-0 mb-2">Dikemas</button>
        <button onclick="window.location.href = '{{ url('/order/dikirim') }}'"type="button" class="btn cai-border cai-color-text mx-1 rounded-pill mb-xl-0 mb-2">Dikirim</button>
        <button onclick="window.location.href = '{{ url('/order/selesai') }}'" type="button" class="btn cai-border cai-color-text mx-1 rounded-pill mb-xl-0 mb-2">Selesai</button>
    </div>
</section>
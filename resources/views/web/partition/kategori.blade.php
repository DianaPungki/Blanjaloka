<section>
    <div class="container" id="kategori">
        <h3 class="mb-3">Kategori</h3>
        <div class="d-flex justify-content-between justify-content-xl-between flex-wrap">
            
            @foreach ( $kategori as $k)
                <a href="{{ url('kategori/' . $k->id_kategori) }}">
                    <div class="kategori-card mb-2 card py-3">
                        <img src="{{ asset('assets/admin/icon_kategoriproduk/' . $k->icon_kategori) }}" class="mx-auto mb-1" alt="...">
                        <p class="card-text text-center">{{ $k->nama_kategori }}</p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>
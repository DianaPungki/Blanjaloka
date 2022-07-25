@extends('web.master')
@section('content')
    
    @include('web.partition.banner')
    
    <section>
        <div class="container">
            <h3 class="mb-3">Pesanan Saya</h3>
        </div>
    </section>
    
    @include('web.pembeli.pesanan.navbar_pesanan')

    <section>
        <div class="container">
            <div class="row">

                <form id="addform">
                    {{csrf_field()}}
                <div class="card-body">
                    <table class="table table-striped table-hover" id="produktable">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Toko</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th style="width:10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $no => $k)
                            @php
                                $fotoproduk = explode(',', $k->foto_produk);
                            @endphp
                                <tr>
                                    <td style="vertical-align: middle;" class="text-center">{{ $no + 1 }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img src="{{asset('assets/admin/foto_produk/'.$fotoproduk[0])}}" alt="" width="70" height="70">
                                            </div>
                                            <div class="col-sm ml-4">
                                               
                                                    {{ $k->nama_produk }}
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        @if($k->potongan_harga == 0)
                                            Rp. {{ $k->harga }}
                                        @else
                                            <del>Rp. {{number_format($k->harga, 0, '.', '.')}}</del> <br>
                                            Rp. {{number_format($k->harga - $k->potongan_harga, 0, '.', '.')}} <i><small class="text-danger text-bold">(Diskon {{number_format($k->potongan_harga / $k->harga * 100, 0, '.', '')}}%)</small></i>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">{{ $k->nama_toko }}</td>
                                    <td style="vertical-align: middle;">
                                        {{ $k->kuantitas . ' ' . ucfirst(strtolower($k->nama_satuan))}}
                                    </td>
                                    <td style="vertical-align: middle;">Rp. {{ number_format(($k->harga - $k->potongan_harga) * $k->kuantitas, 0, '.', '.') }}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ url('order/hapus/' . $k->id_orderitems) }}" data-toggle="tooltip" title="Hapus" data-placement="top"><i class="tombol-hapus fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $total += (($k->harga - $k->potongan_harga) * $k->kuantitas);
                                @endphp
                                @endforeach
                                
                                <tr>
                                    <td colspan="5" style="text-align: right;font-weight:bold">Total Bayar</td>
                                    <td colspan="2" style="font-weight:bold">Rp. {{ number_format($total, 0, '.', '.') }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="pay-button">                    
                        <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                        Bayar Sekarang
                    </button>
                </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();
 
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.spinner').hide();

            $('[data-toggle="tooltip"]').tooltip();

            $('#produktable').DataTable({
                "responsive": true
            });

            $('#parent').click(function(){
            
                $('.child').prop('checked', this.checked);
            });

            $('.child').click(function() {
                if ($('.child:checked').length == $('.child').length) {
                    $('#parent').prop('checked', true);
                } else {
                    $('#parent').prop('checked', false);
                }
            });

            $('#addform').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: "{{url('order')}}",
                    type: "POST",
                    data: $(this).serialize(),
                    beforeSend: function(){
                        $('.spinner').show();
                    },
                    complete: function(){
                        $('.spinner').hide();
                    },
                    success: function(data){
                        swal(data.message)
                        .then((result) => {
                            $('#addform').trigger('reset');
                            window.location.href = "{{ url('order')}}";
                        });
                    },
                    error: function(error){
                        console.log(error);
                    }
                });

        });

        });
    </script>
    
@endsection
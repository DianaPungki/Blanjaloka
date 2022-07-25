@extends('admin.master-admin')
@section('content')
    @php use Illuminate\Support\Facades\DB; @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Satuan Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Satuan Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        Data Satuan Produk

                        <div class="float-right d-none d-sm-inline-block">
                            <a href="#" data-toggle="modal" data-target="#addmodal"
                                class="btn btn-primary btn-sm">Tambah</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="satuantable">
                            <thead>
                                <tr>
                                    <th style="width:10px;">No</th>
                                    <th>Kategori</th>
                                    <th style="width: 120px">Total Produk</th>
                                    <th style="width:10px;" class='notexport'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($satuan as $no => $k)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $k->nama_satuan }}</td>
                                        <td>{{count(DB::table('produk')->where('id_satuanproduk', $k->id_satuanproduk)->get()).' Produk'}}</td>
                                        <td class="text-center">
                                            <a href="#" data-id="<?= $k->id_satuanproduk ?>" class="edit" data-toggle="tooltip" title="Edit" data-placement="top">
                                                <span class="badge badge-success"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a href="#" data-id="<?= $k->id_satuanproduk ?>" class="delete" data-toggle="tooltip" title="Hapus" data-placement="top">
                                                <span class="badge badge-danger"><i class="fas fa-trash"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>

    {{-- Modal Tambah Satuan --}}

    <div class="modal fade" id="addmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Satuan Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahform" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama_satuan" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_satuan"
                                    placeholder="Masukkan Satuan Misal : gram" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Satuan --}}

    <div class="modal fade" id="editmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Satuan Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editform" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_satuanproduk" id="id_satuanproduk">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama_satuan" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_satuan" id="nama_satuan"
                                    placeholder="Satuan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.spinner').hide();

            $('[data-toggle="tooltip"]').tooltip();

            $('#satuantable').DataTable({
                "responsive": true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-success btn-sm active',
                        exportOptions: {
                            columns: ':not(.notexport)'
                        }

                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-success',
                        exportOptions: {
                            columns: ':not(.notexport)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        className: 'btn btn-success btn-sm active',
                        exportOptions: {
                            columns: ':not(.notexport)'
                        }

                    },

                ],
            });

            //----------------------------

            // insert form
            $('#tambahform').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ url('admin/produk/satuan/insert') }}",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.spinner').show();
                    },
                    complete: function() {
                        $('.spinner').hide();
                    },
                    success: function(data) {
                        swal(data.pesan)
                            .then((result) => {
                                location.reload();
                            });
                    },
                    error: function(err) {
                        alert(err);
                    }
                })
            });

            //-------------------------------------

            //show modal update form 
            $('.edit').click(function(e) {
                e.preventDefault();
                $.ajax({
                    data: {
                        'id_satuanproduk': $(this).data('id'),
                        '_token': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    url: "{{ url('admin/produk/satuan/get') }}",
                    success: function(data) {
                        $('#id_satuanproduk').val(data[0].id_satuanproduk);
                        $('#nama_satuan').val(data[0].nama_satuan);

                        $('#editmodal').modal('show');
                    },
                    error: function(err) {
                        alert(err);
                        console.log(err);
                    }
                });
            });


            //----------------------------------------
            // edit form
            $('#editform').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ url('admin/produk/satuan/update') }}",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.spinner').show();
                    },
                    complete: function() {
                        $('.spinner').hide();
                    },
                    success: function(data) {
                        swal(data.pesan)
                            .then((result) => {
                                location.reload();
                            });
                    },
                    error: function(err) {
                        alert(err);
                    }
                })
            });

            //----------------------------------------------
            // hapus form
            $('.delete').click(function(e) {
                e.preventDefault();
                var confirmed = confirm('Hapus Satuan Produk Ini ?');

                if (confirmed) {

                    $.ajax({
                        data: {
                            'id_satuanproduk': $(this).data('id'),
                            '_token': "{{ csrf_token() }}"
                        },
                        type: 'POST',
                        url: "{{ url('admin/produk/satuan/delete') }}",
                        success: function(data) {
                            swal(data.pesan)
                                .then((result) => {
                                    location.reload();
                                });
                        },
                        error: function(err) {
                            alert(err);
                            console.log(err);
                        }
                    });
                }
            });

        });
    </script>

@endsection

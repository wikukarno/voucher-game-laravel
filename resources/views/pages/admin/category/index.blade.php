@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Kategori</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_category" class="table table-hover scroll-horizontal-vertical w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $('#tb_category').DataTable({
        processing: true,
        serverSide: true,
        ordering: [[1, 'asc']],
        ajax: {
        url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });

    function btnDeleteCategory(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus kategori ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('category.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire(
                            "Berhasil!",
                            "Kategori berhasil dihapus",
                            "success"
                        )
                        $("#tb_category").DataTable().ajax.reload();
                    }
                });
            }
        })
    }

    // $("#form-delete-category").submit(function (e) {
    //         e.preventDefault();
    //         var id = $("input[name=id]").val();

    //         Swal.fire({
    //             title: "Apakah anda yakin?",
    //             text: "Ingin menghapus surat ini?",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#3085d6",
    //             cancelButtonColor: "#d33",
    //             confirmButtonText: "Ya, Hapus!",
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     url: "#",
    //                     type: "POST",
    //                     data: {
    //                         id: id,
    //                         _token: "' . csrf_token() . '"
    //                     },
    //                     success: function (data) {
    //                         Swal.fire(
    //                             "Berhasil!",
    //                             "Surat berhasil dihapus",
    //                             "success"
    //                         )
    //                         $("#tb_sku_user_belum_diproses").DataTable().ajax.reload();
    //                         $("#tb_sku_user_ditolak").DataTable().ajax.reload();
    //                         $("#tb_sku_user_sedang_diproses").DataTable().ajax.reload();
    //                         $("#tb_sku_user_selesai_diproses").DataTable().ajax.reload();
    //                     }
    //                 });
    //             }
    //         })
    //     });
</script>
@endpush
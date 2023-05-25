@extends('layouts.app')

@section('title', 'Voucher')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Voucher</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('voucher.create') }}" class="btn btn-primary">Tambah Voucher</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_voucher" class="table table-hover scroll-horizontal-vertical w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
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
    $('#tb_voucher').DataTable({
        processing: true,
        serverSide: true,
        ordering: [[1, 'asc']],
        ajax: {
        url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'categories_id', name: 'categories_id' },
            { data: 'status', name: 'status' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });

    function btnDeleteVoucher(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus voucher ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('voucher.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire(
                            "Berhasil!",
                            "Voucher berhasil dihapus",
                            "success"
                        )
                        $("#tb_voucher").DataTable().ajax.reload();
                    }
                });
            }
        })
    }
</script>
@endpush
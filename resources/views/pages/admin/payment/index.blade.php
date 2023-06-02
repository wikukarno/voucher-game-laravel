@extends('layouts.app')

@section('title', 'Jenis Pembayaran')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Jenis Pembayaran</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('payment.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_payment" class="table table-hover scroll-horizontal-vertical w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tipe pembayaran</th>
                                    <th>Bank</th>
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

    // this for datatable
    $('#tb_payment').DataTable({
        processing: true,
        serverSide: true,
        ordering: [[1, 'asc']],
        ajax: {
        url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'type', name: 'type' },
            { data: 'banks_id', name: 'banks_id' },
            { data: 'status', name: 'status' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });

    // this function is for delete payment
    function btnDeletePayment(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus payment ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('payment.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire(
                            "Berhasil!",
                            "Payment berhasil dihapus",
                            "success"
                        )
                        $("#tb_payment").DataTable().ajax.reload();
                    }
                });
            }
        })
    }
</script>
@endpush
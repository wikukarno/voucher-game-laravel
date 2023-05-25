@extends('layouts.app')

@section('title', 'Nominal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Nominal</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('nominal.create') }}" class="btn btn-primary">Tambah Nominal</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_nominal" class="table table-hover scroll-horizontal-vertical w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Koin</th>
                                    <th>Jumlah Koin</th>
                                    <th>Harga Koin</th>
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
    $('#tb_nominal').DataTable({
        processing: true,
        serverSide: true,
        ordering: [[1, 'asc']],
        ajax: {
        url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'coinName', name: 'coinName' },
            { data: 'coinQuantity', name: 'coinQuantity' },
            { data: 'price', name: 'price' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });

    function btnDeleteNominal(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus nominal ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('nominal.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire(
                            "Berhasil!",
                            "Nominal berhasil dihapus",
                            "success"
                        )
                        $("#tb_nominal").DataTable().ajax.reload();
                    }
                });
            }
        })
    }
</script>
@endpush
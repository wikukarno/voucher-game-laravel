@extends('layouts.app')

@section('title', 'Bank')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Bank</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('bank.create') }}" class="btn btn-primary">Tambah bank</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_bank" class="table table-hover scroll-horizontal-vertical w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Rekening</th>
                                    <th>Nomor rekening</th>
                                    <th>Nama Bank</th>
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
    $('#tb_bank').DataTable({
        processing: true,
        serverSide: true,
        ordering: [[1, 'asc']],
        ajax: {
        url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'users_id', name: 'users_id' },
            { data: 'norek', name: 'norek' },
            { data: 'bankname', name: 'bankname' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });

    // this function is for delete bank
    function btnDeleteBank(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus bank ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('bank.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire(
                            "Berhasil!",
                            "Bank berhasil dihapus",
                            "success"
                        )
                        $("#tb_bank").DataTable().ajax.reload();
                    }
                });
            }
        })
    }
</script>
@endpush
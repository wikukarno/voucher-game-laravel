@extends('layouts.app')

@section('title', 'Edit jenis pembayaran')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit jenis pembayaran</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <form action="{{ route('payment.update', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type">Tipe</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        name="type" placeholder="Masukkan type" value="{{ $payment->type }}" />
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="banks_id">Nama bank</label>
                                    <select name="banks_id" id="banks_id" class="form-select">
                                        <option value="{{ $payment->id }}">{{ $payment->bank->bankname }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('payment.index') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary" id="btnSavePayment" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $(document).ready(function () {
            $('#btnSavePayment').click(function () {
                $(this).html('Menyimpan...');
            });
        });
</script>
@endpush
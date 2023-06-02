@extends('layouts.app')

@section('title', 'Tambah bank')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Tambah bank</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <form action="{{ route('bank.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama Rekening</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Masukkan nama rekening" value="{{ old('name') }}" />
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="norek">Nomor rekening</label>
                                    <input type="number" class="form-control @error('norek') is-invalid @enderror"
                                        name="norek" placeholder="Masukkan nomor rekening" value="{{ old('norek') }}" />
                                    @error('norek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                    <label for="bankname">Nama bank</label>
                                    <select name="bankname" id="bankname" class="form-select">
                                        <option value="">Pilih bank</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BSI">BSI</option>
                                        <option value="Jago">Jago</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="Maybank">Maybank</option>
                                        <option value="Permata">Permata</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('bank.index') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary" id="btnSaveBank" type="submit">Simpan</button>
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
            $('#btnSaveNominal').click(function () {
                $(this).html('Menyimpan...');
            });
        });
    </script>
@endpush
@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Tambah Kategori</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <form action="{{ route('nominal.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="coinName">Nama koin</label>
                                    <input type="text" class="form-control @error('coinName') is-invalid @enderror" name="coinName"
                                        placeholder="Masukkan nama koin" value="{{ old('coinName') }}" />
                                    @error('coinName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="coinQuantity">Jumlah koin</label>
                                    <input type="text" class="form-control @error('coinQuantity') is-invalid @enderror" name="coinQuantity"
                                        placeholder="Masukkan jumlah koin" value="{{ old('coinQuantity') }}" />
                                    @error('coinQuantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="price">Harga koin</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                        placeholder="Masukkan harga koin" value="{{ old('price') }}" />
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('nominal.index') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary" id="btnSaveNominal" type="submit">Simpan</button>
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
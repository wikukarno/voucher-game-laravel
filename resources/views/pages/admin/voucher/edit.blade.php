@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Kategori</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <form action="{{ route('nominal.update', $item) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="coinName">Nama koin</label>
                                    <input type="text" class="form-control @error('coinName') is-invalid @enderror" name="coinName"
                                        placeholder="Masukkan nama koin" value="{{ $item->coinName }}" />
                                    @error('coinName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="coinQuantity">Nama kategori</label>
                                    <input type="text" class="form-control @error('coinQuantity') is-invalid @enderror" name="coinQuantity"
                                        placeholder="Masukkan nama kategori" value="{{ $item->coinQuantity }}" />
                                    @error('coinQuantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="price">Nama kategori</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                        placeholder="Masukkan nama harga koin" value="{{ $item->price }}" />
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
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary" id="btnSaveCategory" type="submit">Simpan</button>
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
            $('#btnSaveCategory').click(function () {
                $(this).html('Menyimpan...');
            });
        });
    </script>
@endpush
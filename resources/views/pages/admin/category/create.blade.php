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
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Masukkan nama kategori" value="{{ old('name') }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
@extends('layouts.app')

@section('title', 'Edit Voucher')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Voucher</h1>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <form action="{{ route('voucher.update', $voucher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama game</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Masukkan nama game" value="{{ $voucher->name }}" />
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="categories_id">Kategori</label>
                                    <select name="categories_id" id="categories_id" class="form-select">
                                        @forelse ( $categories as $category )
                                        <option value="{{ $category->id }}" @if ($category->id == $voucher->categories_id)
                                            selected
                                            @endif>{{ $category->name }}</option>
                                        @empty
                                        <option value="">Tidak ada kategori</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nominals_id">Nominal</label>
                                    <select name="nominals_id" id="nominals_id" class="form-select">
                                        @forelse ($nominals as $nominal)
                                            <option value="{{ $nominal->id }}" @if ($nominal->id == $voucher->nominals_id)
                                                selected
                                                @endif>{{ $nominal->coinName }}</option>
                                        @empty
                                            <option value="">Tidak ada nominal</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="thumbnail">Gambar</label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        name="thumbnail" />
                                    @error('thumbnail')
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
@extends('layouts.auth')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('backend/img/logo.png') }}" alt="logo"
                                        class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form method="POST" id="form-login">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email"
                                            placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password"
                                            placeholder="Enter your password" />
                                        <small>
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="form-check-label">
                                                Remember me next time
                                            </span>
                                        </label>
                                    </div>
                                    <div class="d-grid mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnLogin">Sign in</button>
                                    </div>
                                    {{-- <div class="text-center mt-3">
                                        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('after-script')
    <script>
        $('#form-login').submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('login') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#btnLogin').attr('disabled', true);
                    $('#btnLogin').html('<i class="fa fa-spin fa-spinner"></i> Processing...');
                },
                success: function(res){
                    window.location.href = "{{ route('admin.dashboard') }}";
                },
                error: function(xhr, ajaxOptions, thrownError){
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message
                    });
                    $('#btnLogin').attr('disabled', false);
                    $('#btnLogin').html('Sign in');
                }
            });
        })
    </script>
@endpush

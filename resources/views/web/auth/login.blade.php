@extends('Layout.auth')

@section('content')
    <livewire:form.login-form />
@endsection

@section('links')
    <div class="row">
        <div class="col-12 text-center">
            <p class="text-dark-emphasis">Tidak punya akun? <a href="{{ route('register') }}"
                    class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Daftar</b></a>
            </p>
        </div> <!-- end col -->
    </div>
@endsection

<div class="col-lg-6">
    <div class="d-flex flex-column h-100">
        <div class="auth-brand p-4">
            <a href="index.html" class="logo-light">
                <img src="assets/images/logo.png" alt="logo" height="22">
            </a>
            <a href="index.html" class="logo-dark">
                <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
            </a>
        </div>
        <div class="p-4 my-auto">
            <h4 class="fs-20">Sign In</h4>
            <p class="text-muted mb-3">Masukan Username dan password untuk masuk ke akun anda.
            </p>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <!-- form -->
            <form wire:submit.prevent='submit'>
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">email</label>
                    <input class="form-control" type="email" placeholder="email" wire:model='email'>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <a href="auth-forgotpw.html" class="text-muted float-end"><small>Forgot
                            your
                            password?</small></a>
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" wire:model='password' placeholder="Enter your password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0 text-start">
                    <button class="btn btn-soft-primary w-100" type="submit"><i class="ri-login-circle-fill me-1"></i>
                        <span class="fw-bold">Log
                            In</span> </button>
                </div>
            </form>
            <!-- end form-->
        </div>
    </div>
</div> <!-- end col -->

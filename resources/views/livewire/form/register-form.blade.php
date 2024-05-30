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
            <h4 class="fs-20">Free Sign Up</h4>
            <p class="text-muted mb-3">Enter your email address and password to access
                account.</p>

            <!-- form -->
            <form wire:submit.prevent='submit'>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input class="form-control" type="text" id="fullname" wire:model='name'>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" wire:model='email'>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" wire:model='password'>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Confirmation</label>
                    <input class="form-control" type="password" wire:model='password_confirmation'>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-0 d-grid text-center">
                    <button class="btn btn-primary fw-semibold" type="submit">Daftar</button>
                </div>
            </form>
            <!-- end form-->
        </div>
    </div>
</div> <!-- end col -->

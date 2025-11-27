@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="d-flex justify-content-between w-100 flex-wrap mb-4">
        <div>
            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk mengubah profil user, termasuk foto profil dan password.</p>
        </div>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Avatar & Info -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="text-center mb-3">
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                             class="rounded-circle mb-2" style="width:80px; height:80px;" alt="Avatar">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mb-2"
                                             style="width:80px; height:80px;">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                    @endif
                                    <input type="file" name="avatar" class="form-control form-control-sm">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ old('name', $user->name) }}" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru (Opsional)</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.base')


@section('content')

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card text-left p-2 w-75">
            <div class="card-header">
                <h2 class="text-center">Register</h2>
            </div>

            <form action="{{ route('signup') }}" method="POST" role="form text-left">
                <div class="card-body">
                
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Fullname</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="fullname">
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="xxxxxxxxxx">
                        @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password">
                    </div>
                    <div class="mb-3">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ old('rfc') }}" placeholder="RFC">
                        @error('rfc') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"> {{ old('notes') }}</textarea>
                    </div>

                </div> <!-- /. card-body -->
                <div class="card-footer text-muted">
                    <!-- buttons -->
                    <div class="row gap-2 gap-md-0">
                        <div class="col-sm-6 col-md-6 d-grid">
                            <button type="submit" class="btn btn-block btn-outline-primary">register</button>
                        </div>  
                        <div class="col-sm-6 col-md-6 d-grid">
                            <a href="{{ route('welcome') }}" class="btn btn-block btn-outline-danger">cancel</a>
                        </div>
                    </div>
                    <!-- /. buttons -->
                </div> <!-- /. card-footer -->
            </form>
        </div>
    </div>

@endsection
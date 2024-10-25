@extends('layout.base')


@section('content')

    <div id="login_app">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card text-left p-2 w-50">
                <div class="card-header">
                    <h2 class="text-center">LOGIN</h2>
                </div>

                <form action="{{ route('authenticate') }}" method="POST" role="form text-left">
                    <div class="card-body">
                        @csrf

                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="password-addon" role="button" v-on:click="toggle_password">
                                    <i v-if="!show_password" class="bi bi-eye"></i>
                                    <i v-if="show_password" class="bi bi-eye-slash"></i>
                                </span>
                                <input class="form-control" id="password" name="password" placeholder="password"
                                :type="show_password ? 'text' : 'password'" aria-label="password" aria-describedby="password-addon">
                            </div>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                    </div> <!-- /. card-body -->
                    <div class="card-footer text-muted">
                        <!-- buttons -->
                        <div class="row gap-2 gap-md-0">
                            <div class="col-sm-6 col-md-6 d-grid">
                                <button type="submit" class="btn btn-block btn-outline-primary">login</button>
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
    </div>

    <script type="module" src="{{ asset('js/scripts/login_app.js') }}"></script>

@endsection
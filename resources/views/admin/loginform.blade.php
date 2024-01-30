@extends('layouts.reglog')
@section('topline','Genesis-BD Admin Panel')
@section('content')

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Genesis-BD Admin Panel</h1>
                                    </div>
                                    <form action="{{route('admin.login')}}" method="POST">
                                    @csrf
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger">
                                              <i class="fas fa-exclamation-triangle"></i> {{Session::get('error')}}
                                        </div>
                                    @endif
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                              <i class="fas fa-check"></i> {{Session::get('success')}}
                                        </div>
                                    @endif

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="mail"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Sign In
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

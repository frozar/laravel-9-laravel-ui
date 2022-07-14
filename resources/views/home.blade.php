@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @guest
                            {{ __('You are in guest mode!') }}
                        @else
                            {{ __('You are logged in!') }}
                            @if (auth()->user()->type == 1)
                                <a href="{{ url('admin/routes') }}">Admin</a>
                            @else
                                @if (auth()->user()->type == 2)
                                    <div class=”panel-heading”>Manager User</div>
                                    <a href="{{ url('manager/routes') }}">Manager</a>
                                @else
                                    <div class=”panel-heading”>Normal User</div>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

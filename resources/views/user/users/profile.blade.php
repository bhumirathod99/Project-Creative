@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class=" col-md-5 text-md-right"><img src="{{ asset('storage/images/users/'.auth()->user()->image)}}" class="rounded-circle text-md-right" width="150" height="150"></div>
                        <label for="name" class="col-md-7 col-form-label text-md-left mt-3">
                            <h4><b>{{ auth()->user()->name }}</b></h4>
                            <p>{{ auth()->user()->email }}</p>
                            <br>
                        </label>

                    </div>
                    <hr>
                    <div class="form-group row">
                       <h5 class="text-uppercase m-auto">My Project</h5>
                       <div class="container mt-5">
                        <div class="row justify-content-center">
                        @foreach(auth()->user()->projects as $project)
                        <div class="col-4">
                            <div class="card text-center">
                              <div class="card-header bg-dark text-white">
                                <a href="{{ route('user.projects.show',Crypt::encryptString($project->id)) }}" class="text-white text-decoration">{{ $project->name }}</a>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title mb-4">BUDGET : <b>&nbsp;Rs {{ $project->budget }} </b></h5><hr>
                                <p class="card-text">{{ substr($project->detail,0,75) }} ...</p>
                                <hr>
                                <a href="#" class="text-muted">Vendor : {{ $project->user->name}}</a>
                              </div>
                              <div class="card-footer text-muted">
                                {{ $project->created_at->diffForHumans() }}
                              </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

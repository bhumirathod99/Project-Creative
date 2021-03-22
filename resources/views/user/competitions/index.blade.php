@extends('layouts.user')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		@foreach($competitions as $competition)
		@if($competition->user_id != Auth::id())
		<div class="col-4">
			<div class="card text-center">
			  <div class="card-header bg-dark text-white">
			    <a href="{{ route('user.projects.show',Crypt::encryptString($competition->id)) }}" class="text-white text-decoration">{{ $competition->name }}</a>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title mb-4">PROJECT BUDGET : <b>&nbsp;Rs {{ $competition->project->budget }} </b></h5><hr>
			    <p class="card-text">Registration Last Date {{ $competition->registration_last_date}}</p>
			    <hr>
			    Skills : 
			    @foreach($competition->project->skills as $skill)
			    	{{ $skill->skill->skill }},
			    @endforeach
			    <hr>
			    
			    <hr>
			    {{ $competition->created_at->diffForHumans() }}
			  </div>
			  <div class="card-footer text-muted">
			    <a href="{{ route('user.competitions.show',Crypt::encryptString($competition->id ))}}" class="btn btn-dark">Show More Detail</a>
			  </div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>	
@endsection
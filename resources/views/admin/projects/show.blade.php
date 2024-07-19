@extends('layouts.app')

@section('content')

<div class="project-show p-5">
    <div class="container">
        <a href="{{route('admin.projects.index') }}">{{ __('Indietro')}}"></a>
        <div class="card p-4">
            <h2>{{$project->title}}</h2>
        </div>
    </div>
</div>
    
@endsection
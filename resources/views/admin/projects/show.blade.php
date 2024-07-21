@extends('layouts.app')

@section('content')

<div class="project-show p-5">
    <div class="container">
        <div class="button-manage">
            <div class="back">
                <a href="{{route('admin.projects.index') }}">{{ __('Indietro')}}</a>
            </div>
            <div class="manage">
                <a href="{{route('admin.projects.update', $project)}}" class="ml-45 mr-10">
                    <i class="fas fa-pen"></i>
                </a>
                <a href="{{route('admin.projects.destroy', $project)}}">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>

        <div class="card p-5">
            <h2>{{$project->title}}</h2>
            <hr class="mb-5">
            <p>
                <span>Qualit&agrave; del Progetto: </span>{{$project->project_grade}} su 10 
                <i class="fas fa-circle"></i> 
                <span>Categoria: </span>{{$project->market_category}}
            </p>
            <p>
                <span>Materiale Creato: </span>{{$project->material_created}}
                <i class="fas fa-circle"></i> 
                <span>Tecnologia Usata: </span>{{$project->technologies_used}}
            </p>
            <p>
                <span>Descrizione: </span>{{$project->description}}
            </p>
            <p>
                <span>Collaborazione: </span>
                {{$project->collaborations}}
            </p>
            <p>
                <span>Inizio Progetto: </span>{{ Carbon::parse($project->start_project)->format('d.m.Y') }}
                <i class="fas fa-circle"></i>
                <span>Fine Progetto: </span>{{ Carbon::parse($project->start_project)->format('d.m.Y') }}
            </p>
            <p>
                <span>Link Progetto: </span> 
                <a class="no-btn" href="{{$project->link}}" target="_blank">{{$project->link}}</a>
            </p>
        </div>
    </div>
</div>
    
@endsection

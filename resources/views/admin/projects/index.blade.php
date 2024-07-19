@extends('layouts.app')

@section('content')
    <div class="project-list py-75">
        <div class="container">
            <div class="table-project">
                <table class="table custom-table">
                    <thead class="table-deshboard">
                        <tr>
                            <th class="col-1">id</th>
                            <th class="col-4">Nome</th>
                            <th class="col-4">Slug</th>
                            <th class="col-3 text-center">Gestione</th>
                        </tr>   
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)
                            <tr>
                                <td>{{$project->id}}</td>
                                <td>{{$project->title}}</td>
                                <td>{{$project->slug}}</td>
                                {{--? gestione dell'istanza --}}
                                <td>
                                    <div class="manage text-center">
                                        <a href="{{route('admin.projects.show', $project)}}" class="mr-10">
                                            <i class="fab fa-sistrix"></i>
                                        </a>
                                        <a href="{{route('admin.projects.update', $project)}}" class="mr-10">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{route('admin.projects.destroy', $project)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
    
                    </tbody>                   
                </table>
            </div>
        </div>
    </div>
    
@endsection
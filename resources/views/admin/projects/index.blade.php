<div class="screen holding">

@extends('layouts.app')

@section('content')
    <div class="project-list py-75">
        <div class="container">
            {{--? bottone crea --}}
            <div class="create">
                <a href="{{route('admin.projects.create') }}">{{ __('Crea Nuovo')}}</a>
            </div>

            {{--? tabella liststa progetti --}}
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
                                        <a href="{{route('admin.projects.edit', $project)}}" class="mr-10">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        {{--todo NON RIESCO A PASSARE L'IDENTIFICATIVO GIUSTO, PRENDE IN AUTOMATICO IL PRIMO DELLA LISTA --}}
                                        <a href="{{route('admin.projects.destroy', $project)}}" class="destroy" data-slug="{{$project->slug}}">
                                            <i class="fas fa-trash"></i>
                                        </a>                                       
                                        {{--? modale --}}
                                        <div class="delete__modale holding" id="modale-{{$project->slug}}">
                                            <span class="modale__exit">CHIUDI</span>
                                            <h4>Sei sicuro di voler cancellare?</h4>
                                            <p>La cancellazione è irreversibile</p>
                                            <form id="delete-form-{{$project->slug}}" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                                {{--! @dd($project->slug) --}}
                                                @csrf
                                                @method('DELETE')
                                                <input class="delete" type="submit" value="Elimina Elemento">
                                            </form>
                                        </div>

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

</div>
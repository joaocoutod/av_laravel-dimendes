@extends('layouts.main')

@section('title', 'Tasks')

@section('content')
<div class="container text-center p-3">
    <h1 class="text-muted display-5">Lista de Tarefas</h1>
</div>

@if(session('success'))
    <div class="container alert alert-success text-center" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
<div class="container alert alert-danger text-center" role="alert">
    {{ session('error') }}
</div>
@endif

@if(count($tasks) != 0)

    <div class="container  table-responsive">
        <table class="table text-center table-hover" >
            <thead class="table-dark">
                <tr>
                    <th>Titulo</th>
                    <th>Criado em</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{ $formattedDates[$key] }}</td>
                    <!-- VISUALIZAR -->
                    <td>
                        <a href="#" class="btn btn-success btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#visualizar{{$task->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                    </td>
                    <!--MODAL VISUALIZAR task-->
                    <div class="modal fade" id="visualizar{{$task->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h1>{{$task->title}}</h1>
                                    <p>{{$task->description}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- fim update -->


                    <!-- EDITAR -->
                    <td>
                        <a href="#" class="btn btn-primary btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#editartask{{$task->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                    <!--MODAL EDITAR task-->
                    <div class="modal fade" id="editartask{{$task->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/UPDTASK2312312">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$task->id}}">

                                        <div class="row g-3">
                                            <div class="col-sm-12 mb-3">
                                                <label for="title">Titulo <span class="text-danger">*</span></label>
                                                <input id="title" type="text" class="form-control" name="title" value="{{$task->title}}" autofocus required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Alterar titulo</button>
                                    </form>

                                    <form method="POST" action="/UPDTASK2312312" class="mb-5">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$task->id}}">

                                        <div class="row g-3">
                                            <div class="col-sm-12 mb-3">
                                                <label for="description">Descrição</label>
                                                <textarea id="description" name="description" class="form-control" rows="3" autofocus required>{{$task->description}}</textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Alterar Descrição</button>
                                    </form>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- fim update -->

                    
                    <!-- DELETAR -->
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm btn_acao"  data-bs-toggle="modal" data-bs-target="#deletartask{{$task->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>

                        <!-- MODAL DELETAR serviço -->
                        <div class="modal fade" id="deletartask{{$task->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Confirme se deseja deletar a tarefa {{$task->title}}</p>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                            <a class="btn btn-danger" href="/DELTASK2312312/{{$task->id}}">Deletar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td><!-- fim delete -->


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="container text-center">
    <button data-bs-toggle="modal" data-bs-target="#inserirtask" type="button" class="btn btn-primary">Adicionar Tarefa</button>
</div>
<!--MODAL INSERIR task-->
<div class="modal fade" id="inserirtask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/INSTASK2312312">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12 mb-3">
                        <label for="title">Titulo <span class="text-danger">*</span></label>
                        <input id="title" type="text" class="form-control" name="title" autofocus required>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="description">Descrição</label>
                        <textarea id="description" name="description" class="form-control" rows="3" autofocus required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
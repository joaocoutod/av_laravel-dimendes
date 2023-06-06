@extends('layouts.main')

@section('title', 'Tasks')

@section('content')
<div class="container text-center p-3">
    <h1 class="text-muted display-5">Lista de Serviços</h1>
</div>

@if(count($servicos) != 0)
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

    <div class="container  table-responsive">
        <table class="table text-center table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($servicos as $servico)
                <tr>
                    <td>{{$servico->id}}</td>
                    <td>{{$servico->nome}}</td>
                    <td>{{$servico->status}}</td>

                    <!-- EDITAR -->
                    <td>
                        <a href="#" class="btn btn-primary btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#editarservico{{$servico->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
                    <!--MODAL EDITAR servico-->
                    <div class="modal fade" id="editarservico{{$servico->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="/servicos/update">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$servico->id}}">
                                    <div class="row g-3">
                                        <div class="col-sm-12 mb-3">
                                            <label for="nome">Nome <span class="text-danger">*</span></label>
                                            <input id="nome" type="text" class="form-control" name="nome" value="{{$servico->nome}}" autofocus required>
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="ativo" {{ $servico->status == 'ativo' ? 'selected' : ''}}>Ativo</option>
                                                <option value="desativo" {{ $servico->status == 'desativo' ? 'selected' : ''}}>Desativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-success">Alterar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- DELETAR -->
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm btn_acao"  data-bs-toggle="modal" data-bs-target="#deletarServico{{$servico->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>

                        <!-- MODAL DELETAR serviço -->
                        <div class="modal fade" id="deletarServico{{$servico->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Confirme se deseja deletar o serviço de [id = {{$servico->id}}]</p>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                            <a class="btn btn-danger" href="/servicos/delete/{{$servico->id}}">Deletar</a>
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
    <button data-bs-toggle="modal" data-bs-target="#inserirServico" type="button" class="btn btn-primary">Inserir Serviço</button>
</div>
<!--MODAL INSERIR servico-->
<div class="modal fade" id="inserirServico" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/servicos/inserir">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12 mb-3">
                        <label for="nome">Nome <span class="text-danger">*</span></label>
                        <input id="nome" type="text" class="form-control" name="nome" autofocus required>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ativo" selected>Ativo</option>
                            <option value="desativo">Desativo</option>
                        </select>
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Inserir</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
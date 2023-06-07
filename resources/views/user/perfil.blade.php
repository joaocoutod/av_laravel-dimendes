@extends('../layouts.main')

@section('title', 'Perfil | '.Auth::user()->name)

@section('content')
    <div class="container-fluid text-center pt-5">
        <img src="/img/user.png" width="200" height="200" class="rounded-circle py-2">
        <h2 class="mb-4">{{ Auth::user()->name }}</h2>
        <p><span class="text-dark-50 mt-0"><i>USER ID: {{ Auth::user()->id }}</i></span><p>
        <p><span class="text-dark-50 mt-0"><i>EMAIL: {{ Auth::user()->email }}</i></span><p>
        <a href="/logout" class="btn btn-lg btn-danger">Sair</a>
    </div><!-- container -->    


<script src="/js/equipe-perfil.js"></script>
@endsection
@extends('../layouts.main_form')

@section('title', 'Cadastro | AV_LARAVEL')

@section('content')

<main class="form-signin text-light">
    
    <form method="POST" action="/auth/cadastro" class="ml-1" style="padding-top: 40px;padding-bottom: 40px;">
        @csrf
        <h1 class="h3 mb-3 fst-italic fw-normal text-center">Cadastro</h1>
        
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

        <div class="row g-3">
            <div class="col-sm-12">
                <label for="nome">Nome <span class="text-danger">*</span></label>
                <input id="nome" class="form-control form-control-lg" name="name" type="text" placeholder="nome" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input id="email" class="form-control form-control-lg" name="email" type="email" placeholder="email" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="password">Senha <span class="text-danger">*</span></label>
                <input id="password" class="form-control form-control-lg" name="password" type="password" placeholder="*********" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="conf-password">Confirme a Senha <span class="text-danger">*</span></label>
                <input id="conf-password" class="form-control form-control-lg" name="conf_password" type="password" placeholder="*********" aria-label=".form-control-lg" autofocus required>
            </div>

        </div>
        <button class="w-100 my-3 btn btn-lg btn-warning" type="submit">Cadastro</button>
    </form>

    <p class="text-center h5 mb-3 fst-italic fw-normal">Já tenho cadastro - <a href="/login" class="text-warning">Acesse sua conta</a></p>
</main>


@endsection
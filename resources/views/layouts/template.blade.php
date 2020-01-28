<!DOCTYPE html>
<html lang="pt-br">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Veganices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/template/style.css')}}">
    @yield('css')
    <script defer src="{{asset('assets/js/template/script.js')}}"></script>
</head>

<body>

    <header id="menuHeader" class="fixed-top">
        <div class="container-fluid">
            <div class="row flex-row-reverse flex-md-row">
                <div class="col-5 col-sm-4 col-md-2">
                    <a class="col" href="{{route('home.index')}}">
                        <img class="p-2 p-pq-1" height="90" src="{{asset('assets/img/template/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-md">
                        <div>
                            <button id="botaoMenu" class="navbar-toggler ml-n3" type="button" data-toggle="collapse"
                                data-target="#navBar" aria-controls="navBar" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i id="iconeMenu" class="material-icons navItem">
                                    menu
                                </i>
                            </button>
                        </div>
                        <div id="navBar" class="nav collapse navbar-collapse justify-content-md-end">
                            <ul class="navbar-nav">
                                <a class="nav-link navItem text-light font-weight-bold py-3 py-md-4 pr-3"
                                    href="{{route('home.index')}}">Home &nbsp;<span class="d-none d-md-inline">|</span></a>
                                <a class="nav-link navItem text-light font-weight-bold py-3 py-md-4 pr-3"
                                    href="{{route('recipes.index')}}">Receitas &nbsp;<span class="d-none d-md-inline">|</span></a>
                                <a class="nav-link navItem text-light font-weight-bold py-3 py-md-4 pr-5"
                                    href="{{route('community.index')}}">Comunidade &nbsp;<span class="d-none d-md-inline">|</span></a>
                                <a class="nav-link navItem text-light font-weight-bold pl-lg-5 py-3 py-md-4"
                                    onClick="showModalLogin()" href="javascript:void('')">Acesse</a>
                                <a class="nav-link navItem text-light font-weight-bold py-3 py-md-4"
                                    onClick="showModalCadastro()" href="javascript:void('')">Registre-se</a>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="modals container-fluid">
        <div class="row justify-content-end">
            <div id="modal-cadastro"
                class="modal-cadastro text-center align-items-center col-12 col-md-5 col-lg-4 col-full-3 mr-3 d-none">
                <form action="" method="POST">

                    <div class="row d-flex flex-column my-3 align-items-center">

                        <div class="close-modal" onClick="hideModalCadastro()">X</div>

                        <h3>Cadastro</h3>

                        <button type="submit" class="btn btn-light border my-2 mt-4 col-6 btn-social">
                            <i class="fab fa-facebook-square"></i>
                            Entrar com Facebook
                        </button>

                        <button type="submit" class="btn btn-light border my-2 mb-4 col-6 btn-social">
                            <i class="fab fa-google"></i>
                            Entrar com Google
                        </button>

                        <p>Ou cadastre-se usando seu e-mail</p>

                        <div class="form-group col-10 my-2">
                            <input type="text" class="form-control text-center" name="name" id="name"
                                placeholder="Nome">
                        </div>

                        <div class="form-group col-10 my-2">
                            <input type="email" class="form-control text-center" name="emailRegister" id="emailRegister"
                                placeholder="E-mail">
                        </div>

                        <div class="form-group col-10 my-2">
                            <input type="password" class="form-control text-center" name="passwordRegister" id="passwordRegister"
                                placeholder="Senha">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mb-1">Criar conta</button>

                    <p class="mb-1"> Já tem uma conta? <a href="javascript:void('')" onClick="showModalLogin()">Entrar</a>
                    </p>

                    <p>Você é profissional? <a href="#">Clique aqui</a></p>

                </form>
            </div>
        </div>
        <div class="row justify-content-end">
            <div id="modal-login"
                class="modal-login text-center align-items-center col-12 col-md-5 col-lg-4 col-full-3 mr-3 d-none">
                <form action="" method="POST">

                    <div class="row d-flex flex-column my-3 align-items-center">

                        <div class="close-modal" onClick="hideModalLogin()">X</div>

                        <h3 class="mb-2">Entre em sua conta</h3>

                        <h6>Não possui uma conta? <a href="javascript:void('')"
                                onClick="showModalCadastro()">Registre-se</a></h6>

                        <button type="submit" class="btn border my-2 mt-4 col-6">
                            <i class="fab fa-facebook-square"></i>
                            Entrar com Facebook
                        </button>

                        <button type="submit" class="btn border my-2 mb-4 col-6">
                            <i class="fab fa-google"></i>
                            Entrar com Google
                        </button>

                        <div class="form-group col-10 my-3">
                            <input type="email" class="form-control text-center" name="emailLogin" id="emailLogin"
                                placeholder="E-mail">
                        </div>

                        <div class="form-group col-10 my-3">
                            <input type="password" class="form-control text-center" name="passwordLogin" id="passwordLogin"
                                placeholder="Senha">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Entrar</button>

                    <p class="mb-1"><a href="">Esqueceu sua senha?</a></p>

                    <p>Você é profissional? <a href="#">Clique aqui</a></p>

                </form>
            </div>
        </div>
    </div>


    @yield('content')

    <footer id="rodape" class="text-light bg-dark">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-2">
                    <a href="{{route('home.index')}}"><img class="mt-2" src="{{asset('assets/img/template/logo.png')}}"
                            height="50" alt="Logo Veganices"></a>
                </div>
                <div class="col-6 d-none d-md-flex">
                    <a class="nav-link text-light font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4"
                        href="#">Receitas</a>
                    <a class="nav-link text-light font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4"
                        href="#">Comunidade</a>
                </div>
                <div class="col-6 col-md-4">
                    <h6 class="font-weight-bold pl-4 pt-2">Redes Sociais</h6>
                    <a target="_blank" href="https://facebook.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/facebook.png')}}" alt="Logo Facebook"></a>
                    <a target="_blank" href="https://instagram.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/instagram.png')}}" alt="Logo Instagram"></a>
                    <a target="_blank" href="https://twitter.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/twitter.png')}}" alt="Logo Twitter"></a>
                </div>
            </div>
            <div class="col-12">
                <h6 class="py-2 font-weight-bold m-0">@Copyright 2019 BeeVegan</h6>
            </div>
        </div>

    </footer>

    @yield('js')
</body>

</html>

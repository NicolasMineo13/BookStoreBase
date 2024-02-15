<!DOCTYPE html>
<html>

<head>
    <title>Application Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container">
                <div class="row justify-content-md-center">
                    <h2>Ceci est l'en-tête de l'application Webbooks</h2>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-primary" href="{{ route('books.index') }}">Liste des livres</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="{{ route('author.index') }}">Liste des autheurs</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="{{ route('command.index') }}">Liste des commandes</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="">Liste of factures</a>
                    </div>
                    <div class="col-sm">
                        @if(Session::has('Cart_code'))
                        <a class="btn btn-primary" href="{{ route('cart.show', Session::get('Cart_code')) }}">Voir mon panier</a>
                        @endif
                    </div>
                    <div class="col-sm">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="btn btn-primary">
                                {{ __('Finaliser la session') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
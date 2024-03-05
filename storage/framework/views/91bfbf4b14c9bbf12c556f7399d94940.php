<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Nouveau style pour le header */
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: right;
        }

        /* Style des liens dans le header */
        .header a {
            color: #fff;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        /* Style des liens au survol */
        .header a:hover {
            color: red;
        }

        /* Style du contenu principal */
        .main-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body class="antialiased">
    <!-- Header -->
    <div class="header">
        <?php if(Route::has('login')): ?>
        <div>
            <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(url('/dashboard')); ?>">Accueil</a>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Connexion</a>

            <?php if(Route::has('register')): ?>
            <a href="<?php echo e(route('register')); ?>">Inscription</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Contenu principal -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="main-content">
                    <h1>Bienvenue sur BookStore</h1>
                    <h5>Vous pouvez vous connecter ou vous inscrire pour accéder à l'application.</h5>
                    <h5>Une fois connecté(e) vous aurez accès à la liste des livres, des auteurs, des commandes et des factures, vous pourrez également passer commande ou simplement modifier un livre et bien d'autres fonctionnalités à découvrir !</h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/welcome.blade.php ENDPATH**/ ?>
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
                        <a class="btn btn-primary" href="<?php echo e(url('/dashboard')); ?>">Accueil</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>">Liste des livres</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="<?php echo e(route('author.index')); ?>">Liste des auteurs</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="<?php echo e(route('command.index')); ?>">Liste des commandes</a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="">Liste des factures</a>
                    </div>
                    <div class="col-sm">
                        <?php if(Session::has('Cart_code')): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('cart.show', Session::get('Cart_code'))); ?>">Voir mon panier</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm">
                        <!-- Authentication -->
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();','class' => 'btn btn-primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();','class' => 'btn btn-primary']); ?>
                                <?php echo e(__('Déconnexion')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/layouts/layout.blade.php ENDPATH**/ ?>
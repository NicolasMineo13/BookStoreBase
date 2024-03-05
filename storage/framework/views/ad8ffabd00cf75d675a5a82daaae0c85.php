<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Liste des livres</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('books.create')); ?>"> Créer un livre</a>
        </div>
    </div>
</div>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>N°</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th width="280px">Actions</th>
    </tr>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e(++$i); ?></td>
        <td><?php echo e($book->title); ?></td>
        <td><?php echo e($book->author->name); ?> <?php echo e($book->author->lastName); ?></td>
        <td>
            <?php if($book->deleted_at == NULL): ?>
            <a class="btn btn-info" href="<?php echo e(route('books.show',$book)); ?>">Voir</a>

            <a class="btn btn-primary" href="<?php echo e(route('books.edit',$book)); ?>">Modifier</a>



            <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <?php else: ?>
            <form action="<?php echo e(route('books.restore')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="ISBN" value="<?php echo e($book->ISBN); ?>">
                <button type="submit" class="btn btn-warning">Restaurer</button>
            </form>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/books/books.blade.php ENDPATH**/ ?>
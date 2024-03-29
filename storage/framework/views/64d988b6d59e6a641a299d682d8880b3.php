<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un nouveau livre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>"> Retour</a>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> Il y a des problèmes avec l'input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('books.update',$book->ISBN)); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISBN:</strong>
                <input type="text" name="ISBN" class="form-control" placeholder="ISBN du livre" maxlenght="32" value="<?php echo e($book->ISBN); ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titre:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Titre du livre" value="<?php echo e($book->title); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Année:</strong>
                    <input class="form-control" type="number" max="2023" min="700" name="year" placeholder="Année de parution" value="<?php echo e($book->year); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Édition:</strong>
                    <input class="form-control" type="number" max="30" min="1" name="edition" placeholder="Numéro de l'édition" value="<?php echo e($book->edition); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Éditorial:</strong>
                    <textarea class="form-control" style="height:50px" name="editorial" placeholder="Éditorial"><?php echo e($book->editorial); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description générale"><?php echo e($book->description); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dimensions:</strong>
                    <textarea class="form-control" style="height:150px" name="dimensions" placeholder="Dimensions physiques"><?php echo e($book->dimensions); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix unitaire:</strong>
                    <input class="form-control" type="float" max="1" min="30" name="unitPrice" placeholder="Prix unitaire" value="<?php echo e($book->unitPrice); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Auteur:</strong>
                    <select name="author_id" id="author_id" class="form-control">
                        <option value="">Choisir un auteur ...</option>
                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($book->author_id == $author->id): ?>
                        <option class="form-control" value="<?php echo e($author->id); ?>" selected><?php echo e($author->name); ?></option>
                        <?php else: ?>
                        <option class="form-control" value="<?php echo e($author->id); ?>"><?php echo e($author->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/books/edit.blade.php ENDPATH**/ ?>
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

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ISBN:</strong>
            <input type="text" name="ISBN" class="form-control" placeholder="Book ISBN" maxlenght="32" value="<?php echo e($book->ISBN); ?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e($book->title); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Année:</strong>
                <input class="form-control" type="number" max="2023" min="700" name="year" placeholder="Year of edition" value="<?php echo e($book->year); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Édition:</strong>
                <input class="form-control" type="number" max="30" min="1" name="edition" placeholder="Number of edition" value="<?php echo e($book->edition); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Éditorial:</strong>
                <textarea class="form-control" style="height:50px" name="editorial" placeholder="Editorial" readonly><?php echo e($book->editorial); ?></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="General description" readonly><?php echo e($book->description); ?></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dimensions:</strong>
                <textarea class="form-control" style="height:150px" name="dimensions" placeholder="Physical dimensions" readonly><?php echo e($book->dimensions); ?></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix unitaire:</strong>
                <input class="form-control" type="float" max="1" min="30" name="unitPrice" placeholder="Price per unit" value="<?php echo e($book->unitPrice); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Auteur:</strong>
                <select name="author_id" id="author_id" class="form-control" readonly>
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
            <a class="btn btn-primary" href="<?php echo e(route('books.edit',$book)); ?>">Modifier</a>
            <a class="btn btn-success" href="<?php echo e(route('cart.addItem',$book->ISBN)); ?>">Ajouter au panier</a>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/books/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Informations de la commande</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('command.index')); ?>"> Retour</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code :</strong>
            <input type="text" name="code" class="form-control" placeholder="Code" maxlenght="32" value="<?php echo e($command->code); ?>" form="ConfirmForm" readonly>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code la commande:</strong>
            <input type="text" name="code" class="form-control" placeholder="Code de la commande" maxlenght="32" value="<?php echo e($command->cart_id); ?>" form="ConfirmForm" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de la commande:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date de création" value="<?php echo e($command->date); ?>" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                <input class="form-control" type="number" min="0" name="total" placeholder="Total" value="<?php echo e($command->total); ?>" form="ConfirmForm" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse :</strong>
                <input class="form-control" type="text" maxlenght="100" name="address" placeholder="Adresse de facturation" value="<?php echo e($command->address); ?>" form="ConfirmForm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                <textarea class="form-control" style="height:100px" name="description" placeholder="Description de la commande" value="<?php echo e($command->description); ?>" form="ConfirmForm"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Total des objets</th>
                            <th scope="col">Description</th>
                            <th scope="col">Livre</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row">
                                <input class="form-control" type="text" name="code_<?php echo e($item->code); ?>" value="<?php echo e($item->code); ?>" readonly>
                            </th>
                            <td>
                                <input class="form-control" type="number" name="quantity_<?php echo e($item->code); ?>" min="1" value="<?php echo e($item->quantity); ?>" form="UpdateForm_<?php echo e($item->code); ?>">
                            </td>
                            <td>
                                <input class="form-control" type="number" name="total_<?php echo e($item->code); ?>" min="1" value="<?php echo e($item->total); ?>" readonly>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="description_<?php echo e($item->code); ?>" value="<?php echo e($item->description); ?>" form="UpdateForm_<?php echo e($item->code); ?>">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="book_id_<?php echo e($item->code); ?>" value="<?php echo e($item->book_id); ?>" readonly>
                            </td>
                        <tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/command/show.blade.php ENDPATH**/ ?>
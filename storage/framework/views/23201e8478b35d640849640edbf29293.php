 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of all commands</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('books.index')); ?>">Look for a book</a>
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
            <th>No</th>
            <th>Date</th>
            <th>Total</th>
            <th>User</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($command->date); ?></td>
            <td><?php echo e($command->total); ?></td>
            <td><?php echo e($command->user->name); ?> <?php echo e($command->user->lasName); ?></td>
            <td>
                <?php if($command->deleted_at == NULL): ?>
                    <a class="btn btn-info" href="<?php echo e(route('command.show', $command)); ?>">Show</a>                    
                    
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                <?php else: ?>
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="code" value="<?php echo e($command->code); ?>" > 
                        <button type="submit" class="btn btn-warning">Recover</button>
                    </form>   
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/command/commands.blade.php ENDPATH**/ ?>
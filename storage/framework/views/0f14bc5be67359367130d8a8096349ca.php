 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of all the other authors</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('author.create')); ?>"> Create New author</a>
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
            <th>DNI</th>
            <th>Name</th>
            <th>Last name</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($author->id); ?></td>
            <td>
                <?php echo e($author->name); ?> 
            </td>
            <td>
                <?php echo e($author->lastName); ?>

            </td>
            <td>
            <a class="btn btn-info" href="<?php echo e(route('author.show',$author)); ?>">Show</a>
                <?php if($author->deleted_at == NULL): ?>
                    <a class="btn btn-primary" href="<?php echo e(route('author.edit', $author)); ?>">Edit</a>
                    
                    <form action="<?php echo e(route('author.destroy', $author)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                <?php else: ?>
                    <form action="<?php echo e(route('author.restore')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="ISBN" value="<?php echo e($author->ISBN); ?>" > 
                        <button type="submit" class="btn btn-warning">Recover</button>
                    </form>   
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miste\Desktop\IUT\Maintenance applicative\BookStoreBase\resources\views/author/authors.blade.php ENDPATH**/ ?>
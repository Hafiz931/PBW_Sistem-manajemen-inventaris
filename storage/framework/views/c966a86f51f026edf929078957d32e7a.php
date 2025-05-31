

<?php $__env->startSection('title', 'Inventory Items'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Inventory Management</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="<?php echo e(route('items.create')); ?>"> Create New Item</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration + $items->firstItem() - 1); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->description ?? '-'); ?></td>
                <td><?php echo e($item->quantity); ?></td>
                <td>Rp <?php echo e(number_format($item->price, 2, ',', '.')); ?></td>
                <td>
                    <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST">
                        <a class="btn btn-info btn-sm" href="<?php echo e(route('items.show', $item->id)); ?>">Show</a>
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('items.edit', $item->id)); ?>">Edit</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">No items found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo $items->links(); ?> <!-- Paginasi -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\teuku\OneDrive\Documents\Code_PBW\inventory-app\resources\views/items/index.blade.php ENDPATH**/ ?>
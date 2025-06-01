<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Obat
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger mb-4">
                        <strong>Ups!</strong> Ada kesalahan input.<br><br>
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                
                <form action="<?php echo e(route('dokter.obat.update', $obat->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="mb-4">
                        <label for="nama_obat" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="<?php echo e(old('nama_obat', $obat->nama_obat)); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="kemasan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kemasan</label>
                        <input type="text" name="kemasan" id="kemasan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="<?php echo e(old('kemasan', $obat->kemasan)); ?>">
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Harga (Rp)</label>
                        <input type="number" name="harga" id="harga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="<?php echo e(old('harga', $obat->harga)); ?>" required>
                    </div>

                    <div class="flex justify-end">
                        <a href="<?php echo e(route('dokter.obat.index')); ?>" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/dokter/obat/edit.blade.php ENDPATH**/ ?>
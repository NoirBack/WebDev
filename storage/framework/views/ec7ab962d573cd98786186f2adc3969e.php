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
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Edit Profil')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <?php if(session('status')): ?>
                    <div class="mb-4 font-medium text-sm text-green-600">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('dokter.profil.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="<?php echo e(old('nama', $user->nama)); ?>"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo e(old('alamat', $user->alamat)); ?>"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- No HP -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="<?php echo e(old('no_hp', $user->no_hp)); ?>"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Poli -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Poli</label>
                        <input type="text" name="poli" value="<?php echo e(old('poli', $user->poli)); ?>"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Password Baru (Opsional) -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Password Baru</label>
                        <input type="password" name="password"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" />
                        <small class="text-gray-500">Kosongkan jika tidak ingin mengganti password</small>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
    class="bg-white text-black border border-gray-300 hover:bg-gray-100 font-semibold py-2 px-6 rounded shadow">
    Simpan Perubahan
</button>

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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/dokter/profil/edit.blade.php ENDPATH**/ ?>
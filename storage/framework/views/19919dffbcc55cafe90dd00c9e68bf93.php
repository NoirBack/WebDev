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
        <h2 class="text-xl font-semibold leading-tight text-gray-800"> {
            { __('Edit Pemeriksaan') }
            }
        </h2>
     <?php $__env->endSlot(); ?>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Perbarui Pemeriksaan Pasien')); ?>

                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            <?php echo e(__('Ubah informasi hasil pemeriksaan dan daftar obat yang diberikan.')); ?>

                        </p>
                    </header>

                    <form method="POST" action="<?php echo e(route('dokter.memeriksa.update', $janjiPeriksa->periksa->id)); ?>" class="mt-6">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- Nama Pasien -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" class="form-control rounded bg-gray-100" value="<?php echo e($janjiPeriksa->pasien->nama); ?>" readonly>
                        </div>

                        <!-- Tanggal Periksa -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Periksa</label>
                            <input type="datetime-local" name="tgl_periksa"
                                class="form-control rounded"
                                value="<?php echo e(\Carbon\Carbon::parse($janjiPeriksa->periksa->tgl_periksa)->format('Y-m-d\TH:i')); ?>" required>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Catatan</label>
                            <textarea name="catatan" class="form-control rounded" rows="3" required><?php echo e($janjiPeriksa->periksa->catatan); ?></textarea>
                        </div>

                        <!-- Obat -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Obat</label>
                            <select name="obat[]" class="form-control rounded" multiple required>
                                <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($obat->id); ?>"
                                        <?php if($janjiPeriksa->periksa->detailPeriksas->pluck('id_obat')->contains($obat->id)): ?> selected <?php endif; ?>>
                                        <?php echo e($obat->nama_obat); ?> - <?php echo e($obat->kemasan); ?> (Rp<?php echo e(number_format($obat->harga, 0, ',', '.')); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Biaya Pemeriksaan (Tampilan saja) -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Biaya Pemeriksaan (Tetap)</label>
                            <input type="text"
                                   class="form-control rounded bg-gray-100 text-gray-700"
                                   value="Rp150.000" readonly>
                            <p class="text-sm text-gray-500 mt-1">Biaya tetap ini akan otomatis ditambahkan ke total biaya di sistem.</p>
                        </div>

                        <!-- Tombol -->
                        <div class="flex gap-3 mt-4">
                            <a href="<?php echo e(route('dokter.memeriksa.index')); ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </section>
            </div>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/dokter/memeriksa/edit.blade.php ENDPATH**/ ?>
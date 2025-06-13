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
        <h2 class="text-xl font-semibold text-gray-800">Riwayat Pemeriksaan</h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-4xl mx-auto p-6 space-y-6 bg-white shadow rounded">
        <div>
            <h3 class="font-semibold text-lg mb-2">Informasi Pemeriksaan</h3>
            <p><strong>Tanggal:</strong> <?php echo e($riwayat->tgl_periksa->translatedFormat('d F Y H:i')); ?></p>
            <p><strong>Catatan:</strong> <?php echo e($riwayat->catatan ?: '-'); ?></p>
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-2">Obat Diresepkan</h3>
            <?php if($riwayat->detailPeriksas->count()): ?>
                <ul class="list-disc pl-4">
                    <?php $__currentLoopData = $riwayat->detailPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($detail->obat->nama_obat); ?> - <?php echo e($detail->obat->kemasan); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php else: ?>
                <p class="text-sm text-gray-600">Tidak ada obat yang diresepkan.</p>
            <?php endif; ?>
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-2">Biaya Pemeriksaan</h3>
            <p class="text-xl font-bold text-primary">Rp <?php echo e(number_format($riwayat->biaya_periksa, 0, ',', '.')); ?></p>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/pasien/riwayat-periksa/riwayat.blade.php ENDPATH**/ ?>
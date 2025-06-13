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
        <h2 class="text-xl font-semibold text-gray-800">Detail Janji Periksa</h2>
     <?php $__env->endSlot(); ?>

    <div class="p-6 max-w-3xl mx-auto bg-white rounded shadow">
        <ul class="list-group space-y-2">
            <li><strong>Poliklinik:</strong> <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->poli); ?></li>
            <li><strong>Nama Dokter:</strong> <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->nama); ?></li>
            <li><strong>Hari:</strong> <?php echo e($janjiPeriksa->jadwalPeriksa->hari); ?></li>
            <li><strong>Jam Mulai:</strong> <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i')); ?></li>
            <li><strong>Jam Selesai:</strong> <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i')); ?></li>
            <li><strong>Keluhan:</strong> <?php echo e($janjiPeriksa->keluhan); ?></li>
            <li><strong>No Antrian:</strong> <?php echo e($janjiPeriksa->no_antrian); ?></li>
        </ul>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/pasien/riwayat-periksa/detail.blade.php ENDPATH**/ ?>
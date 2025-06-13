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
            <?php echo e(__('Riwayat Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Janji Periksa</h3>

                <table class="table table-bordered table-striped w-full text-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Poliklinik</th>
                            <th>Dokter</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $janjiPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $janjiPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($janjiPeriksa->jadwalPeriksa->dokter->poli); ?></td>
                                <td><?php echo e($janjiPeriksa->jadwalPeriksa->dokter->nama); ?></td>
                                <td><?php echo e($janjiPeriksa->jadwalPeriksa->hari); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i')); ?></td>
                                <td><?php echo e($janjiPeriksa->no_antrian); ?></td>
                                <td>
                                    <?php if(is_null($janjiPeriksa->periksa)): ?>
                                        <span class="badge badge-warning">Belum</span>
                                    <?php else: ?>
                                        <span class="badge badge-success">Sudah</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(is_null($janjiPeriksa->periksa)): ?>
                                        <a href="<?php echo e(route('pasien.riwayat-periksa.detail', $janjiPeriksa->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('pasien.riwayat-periksa.riwayat', $janjiPeriksa->id)); ?>" class="btn btn-secondary btn-sm">Riwayat</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/pasien/riwayat-periksa/index.blade.php ENDPATH**/ ?>
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
        <h2 class="text-xl font-semibold text-black dark:text-white">
            Cetak Bukti Pemeriksaan
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="p-6 pt-12 bg-white text-black max-w-5xl mx-auto relative z-10">
        
        <div class="flex justify-end mb-4 no-print z-20">
            <button onclick="window.print()"
                class="p-2 rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow"
                title="Cetak">
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-4 0h-4v4h4v-4z" />
                </svg>
            </button>
        </div>

        
        <?php $__currentLoopData = $riwayats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-8 border-b pb-4">
                <h3 class="text-lg font-bold mb-2">Pemeriksaan #<?php echo e($loop->iteration); ?></h3>
                <ul class="text-sm space-y-1">
                    <li><strong>Dokter:</strong> <?php echo e($riwayat->jadwalPeriksa->dokter->nama); ?></li>
                    <li><strong>Poliklinik:</strong> <?php echo e($riwayat->jadwalPeriksa->dokter->poli); ?></li>
                    <li><strong>Tanggal Periksa:</strong> <?php echo e($riwayat->periksa->tgl_periksa->translatedFormat('d F Y H:i')); ?></li>
                    <li><strong>Keluhan:</strong> <?php echo e($riwayat->keluhan); ?></li>
                    <li><strong>Catatan Dokter:</strong> <?php echo e($riwayat->periksa->catatan ?? '-'); ?></li>
                    <li><strong>Biaya:</strong> Rp <?php echo e(number_format($riwayat->periksa->biaya_periksa, 0, ',', '.')); ?></li>
                    <li><strong>Obat Diresepkan:</strong>
                        <?php if($riwayat->periksa->detailPeriksas->count()): ?>
                            <ul class="list-disc list-inside mt-1">
                                <?php $__currentLoopData = $riwayat->periksa->detailPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($detail->obat->nama_obat); ?> - <?php echo e($detail->obat->kemasan); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <span class="text-gray-500">Tidak ada</span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($riwayats->isEmpty()): ?>
            <p class="text-center text-gray-500">Belum ada riwayat pemeriksaan yang bisa dicetak.</p>
        <?php endif; ?>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/pasien/riwayat-periksa/cetak.blade.php ENDPATH**/ ?>
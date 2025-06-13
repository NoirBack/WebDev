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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Janji Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Form Buat Janji -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                <?php echo e(__('Buat Janji Periksa')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Atur jadwal pertemuan dengan dokter untuk mendapatkan layanan konsultasi dan pemeriksaan kesehatan sesuai kebutuhan Anda.')); ?>

                            </p>
                        </header>

                        <form class="mt-6" action="<?php echo e(route('pasien.janji-periksa.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="no_rm">Nomor Rekam Medis</label>
                                <input type="text" id="no_rm" class="form-control rounded w-full" value="<?php echo e($no_rm); ?>" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="dokterSelect">Dokter</label>
                                <select class="form-control w-full" name="id_dokter" id="dokterSelect" required>
                                    <option value="">Pilih Dokter</option>
                                    <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $dokter->jadwalPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($dokter->id); ?>">
                                                <?php echo e($dokter->nama); ?> - Spesialis <?php echo e($dokter->poli); ?> | <?php echo e($jadwal->hari); ?>,
                                                <?php echo e(\Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')); ?> -
                                                <?php echo e(\Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="keluhan">Keluhan</label>
                                <textarea class="form-control w-full" name="keluhan" id="keluhan" rows="3" required></textarea>
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php if(session('status') === 'janji-periksa-created'): ?>
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                       class="text-sm text-gray-600"><?php echo e(__('Berhasil Dibuat.')); ?></p>
                                <?php endif; ?>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Tabel Riwayat Janji -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Riwayat Janji Periksa')); ?>

                        </h2>
                    </header>

                    <div class="overflow-x-auto mt-6">
                        <table class="table-auto w-full border text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Poliklinik</th>
                                    <th class="px-4 py-2">Dokter</th>
                                    <th class="px-4 py-2">Hari</th>
                                    <th class="px-4 py-2">Mulai</th>
                                    <th class="px-4 py-2">Selesai</th>
                                    <th class="px-4 py-2">Antrian</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $janjiPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $janjiPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t">
                                        <td class="px-4 py-2"><?php echo e($loop->iteration); ?></td>
                                        <td class="px-4 py-2"><?php echo e($janjiPeriksa->jadwalPeriksa->dokter->poli); ?></td>
                                        <td class="px-4 py-2"><?php echo e($janjiPeriksa->jadwalPeriksa->dokter->nama); ?></td>
                                        <td class="px-4 py-2"><?php echo e($janjiPeriksa->jadwalPeriksa->hari); ?></td>
                                        <td class="px-4 py-2"><?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i')); ?></td>
                                        <td class="px-4 py-2"><?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i')); ?></td>
                                        <td class="px-4 py-2"><?php echo e($janjiPeriksa->no_antrian); ?></td>
                                        <td class="px-4 py-2">
                                            <?php if(is_null($janjiPeriksa->periksa)): ?>
                                                <span class="text-yellow-600 font-semibold">Belum Diperiksa</span>
                                            <?php else: ?>
                                                <span class="text-green-600 font-semibold">Sudah Diperiksa</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </section>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/pasien/janji-periksa/index.blade.php ENDPATH**/ ?>
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
            <?php echo e(__('Jadwal Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Jadwal Periksa</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createJadwalModal">
                        Tambah Jadwal Periksa
                    </button>
                </div>

                <?php if(session('status') === 'jadwal-periksa-created'): ?>
                    <div class="alert alert-success">Jadwal berhasil ditambahkan.</div>
                <?php elseif(session('status') === 'jadwal-periksa-updated'): ?>
                    <div class="alert alert-info">Status jadwal berhasil diperbarui.</div>
                <?php elseif(session('status') === 'jadwal-periksa-exists'): ?>
                    <div class="alert alert-warning">Jadwal sudah ada sebelumnya.</div>
                <?php endif; ?>

                <!-- Tambahkan ID untuk DataTables -->
                <table id="jadwalTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $jadwalPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($jadwal->hari); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')); ?></td>
                                <td>
                                    <?php if($jadwal->status): ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('dokter.jadwal-periksa.update', $jadwal->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <?php if(!$jadwal->status): ?>
                                            <button type="submit" class="btn btn-success btn-sm">Aktifkan</button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Nonaktifkan</button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <!-- Modal Bootstrap -->
                <div class="modal fade" id="createJadwalModal" tabindex="-1" role="dialog" aria-labelledby="createJadwalModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo e(route('dokter.jadwal-periksa.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createJadwalModalLabel">Tambah Jadwal Periksa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="hari">Hari</label>
                                        <select name="hari" class="form-control" required>
                                            <option value="">Pilih Hari</option>
                                            <option>Senin</option>
                                            <option>Selasa</option>
                                            <option>Rabu</option>
                                            <option>Kamis</option>
                                            <option>Jumat</option>
                                            <option>Sabtu</option>
                                            <option>Minggu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_mulai">Jam Mulai</label>
                                        <input type="time" name="jam_mulai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_selesai">Jam Selesai</label>
                                        <input type="time" name="jam_selesai" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<?php /**PATH C:\laragon\www\bimkar-hospital\resources\views/dokter/jadwal-periksa/index.blade.php ENDPATH**/ ?>
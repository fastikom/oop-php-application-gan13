<?php $i = 0 ?>

<!-- Page heading -->
<div class="row">
    <div class="col-10">
        <h2>Kamar</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<!-- Table -->
<div class="row">
    <div class="col-6">
        <?php if ($kamars):?>
            <table class="awn-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kamars as $kamar): ?>
                    <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
                        <td><?= ++$i ?></td>
                        <td><?= $kamar->nama_kamar ?></td>
                        <td><?= anchor("kamar/edit/$kamar->id_kamar", 'Edit', ['class' => 'btn btn-warning']) ?></td>
                        <td>
                            <?= form_open("kamar/delete/$kamar->id_kamar") ?>
                                <?= form_hidden('id_kamar', $kamar->id_kamar) ?>
                                <?= form_button(['type' => 'submit', 'content' => 'Delete', 'class' => 'btn-danger']) ?>
                            <?= form_close() ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Jumlah : <?= isset($jumlah) ? $jumlah : '' ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p>Tidak ada data kamar.</p>
        <?php endif ?>
    </div>
</div>

<div class="row">
    <!-- Button create -->
    <div class="col-10">
        <?= anchor("kamar/create", 'Tambah', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

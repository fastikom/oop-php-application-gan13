<div class="row">
    <div class="col-10 no-margin">
        <h2>Kamar</h2>
    </div>
</div>

<?= form_open($form_action) ?>

    <?= isset($input->id_kamar) ? form_hidden('id_kamar', $input->id_kamar) : '' ?>

    <!-- nama_kamar -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Nama Kamar', 'nama_kamar', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('nama_kamar', $input->nama_kamar) ?>
        </div>
        <div class="col-4">
            <?= form_error('nama_kamar') ?>
        </div>
    </div>

    <!-- submit button -->
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Simpan', 'class' => 'btn-primary']) ?></div>
    </div>
 <?= form_close() ?>

<div class="row">
    <div class="col-10 no-margin">
        <h2>Santri</h2>
    </div>
</div>

<?= form_open($form_action) ?>

    <?= isset($input->id_santri) ? form_hidden('id_santri', $input->id_santri) : '' ?>

    <!-- nis -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('NIS', 'nis', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('nis', $input->nis) ?>
        </div>
        <div class="col-4">
            <?= form_error('nis') ?>
        </div>
    </div>

    <!-- nama_santri -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Nama', 'nama_santri', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('nama_santri', $input->nama_santri) ?>
        </div>
        <div class="col-4">
            <?= form_error('nama_santri') ?>
        </div>
    </div>

    <!-- jenis_kelamin -->
    <div class="row form-group">
        <div class="col-2">
            <p class="label">Jenis Kelamin</p>
        </div>
        <div class="col-4">
            <label class="block-label">
                <?= form_radio('jenis_kelamin', 'L',
                    isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'L') ? true : false)
                ?> Laki-laki
            </label>
            <label class="block-label">
                <?= form_radio('jenis_kelamin', 'P',
                    isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'P') ? true : false)
                ?> Perempuan
            </label>
        </div>
        <div class="col-4">
            <?= form_error('jenis_kelamin') ?>
        </div>
    </div>

    <!-- id_kamar -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Kamar', 'id_kamar', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_dropdown('id_kamar', getDropdownList('kamar', ['id_kamar', 'nama_kamar']), $input->id_kamar, 'id="kamar"') ?>
        </div>
        <div class="col-4">
            <?= form_error('id_kamar') ?>
        </div>
    </div>

    <!-- submit button -->
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Simpan', 'class' => 'btn-primary']) ?></div>
    </div>
 <?= form_close() ?>

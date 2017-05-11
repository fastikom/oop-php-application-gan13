<div class="row">
    <div class="col-10 no-margin">
        <h2>Peminjaman</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<?= form_open($form_action, ['id' => 'form-peminjaman', 'autocomplete' => 'off']) ?>

    <!-- tanggal_pinjam -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Tanggal Pinjam', 'tanggal_pinjam', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <?= form_input('tanggal_pinjam', $input->tanggal_pinjam, ['class' => 'tanggal date-picker']) ?>
        </div>
        <div class="col-4">
            <?= form_error('tanggal_pinjam') ?>
        </div>
    </div>

    <!-- search_santri / fake input just for search-->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Santri', 'search_santri', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <input type="text" name="search_santri" value="<?= $input->search_santri ?>" id="search_santri" onkeyup="santriAutoComplete()" placeholder="Masukkan NIS atau Nama Santri">
            <ul id="santri_list" class="live-search-list"></ul>
        </div>
        <div class="col-4">
            <?= form_error('search_santri') ?>
        </div>
    </div>

    <!-- search_buku fake input just form search -->
    <div class="row form-group">
        <div class="col-2">
            <?= form_label('Buku', 'search_buku', ['class' => 'label']) ?>
        </div>
        <div class="col-4">
            <input type="text" name="search_buku" value="<?= $input->search_buku ?>" id="search_buku" onkeyup="bukuAutoComplete()" placeholder="Masukkan Judul Buku">
            <ul id="buku_list" class="live-search-list"></ul>
        </div>
        <div class="col-4">
            <?= form_error('search_buku') ?>
        </div>
    </div>

    <!-- submit button -->
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8"><?= form_button(['type' => 'submit', 'content' => 'Simpan', 'class' => 'btn-primary']) ?></div>
    </div>

    <!-- Real input for id_santri and id_buku -->
    <?= isset($input->id_santri) ? form_input(['type' => 'hidden', 'name' => 'id_santri', 'id' => 'id-santri', 'value' => $input->id_santri]) : '' ?>
    <?= isset($input->id_buku) ? form_input(['type' => 'hidden', 'name' => 'id_buku', 'id' => 'id-buku', 'value' => $input->id_buku]) : '' ?>

 <?= form_close() ?>

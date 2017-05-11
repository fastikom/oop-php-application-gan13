// Datepicker
$(".tanggal").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1980:+0',
    dateFormat: "yy-mm-dd"
});

// santri Autocomplete (Ajax)
function santriAutoComplete() {
    var min_length = 0; // min caracters to display the autocomplete
    var keywords = $('#search_santri').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url: 'http://ciperpus306.dev/peminjaman/santri_auto_complete',
            type: 'POST',
            data: {keywords:keywords},
            success:function(data){
                $('#santri_list').show();
                $('#santri_list').html(data);
            }
        });
    } else {
        $('#santri_list').hide();
    }
}

// bukuAutocomplete (Ajax)
function bukuAutoComplete() {
    var min_length = 0; // min caracters to display the autocomplete
    var keywords = $('#search_buku').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url: 'http://ciperpus306.dev/peminjaman/buku_auto_complete',
            type: 'POST',
            data: {keywords:keywords},
            success:function(data){
                $('#buku_list').show();
                $('#buku_list').html(data);
            }
        });
    } else {
        $('#buku_list').hide();
    }
}

// setItem : Change the value of input when "clicked"
function setItemSantri(item) {
    // change input value
    $('#search_santri').val(item);
    $('#santri_list').hide();
}

function setItemBuku(item) {
    // change input value
    $('#search_buku').val(item);
    $('#buku_list').hide();
}

// Create input "id_santri" if not exist, otherwise set it's value
function makeHiddenIdSantri(nilai) {
    if ($("#id-santri").length > 0) {
        $("#id-santri").attr('value', nilai);
    } else {
        str = '<input type="hidden" id="id-santri" name="id_santri" value="'+nilai+'" />';
        $("#form-peminjaman").append(str);
    }
}

// Create input "id_buku" if not exist, otherwise set it's value
function makeHiddenIdBuku(nilai) {
    if ($("#id-buku").length > 0) {
        $("#id-buku").attr('value', nilai);
    } else {
        str = '<input type="hidden" id="id-buku" name="id_buku" value="'+nilai+'" />';
        $("#form-peminjaman").append(str);
    }
}

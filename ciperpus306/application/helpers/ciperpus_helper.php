<?php

// Mendapatkan data dari database dan membuatnya untuk menu dropdown
function getDropdownList($table, $columns)
{
    $CI =& get_instance();
    $query = $CI->db->select($columns)->from($table)->get();

    if ($query->num_rows() >= 1) {
        $options1 = ['' => '- Pilih -'];
        $options2 = array_column($query->result_array(), $columns[1], $columns[0]);
        $options = $options1 + $options2;
        return $options;
    }

    return $options = ['' => '- Pilih -'];
}

// Show form error validation message for "file" input.
// memperlihatkan form pesan validasi error untuk file yang diinputkan 
function fileFormError($field, $prefix = '', $suffix = '')
{
    $CI =& get_instance();
    $error_field = $CI->form_validation->error_array();

    if (!empty($error_field[$field])) {
        return $prefix . $error_field[$field] . $suffix;
    }
    return '';
}

<?php
function swalSuccess($typeMessage, $titleMessage)
{
    $ci = get_instance();
    $ci->session->set_flashdata('flash', $typeMessage);
    $ci->session->set_flashdata('data', $titleMessage);
}

function logDataMaster($typeForm)
{
    $ci = get_instance();
    if ($typeForm == 'addLog') {
        $created_date = date("Y-m-d h:i:s");
        $created_by = $ci->session->userdata('id_user');
        array_merge($ci->data_input, [
            'created_date' => $created_date,
            'created_by' => $created_by
        ]);
    }

    if ($typeForm == 'editLog') {
        $modifed_date = date("Y-m-d h:i:s");
        $modifed_by = $ci->session->userdata('id_user');
        array_merge($ci->data_input, [
            'modifed_date' => $modifed_date,
            'modifed_by' => $modifed_by
        ]);
    }
}

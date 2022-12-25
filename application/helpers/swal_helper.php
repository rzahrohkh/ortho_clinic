<?php
function swalSuccess($typeMessage, $titleMessage)
{
    $ci = get_instance();
    $ci->session->set_flashdata('flash', $typeMessage);
    $ci->session->set_flashdata('data', $titleMessage);
}

function logDataMaster($typeForm, $data)
{
    $ci = get_instance();
    if ($typeForm == 'addLog') {
        $created_date = date("Y-m-d h:i:s");
        $created_by = $ci->session->userdata('id_user');
        $data = array_merge($data, [
            'created_date' => $created_date,
            'created_by' => $created_by
        ]);
    }

    if ($typeForm == 'editLog') {
        $modifed_date = date("Y-m-d h:i:s");
        $modifed_by = $ci->session->userdata('id_user');
        $data = array_merge($data, [
            'modifed_date' => $modifed_date,
            'modifed_by' => $modifed_by
        ]);
    }
    return $data;
}

function hari_ini($hari)
{
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

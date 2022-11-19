<?php

function is_logged_in()
{
    date_default_timezone_set('Asia/Jakarta');
    $ci = get_instance();
    $season_user = $ci->session->userdata('id_user');
    $season_patient = $ci->session->userdata('id_patient');

    if ($season_patient) {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id_user_menu'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'id_role' => $role_id,
            'id_user_menu' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('forbidden');
        }
    } else  if ($season_user) {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id_user_menu'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'id_role' => $role_id,
            'id_user_menu' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('forbidden');
        }
    } else {
        redirect('auth');
    }
}

function check_access($role_id, $id_user_menu)
{
    $ci = get_instance();

    $ci->db->where('id_role', $role_id);
    $ci->db->where('id_user_menu', $id_user_menu);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}

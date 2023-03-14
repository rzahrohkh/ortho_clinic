<?php
class SubMenu_model extends CI_model
{
    public function get_user_sub_menu_by_role($id_role)
    {
        return $this->db->query("SELECT
                                    user_sub_menu.* 
                                FROM
                                    user_sub_menu
                                    LEFT JOIN user_menu ON user_sub_menu.id_user_menu = user_menu.id_user_menu
                                    LEFT JOIN user_access_menu ON user_menu.id_user_menu=user_access_menu.id_user_menu
                                    WHERE user_access_menu.id_role=$id_role AND user_sub_menu.is_active=1")->result_array();
    }
    public function get_user_sub_menu()
    {
        return $this->db->query("SELECT*FROM user_menu LEFT JOIN user_sub_menu ON user_menu.id_user_menu = user_sub_menu.id_user_menu where user_sub_menu.id_user_menu IS NOT NULL")->result_array();
    }
    public function get_user_sub_menu_byID($id_user_sub_menu)
    {
        return $this->db->query("SELECT*FROM user_menu LEFT JOIN user_sub_menu ON user_menu.id_user_menu = user_sub_menu.id_user_menu where user_sub_menu.id_user_menu IS NOT NULL AND id_user_sub_menu=$id_user_sub_menu")->row_array();
    }
    public function delete_user_sub_menu($id_user_sub_menu)
    {
        $this->db->where('id_user_sub_menu', $id_user_sub_menu);
        $this->db->delete('user_sub_menu');
    }

    public function add_user_sub_menu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }

    public function update_user_sub_menu(
        $id_user_sub_menu,
        $data

    ) {
        $this->db->update('user_sub_menu', $data, ['id_user_sub_menu' => $id_user_sub_menu]);
        return $this->db->affected_rows();
    }
}

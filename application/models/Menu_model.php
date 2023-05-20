<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Menu_model  extends CI_model
{
    public function get_user_menu()
    {
        return$this->db->query("SELECT * FROM user_menu")->result_array();
    }
    public function get_user_menu_byID($id_user_menu)
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->where('id_user_menu',$id_user_menu);
        return $this->db->get()->row_array();
    }
    public function delete_user_menu($id_user_menu){
        $this->db->where('id_user_menu', $id_user_menu);
        $this->db->delete('user_menu');
    }


    public function add_user_menu($data){
        $this->db->insert('user_menu', $data);
    }

    public function update_user_menu(
        $id_user_menu,
        $user_menu
    
        ){
            $this->db->set('user_menu',$user_menu);
            $this->db->where('id_user_menu',$id_user_menu);
            $this->db->update('user_menu');
    }
}
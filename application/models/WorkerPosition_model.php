<?php
class WorkerPosition_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_worker_position_clinic_all()
    {
        return $this->db->query("SELECT * FROM worker_position_clinic")->result_array();
    }

    public function get_worker_position_clinic_byID($id_position)
    {
        $this->db->select('*');
        $this->db->from('worker_position_clinic');
        $this->db->where('id_position', $id_position);
        return $this->db->get()->row_array();
    }
    public function delete_worker_position_clinic($id_position)
    {
        $this->db->where('id_position', $id_position);
        $this->db->delete('worker_position_clinic');
    }

    public function add_worker_position_clinic($data)
    {
        $this->db->insert('worker_position_clinic', $data);
    }

    public function update_worker_position_clinic(
        $data,
        $id_position
    ) {
        $this->db->update('worker_position_clinic', $data, ['id_position' => $id_position]);
        return $this->db->affected_rows();
    }
}

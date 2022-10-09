<?php
class Section_model  extends CI_model
{
    public function getSectionByType($typeSection)
    {
        $this->db->select('*');
        $this->db->from('section_clinic');
        $this->db->where('type_section', $typeSection);
        return $this->db->get()->row_array();
    }
}



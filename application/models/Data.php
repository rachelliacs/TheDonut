<?php
class Data extends CI_Model
{
    public function getTotalRecords($table_name)
    {
        return $this->db->count_all($table_name);
    }

    public function getData($id)
    {
        // Fetch data based on $id
        $query = $this->db->get_where('table_name', array('id' => $id));
        return $query->row_array();
    }

    public function updateData($table_name, $id, $field)
    {
        // Update data in the table
        $data = array(
            'field_name' => $field
        );
        $this->db->where('id', $id);
        $this->db->update($table_name, $data);
    }
}
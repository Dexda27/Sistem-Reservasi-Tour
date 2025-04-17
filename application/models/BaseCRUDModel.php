<?php
class BaseCRUDModel extends CI_Model
{
    protected $table = '';
    protected $foreign_keys = array();
    protected $has_timestamps = false;
    protected $has_edit_by = false;
    protected $show_in_table = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = strtolower(str_replace('Model', '', get_class($this)));
    }

    public function create($data)
    {
        if ($this->has_timestamps) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->has_edit_by) {
            $data['created_by'] = $this->session->userdata('id');
            $data['updated_by'] = $this->session->userdata('id');
        }
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        $query = $this->db->get($this->table);
        $main_results = $query->result_array();

        if (empty($this->foreign_keys)) {
            return $main_results;
        }

        return $main_results;
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        $main_result = $query->row_array();

        if (empty($main_result)) {
            return $main_result;
        }

        foreach ($this->foreign_keys as $key => $value) {
            $foreign_query = $this->db->query("SELECT id," . $value['enum'] . " FROM " . $value['table']);
            $foreign_result = $foreign_query->row_array();
            if ($foreign_result) {
                foreach ($foreign_result as $col => $val) {
                    if ($col !== 'id') {
                        $main_result["{$key}_$col"] = $val;
                    }
                }
            }
        }
        return $main_result;
    }

    public function update($id, $data)
    {
        if ($this->has_timestamps) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        if ($this->has_edit_by) {
            $data['updated_by'] = $this->session->userdata('id');
            $created_by = $this->db->get_where($this->table, ['id' => $id])->row_array()['created_by'];
            $data['created_by'] = $created_by;
        }
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function get_current_table_column()
    {
        $query = $this->db->query("DESCRIBE " . $this->table)->result_array();
        $result = array();
        foreach ($query as $row) {
            $field = array('Field' => $row['Field'], 'Type' => $row['Type'], 'Key' => $row['Key']);
            if (array_key_exists($row['Field'], $this->foreign_keys)) {
                $foreign_key = $this->foreign_keys[$row['Field']];
                $enum = $this->db->query("SELECT id," . $foreign_key['enum'] . " FROM " . $foreign_key['table'])->result_array();
                $field['foreign'] = $enum;
                $field['foreign_info'] = $foreign_key;
            }
            if (strpos($row['Type'], 'enum') !== false) {
                $enum = explode(',', str_replace("'", '', substr($row['Type'], 5, -1)));
                $field['enum'] = $enum;
            }
            $result[] = $field;
        }
        return $result;
    }

    public function get_show_in_table()
    {
        return $this->show_in_table;
    }
}

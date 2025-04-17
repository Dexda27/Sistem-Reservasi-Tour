<?php

class GuideHasBahasaModel extends CI_Model {

    private $bahasa = 'bahasa';
    private $guide = 'guide';
    private $user = 'user';
    private $pivot = 'guide_has_bahasa';

	public function create_guide_with_bahasa(array $guide_data, array $bahasa_ids) : bool
    {
        $this->load->model('guideModel');

        $this->db->trans_start();
        $this->guideModel->create($guide_data);

        $guide_id = $this->db->insert_id();
        $pivot_data = [];
        foreach ($bahasa_ids as $bahasa_id) {
            $pivot_data[] = [
                'guide_id' => $guide_id,
                'bahasa_id' => $bahasa_id
            ];
        }
        if (!empty($pivot_data)) {
            $this->db->insert_batch($this->pivot, $pivot_data);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function delete(array $where)
	{
        return $this->db->delete($this->pivot, $where);
    }

    public function get(int $guide_id = null)
	{
        $this->db->select("{$this->guide}.guide_name, {$this->bahasa}.nama_bahasa");
        $this->db->from($this->pivot);
        $this->db->join($this->guide, "{$this->pivot}.guide_id = {$this->guide}.id");
        $this->db->join($this->bahasa, "{$this->pivot}.bahasa_id = {$this->bahasa}.id");

        if ($guide_id !== null) {
            $this->db->where("{$this->guide}.id", $guide_id);
        }

        return $this->db->get()->result_array();
    }

    public function get_guide_with_details(int $guide_id = null)
	{
        $this->db->select("
            {$this->guide}.id as guide_id,
            {$this->guide}.*,
            {$this->bahasa}.id as bahasa_id,
            {$this->bahasa}.nama_bahasa,
            created_by.username as created_by,
            updated_by.username as updated_by
        ");
        $this->db->from($this->guide);
        $this->db->join($this->pivot, "{$this->guide}.id = {$this->pivot}.guide_id", 'left');
        $this->db->join($this->bahasa, "{$this->bahasa}.id = {$this->pivot}.bahasa_id", 'left');
        $this->db->join("{$this->user} as created_by", "{$this->guide}.created_by = created_by.id", 'left');
        $this->db->join("{$this->user} as updated_by", "{$this->guide}.updated_by = updated_by.id", 'left');

        if ($guide_id !== null) {
            $this->db->where("{$this->guide}.id", $guide_id);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        $guides = [];
        foreach ($result as $row) {
            $id = $row['guide_id'];
            if (!isset($guides[$id])) {
                $guides[$id] = [
                    'id' => $id,
                    'nama_guide' => $row['guide_name'],
                    'no_telp' => $row['no_telp'],
                    'created_by' => $row['created_by'],
                    'updated_by' => $row['updated_by'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                    'bahasa' => []
                ];
            }
            if ($row['bahasa_id']) {
                $guides[$id]['bahasa'][] = [
                    'id' => $row['bahasa_id'],
                    'nama_bahasa' => $row['nama_bahasa']
                ];
            }
        }

        // Return the appropriate result based on $guide_id
        return ($guide_id !== null) ? ($guides[$guide_id] ?? null) : array_values($guides);
    }

    public function update_guide_with_bahasas($guide_id, $guide_data, $bahasa_ids) : bool
	{
        $this->load->model('guideModel');

        $this->db->trans_start();
        $this->guideModel->update($guide_id, $guide_data);
        $this->delete(['guide_id' => $guide_id]);

        $pivot_data = [];
        foreach ($bahasa_ids as $bahasa_id) {
            $pivot_data[] = [
                'guide_id' => $guide_id,
                'bahasa_id' => $bahasa_id
            ];
        }
        if (!empty($pivot_data)) {
            $this->db->insert_batch($this->pivot, $pivot_data);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function delete_guide_with_bahasas($guide_id)
	{
        $this->load->model('guideModel');

        $this->db->trans_start();
        $this->delete(['guide_id' => $guide_id]);
        $this->guideModel->delete($guide_id);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}

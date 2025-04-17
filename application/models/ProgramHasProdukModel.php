<?php

class ProgramHasProdukModel extends CI_Model {

    private $produk = 'produk';
    private $program = 'program';
    private $user = 'user';
    private $pivot = 'program_has_produk';

    public function create_program_with_produk(array $program_data, array $produk_ids) : bool
    {
        $this->load->model('programmodel');

        $this->db->trans_start();
        $this->programmodel->create($program_data);

        $program_id = $this->db->insert_id();
        $pivot_data = [];
        foreach ($produk_ids as $product_id) {
            $pivot_data[] = [
                'program_id' => $program_id,
                'produk_id' => $product_id
            ];
        }
        if (!empty($pivot_data)) {
            $this->db->insert_batch($this->pivot, $pivot_data);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function delete(array $where) : bool
	{
        return $this->db->delete($this->pivot, $where);
    }

    public function get(int $program_id = null) :array
	{
        $this->db->select("{$this->program}.nama_program, {$this->produk}.nama_produk");
        $this->db->from($this->pivot);
        $this->db->join($this->program, "{$this->pivot}.program_id = {$this->program}.id");
        $this->db->join($this->produk, "{$this->pivot}.produk_id = {$this->produk}.id");

        if ($program_id !== null) {
            $this->db->where("{$this->program}.id", $program_id);
        }

        return $this->db->get()->result_array();
    }

    public function get_program_with_details(int $program_id = null) : array
	{
        $this->db->select("
            {$this->program}.id as program_id,
            {$this->program}.*,
            {$this->produk}.id as product_id,
            {$this->produk}.nama_produk,
            created_by.username as created_by,
            updated_by.username as updated_by
        ");
        $this->db->from($this->program);
        $this->db->join($this->pivot, "{$this->program}.id = {$this->pivot}.program_id", 'left');
        $this->db->join($this->produk, "{$this->produk}.id = {$this->pivot}.produk_id", 'left');
        $this->db->join("{$this->user} as created_by", "{$this->program}.created_by = created_by.id", 'left');
        $this->db->join("{$this->user} as updated_by", "{$this->program}.updated_by = updated_by.id", 'left');

        if ($program_id !== null) {
            $this->db->where("{$this->program}.id", $program_id);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        $programs = [];
        foreach ($result as $row) {
            $id = $row['program_id'];
            if (!isset($programs[$id])) {
                $programs[$id] = [
                    'id' => $id,
                    'nama_program' => $row['nama_program'],
                    'durasi' => $row['durasi'],
                    'deskripsi' => $row['deskripsi'],
                    'created_by' => $row['created_by'],
                    'updated_by' => $row['updated_by'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                    'produk' => []
                ];
            }
            if ($row['product_id']) {
                $programs[$id]['produk'][] = [
                    'id' => $row['product_id'],
                    'nama_produk' => $row['nama_produk']
                ];
            }
        }

        // Return the appropriate result based on $program_id
        return ($program_id !== null) ? ($programs[$program_id] ?? null) : array_values($programs);
    }

    public function update_program_with_products($program_id, $program_data, $produk_ids) : bool
	{
        $this->load->model('programmodel');

        $this->db->trans_start();
        $this->programmodel->update($program_id, $program_data);
        $this->delete(['program_id' => $program_id]);

        $pivot_data = [];
        foreach ($produk_ids as $product_id) {
            $pivot_data[] = [
                'program_id' => $program_id,
                'produk_id' => $product_id
            ];
        }
        if (!empty($pivot_data)) {
            $this->db->insert_batch($this->pivot, $pivot_data);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function delete_program_with_products($program_id) : bool
	{
        $this->load->model('programmodel');

        $this->db->trans_start();
        $this->delete(['program_id' => $program_id]);
        $this->programmodel->delete($program_id);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}

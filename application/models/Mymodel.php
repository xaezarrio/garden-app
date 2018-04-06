<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

        public function __construct()
        {

        }

		public function selectData($table)
		{
            $query = $this->db->get($table);
            return $query->result_array();
		}

		public function selectWhere($table,$where)
		{
                $query = $this->db->get_where($table,$where);
		        return $query->result_array();		
		 }


		 public function selectWhereNumRows($table,$where)
		{
                $query = $this->db->get_where($table,$where);
		        return $query->num_rows();		
		 }

		  public function selectNumRows($table)
		{
                $query = $this->db->get($table);
		        return $query->num_rows();		
		 }

		public function selectDataone($table,$where)
		{
                $query = $this->db->get_where($table,$where);
		        return $query->row_array();
		}

		public function deleteData($table,$id)
		{
		    $this->db->where($id);
			$this->db->delete($table);
			
		}

		public function insertData($table,$data)
		{
			$res = $this->db->insert($table,$data);
			return $res;
		}

		public function selectWherelimit($table,$where,$order_by,$limit)
		{
				$this->db->order_by($order_by,'DESC');
				$this->db->limit($limit);
				$query = $this->db->get_where($table,$where);
		        return $query->result_array();	
		}


		public function updateData($table,$data,$where)
		{
			$res = $this->db->update($table,$data,$where);
			return $res;
		}

		public function gaji($proyek,$bulan,$tahun,$karyawan)
		{
			# code...
			$sql="SELECT
					(
						(
							(
								SELECT
									SUM(nominal)
								FROM
									pengeluaran,
									aktivitas
								WHERE
									pengeluaran.karyawan_id = ".$karyawan."
								AND MONTH (pengeluaran.date) = ".$bulan."
								AND YEAR (pengeluaran.date) = ".$tahun."
								AND aktivitas.kategori = 'Masuk'
								AND aktivitas.id = pengeluaran.aktivitas_sub
							) - IFNULL(
								(
									SELECT
										SUM(nominal)
									FROM
										pengeluaran,
										aktivitas
									WHERE
										pengeluaran.karyawan_id = ".$karyawan."
									AND MONTH (pengeluaran.date) = ".$bulan."
									AND YEAR (pengeluaran.date) = ".$tahun."
									AND aktivitas.kategori = 'Keluar'
									AND aktivitas.id = pengeluaran.aktivitas_sub
									AND aktivitas.name != 'Pembayaran Sisa Gaji'
								),
								0
							)
						) / (
							SELECT
								COUNT(karyawan_proyek.id)
							FROM
								karyawan_proyek
							WHERE
								karyawan_proyek.karyawan_id = ".$karyawan."
							AND MONTH (karyawan_proyek.date) = ".$bulan."
							AND YEAR (karyawan_proyek.date) = ".$tahun."
						)
					) AS gaji
				FROM
					karyawan_proyek
				WHERE
					karyawan_proyek.karyawan_id = ".$karyawan."
				AND proyek_id = ".$proyek."
				AND MONTH (karyawan_proyek.date) = ".$bulan."
				AND YEAR (karyawan_proyek.date) = ".$tahun." ";
				$rec = $this->db->query($sql)->row_array();
				// print_r($rec);
				return $rec;
		}
		
}
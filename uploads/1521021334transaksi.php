<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

	public function index()
	{
		$this->template->load('admin/template/static','admin/transaksi/transaksi_baru');
	}
	public function diproses()
	{
		$this->template->load('admin/template/static','admin/transaksi/transaksi_diproses');
	}
	public function selesai()
	{
		$this->template->load('admin/template/static','admin/transaksi/transaksi_selesai');
	}
	public function baru_transaksi()
	{
		$this->template->load('admin/template/static','admin/transaksi/baru_transaksi');
	}

}
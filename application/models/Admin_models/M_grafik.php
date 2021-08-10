<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_grafik extends CI_Model
{
    function fetch_year()
    {
        $this->db->select('year(tgl_transaksi) as year');
        $this->db->from('transaksi');
        $this->db->group_by('year(tgl_transaksi)');
        $this->db->order_by('year(tgl_transaksi)', 'ASC');
        return $this->db->get();
    }

    function fetch_chart_data($year)
    {
        // $this->db->select('month(tgl_transaksi) as bulan,saldo  ');
        // $this->db->where('year(tgl_transaksi)', $year);
        // $this->db->order_by('year(tgl_transaksi)', 'ASC');
        //$data = $this->db->query("SELECT month(tgl_transaksi) as bulan,SUM(saldo) as total FROM transaksi   where year(tgl_transaksi)=$year and no_reff='411'  GROUP BY month(tgl_transaksi) order by month(tgl_transaksi) ASC");
        $data = $this->db->query("SELECT month(tgl_transaksi) as bulan FROM transaksi   where year(tgl_transaksi)=$year GROUP BY month(tgl_transaksi) order by month(tgl_transaksi) ASC");
        return $data;
    }
}

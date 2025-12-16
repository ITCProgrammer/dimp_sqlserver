<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kartu_riwayat extends CI_Controller
{

    public $folder   = "kartu_riwayat";
    public $title    = "Daftar Kartu Riwayat Mesin";
    public $titleNOW = "Daftar Kartu Riwayat Mesin NOW";
    public $db2;

    public function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('inventorydit', true);
    }

    public function index()
    {
        $data['title'] = $this->title;

        $this->template->load('template', $this->folder . '/view', $data);
    }

    public function cetak($id)
    {
        $data['title'] = $this->title;
        $data['id']    = $id;
        $query         = $this->db->query("SELECT * FROM dept_device WHERE id = '$id'")->row();

        $this->load->view('kartu_riwayat/print', $data);
    }

    public function index_NOW()
    {
        $data['title'] = $this->titleNOW;

        $this->template->load('template', $this->folder . '/viewNOW', $data);
    }

    public function cetak_NOW($kode_mesin)
    {
        $data['title']      = $this->titleNOW;
        $data['kode_mesin'] = $kode_mesin;

        $this->load->view('kartu_riwayat/print_NOW', $data);
    }

    public function pemakaian_spare_parts()
    {
        $data['title'] = "Form Pemakaian Spare Part DIT";

        $this->template->load('template', $this->folder . '/pemakaian_sparepart', $data);
    }

    public function cetak_pemakaian_spare_part($kode_work_order, $InternalDocument = 'Tiket')
    {
        $data['title']            = "Form Pemakaian Spare Part DIT";
        $data['kode_work_order']  = $kode_work_order;
        $data['InternalDocument'] = $InternalDocument;

        $this->load->view('kartu_riwayat/print_pemakaian_spare_part', $data);
    }

    public function kartu_stock()
    {
        $data['title'] = "Form Kartu Stok DIT";

        $this->template->load('template', $this->folder . '/kartu_stok', $data);
    }

    public function kartu_stock_bydate()
    {
        $data['title'] = "Form Kartu Stok DIT By Date";

        $this->template->load('template', $this->folder . '/kartu_stok_bydate', $data);
    }

    public function laporan_open_tiket()
    {
        $data['title'] = "Laporan Opentiket";

        $this->template->load('template', $this->folder . '/laporan_opentiket', $data);
    }

    public function print_laporanstok()
    {
        $data['date1']    = $this->input->post('date1');
        $data['date2']    = $this->input->post('date2');
        $data['type']     = $this->input->post('type');
        $data['kategori'] = $this->input->post('kategori');

        if ($this->input->post('kategori') == '1') {
            $this->load->view('kartu_riwayat/print_laporanstok1', $data);
        } elseif ($this->input->post('kategori') == '2') {
            $this->load->view('kartu_riwayat/print_laporanstok2', $data);
        } elseif ($this->input->post('kategori') == '3') {
            $this->load->view('kartu_riwayat/print_laporanstok3', $data);
        }
    }

    public function print_kartustok()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        if ($this->input->post('kode_barang') == 'All') {
            $this->load->view('kartu_riwayat/print_kartustok_all', $data);
        } else {
            $this->load->view('kartu_riwayat/print_kartustok', $data);
        }
    }

    public function print_kartustok_bydate()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        if ($this->input->post('kode_barang') == 'All') {
            $this->load->view('kartu_riwayat/print_kartustok_all', $data);
        } else {
            $this->load->view('kartu_riwayat/print_kartustok_bydate', $data);
        }
    }

    // Kartu Stock ATK & SUPPLIES DIT
    public function kartu_stock_atk()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES DIT";

        $this->template->load('template', $this->folder . '/kartu_stock_atk', $data);
    }

    public function print_kartustok_atk()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk', $data);
    }

    // Kartu Riwayat MTC
    public function kartu_riwayat_mtc()
    {
        $data['title'] = "Kartu Riwayat Mesin MTC";

        $this->template->load('template', $this->folder . '/kartu_riwayat_mtc', $data);
    }

    public function print_kartu_riwayat_mtc($kode_mesin)
    {
        $data['kode_mesin'] = $kode_mesin;

        $this->load->view('kartu_riwayat/print_kartu_riwayat_mtc', $data);
    }

    // Kartu Stock MTC
    public function kartu_stock_mtc()
    {
        $data['title'] = "Kartu Stock MTC";

        $this->template->load('template', $this->folder . '/kartu_stock_mtc', $data);
    }

    public function print_kartustok_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_mtc', $data);
    }

    // Kartu Riwayat Transport
    public function kartu_riwayat_transport()
    {
        $data['title'] = "Kartu Riwayat PPC Transport";

        $this->template->load('template', $this->folder . '/kartu_riwayat_transport', $data);
    }

    public function print_kartu_riwayat_transport($kode_mesin)
    {
        $data['kode_mesin'] = $kode_mesin;

        $this->load->view('kartu_riwayat/print_kartu_riwayat_transport', $data);
    }

    // Kartu Stock Transport
    public function kartu_stock_transport()
    {
        $data['title'] = "Kartu Stock PPC Transport";

        $this->template->load('template', $this->folder . '/kartu_stock_transport', $data);
    }

    public function print_kartustok_transport()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_transport', $data);
    }

    // Kartu Stock Finishing
    public function kartu_stock_fin()
    {
        $data['title'] = "Kartu Stock Finishing";

        $this->template->load('template', $this->folder . '/kartu_stock_fin', $data);
    }

    public function print_kartustok_fin()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_fin', $data);
    }

    // Kartu Stock ATK & SUPPLIES FIN
    public function kartu_stock_atk_fin()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES Finishing";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_fin', $data);
    }

    public function print_kartustok_atk_fin()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_fin', $data);
    }

    // Kartu Stock ATK & SUPPLIES LAB
    public function kartu_stock_atk_lab()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES Laborat";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_lab', $data);
    }

    public function print_kartustok_atk_lab()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_lab', $data);
    }

    // Kartu Stock ATK & SUPPLIES BRS
    public function kartu_stock_atk_brs()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES Brushing";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_brs', $data);
    }

    public function print_kartustok_atk_brs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_brs', $data);
    }

    // Kartu Stock ATK & SUPPLIES CQA
    public function kartu_stock_atk_cqa()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES CQA";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_cqa', $data);
    }

    public function print_kartustok_atk_cqa()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_cqa', $data);
    }

    // Kartu Stock ATK & SUPPLIES QCF
    public function kartu_stock_atk_qcf()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES QCF";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_qcf', $data);
    }

    public function print_kartustok_atk_qcf()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_qcf', $data);
    }

    // Kartu Stock ATK & SUPPLIES TQ
    public function kartu_stock_atk_tq()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES TQ";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_tq', $data);
    }

    public function print_kartustok_atk_tq()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_tq', $data);
    }

    // Kartu Stock ATK & SUPPLIES KNT
    public function kartu_stock_atk_knt()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES KNT";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_knt', $data);
    }

    public function print_kartustok_atk_knt()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_knt', $data);
    }

    // Kartu Stock ATK & SUPPLIES DYE
    public function kartu_stock_atk_dye()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES DYE";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_dye', $data);
    }

    public function print_kartustok_atk_dye()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_dye', $data);
    }

    // Kartu Stock ATK & SUPPLIES HRD
    public function kartu_stock_atk_hrd()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES HRD";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_hrd', $data);
    }

    public function print_kartustok_atk_hrd()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_hrd', $data);
    }

    // Kartu Stock ATK & SUPPLIES QAI
    public function kartu_stock_atk_qai()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES QAI";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_qai', $data);
    }

    public function print_kartustok_atk_qai()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_qai', $data);
    }

    // Kartu Stock ATK & SUPPLIES PCS
    public function kartu_stock_atk_pcs()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES PCS";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_pcs', $data);
    }

    public function print_kartustok_atk_pcs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_pcs', $data);
    }

    // Kartu Stock Stationary MTC
    public function kartu_stock_stationary_mtc()
    {
        $data['title'] = "Form Kartu Stock Stationary MTC";

        $this->template->load('template', $this->folder . '/kartu_stock_stationary_mtc', $data);
    }

    public function print_kartustok_stationary_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_stationary_mtc', $data);
    }

    // Kartu Stock Supplies MTC
    public function kartu_stock_supplies_mtc()
    {
        $data['title'] = "Form Kartu Stock Supplies MTC";

        $this->template->load('template', $this->folder . '/kartu_stock_supplies_mtc', $data);
    }

    public function print_kartustok_supplies_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_supplies_mtc', $data);
    }

    // Laporan Stock Sparepart MTC
    public function laporan_stock_sparepart_mtc()
    {
        $data['title'] = "Form Laporan Stock Sparepart MTC";

        $this->template->load('template', $this->folder . '/laporan_stock_sparepart_mtc', $data);
    }

    public function print_laporan_stock_sparepart_mtc()
    {
        $data['date1'] = $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_laporan_stock_sparepart_mtc', $data);
    }

    // Kartu Stock Limbah MTC
    public function kartu_stock_limbah_mtc()
    {
        $data['title'] = "Form Kartu Stock Limbah MTC";

        $this->template->load('template', $this->folder . '/kartu_stock_limbah_mtc', $data);
    }

    public function print_kartu_stock_limbah_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_limbah_mtc', $data);
    }

    // Kartu Stock Intake MTC
    public function kartu_stock_intake_mtc()
    {
        $data['title'] = "Form Kartu Stock Intake MTC";

        $this->template->load('template', $this->folder . '/kartu_stock_intake_mtc', $data);
    }

    public function print_kartu_stock_intake_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_intake_mtc', $data);
    }

    // Laporan Stock Limbah Dan Intake MTC
    public function laporan_stock_limbah_intake_mtc()
    {
        $data['title'] = "Form Laporan Stock Limbah & Intake MTC";

        $this->template->load('template', $this->folder . '/laporan_stock_limbah_intake_mtc', $data);
    }

    public function print_laporan_stock_limbah_intake_mtc()
    {
        $data['date1'] = $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_laporan_stock_limbah_intake_mtc', $data);
    }

    // Kartu Stock ATK & SUPPLIES TAS
    public function kartu_stock_atk_tas()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES TAS";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_tas', $data);
    }

    public function print_kartustok_atk_tas()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_tas', $data);
    }

    // Kartu Stock ATK & SUPPLIES MNF
    public function kartu_stock_atk_mnf()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES MNF";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_mnf', $data);
    }

    public function print_kartustok_atk_mnf()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_mnf', $data);
    }

    // Kartu Stock ATK & SUPPLIES PPC
    public function kartu_stock_atk_ppc()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES PPC";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_ppc', $data);
    }

    public function print_kartustok_atk_ppc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_ppc', $data);
    }

    // Kartu Stock ATK & SUPPLIES MKT
    public function kartu_stock_atk_mkt()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES MKT";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_mkt', $data);
    }

    public function print_kartustok_atk_mkt()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_mkt', $data);

    }

    // Kartu Stock ATK & SUPPLIES RMP
    public function kartu_stock_atk_rmp()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES RMP";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_rmp', $data);
    }

    public function print_kartustok_atk_rmp()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_rmp', $data);

    }

    // Kartu Stock ATK & SUPPLIES GKG
    public function kartu_stock_atk_gkg()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES GKG";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_gkg', $data);
    }

    public function print_kartustok_atk_gkg()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_gkg', $data);

    }

    // Kartu Stock ATK & SUPPLIES GDB
    public function kartu_stock_atk_gdb()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES GDB";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_gdb', $data);
    }

    public function print_kartustok_atk_gdb()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_gdb', $data);

    }

    // Kartu Stock ATK & SUPPLIES GKJ
    public function kartu_stock_atk_gkj()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES GKJ";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_gkj', $data);
    }

    public function print_kartustok_atk_gkj()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_gkj', $data);

    }

    // Kartu Stock ATK & SUPPLIES ACC
    public function kartu_stock_atk_acc()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES ACC";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_acc', $data);
    }

    public function print_kartustok_atk_acc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_acc', $data);

    }

    // Kartu Stock ATK & SUPPLIES FNC
    public function kartu_stock_atk_fnc()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES FNC";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_fnc', $data);
    }

    public function print_kartustok_atk_fnc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_fnc', $data);

    }

    // Kartu Stock ATK & SUPPLIES CSR
    public function kartu_stock_atk_csr()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES CSR";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_csr', $data);
    }

    public function print_kartustok_atk_csr()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_csr', $data);

    }

    // Kartu Stock ATK & SUPPLIES GAS
    public function kartu_stock_atk_gas()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES GAS";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_gas', $data);
    }

    public function print_kartustok_atk_gas()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_gas', $data);

    }

    // Kartu Stock ATK & SUPPLIES CPL
    public function kartu_stock_atk_cpl()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES CPL";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_cpl', $data);
    }

    public function print_kartustok_atk_cpl()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_cpl', $data);

    }

    // Kartu Stock ATK & SUPPLIES GHS
    public function kartu_stock_atk_ghs()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES GHS";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_ghs', $data);
    }

    public function print_kartustok_atk_ghs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_ghs', $data);

    }

    // Kartu Stock ATK & SUPPLIES YND
    public function kartu_stock_atk_ynd()
    {
        $data['title'] = "Form Kartu Stock ATK & SUPPLIES YND";

        $this->template->load('template', $this->folder . '/kartu_stock_atk_ynd', $data);
    }

    public function print_kartustok_atk_ynd()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_atk_ynd', $data);

    }

    // Kartu Stock Sparepart BRS - MTC (Fast Move)
    public function kartu_stock_sparepart_brs()
    {
        $data['title'] = "Form Kartu Stock Sparepart BRS (Fast Move)";

        $this->template->load('template', $this->folder . '/kartu_stock_sparepart_brs', $data);
    }

    public function print_kartustok_sparepart_brs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_sparepart_brs', $data);

    }

    // Kartu Stock Sparepart BRS - MTC (Slow Move)
    public function kartu_stock_sparepart_brs_slow()
    {
        $data['title'] = "Form Kartu Stock Sparepart BRS (Slow Move)";

        $this->template->load('template', $this->folder . '/kartu_stock_sparepart_brs_slow', $data);
    }

    public function print_kartustok_sparepart_brs_slow()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');

        $this->load->view('kartu_riwayat/print_kartustok_sparepart_brs_slow', $data);

    }

    //laporan sta DIT
    public function laporan_rekap_sta()
    {
        $data['title']      = "Laporan Rekap STA DIT";
        $data['dept']       = "DIT";
        $data['laporan']    = "laporan_rekap_sta";
        $data['print']      = "print_laporan_rekap_sta";
        $data['tabel_data'] = "tbl_master_barang_atk_dit";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');
        $data['tabel_data'] = "tbl_master_barang_atk_dit";
        $data['wh']          = "M401";
        $data['dept']        = "DIT";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_acc()
    {
        $data['title']      = "Laporan Rekap STA ACC";
        $data['dept']       = "ACC";
        $data['laporan']    = "laporan_rekap_sta_acc";
        $data['print']      = "print_laporan_rekap_sta_acc";
        $data['tabel_data'] = "tbl_master_barang_atk_acc";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_acc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_acc";
        $data['wh']          = "M421";
        $data['dept']        = "ACC";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_brs()
    {
        $data['title']      = "Laporan Rekap STA BRS";
        $data['dept']       = "BRS";
        $data['laporan']    = "laporan_rekap_sta_brs";
        $data['print']      = "print_laporan_rekap_sta_brs";
        $data['tabel_data'] = "tbl_master_barang_atk_brs";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_brs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_brs";
        $data['wh']          = "M403";
        $data['dept']        = "BRS";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_cpl()
    {
        $data['title']      = "Laporan Rekap STA CPL";
        $data['dept']       = "CPL";
        $data['laporan']    = "laporan_rekap_sta_cpl";
        $data['print']      = "print_laporan_rekap_sta_cpl";
        $data['tabel_data'] = "tbl_master_barang_atk_cpl";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_cpl()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_cpl";
        $data['wh']          = "M425";
        $data['dept']        = "CPL";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_cqa()
    {
        $data['title']      = "Laporan Rekap STA CQA";
        $data['dept']       = "CQA";
        $data['laporan']    = "laporan_rekap_sta_cqa";
        $data['print']      = "print_laporan_rekap_sta_cqa";
        $data['tabel_data'] = "tbl_master_barang_atk_cqa";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_cqa()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_cqa";
        $data['wh']          = "M405";
        $data['dept']        = "CQA";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_csr()
    {
        $data['title']      = "Laporan Rekap STA CSR";
        $data['dept']       = "CSR";
        $data['laporan']    = "laporan_rekap_sta_csr";
        $data['print']      = "print_laporan_rekap_sta_csr";
        $data['tabel_data'] = "tbl_master_barang_atk_csr";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_csr()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_csr";
        $data['wh']          = "M422";
        $data['dept']        = "CSR";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_dye()
    {
        $data['title']      = "Laporan Rekap STA DYE";
        $data['dept']       = "DYE";
        $data['laporan']    = "laporan_rekap_sta_dye";
        $data['print']      = "print_laporan_rekap_sta_dye";
        $data['tabel_data'] = "tbl_master_barang_atk_dye";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }
//di sini check
    public function print_laporan_rekap_sta_dye()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_dye";
        $data['wh']          = "M406";
        $data['dept']        = "DYE";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_fin()
    {
        $data['title']      = "Laporan Rekap STA FIN";
        $data['dept']       = "FIN";
        $data['laporan']    = "laporan_rekap_sta_fin";
        $data['print']      = "print_laporan_rekap_sta_fin";
        $data['tabel_data'] = "tbl_master_barang_atk_fin";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_fin()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_fin";
        $data['wh']          = "M404";
        $data['dept']        = "FIN";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_fnc()
    {
        $data['title']      = "Laporan Rekap STA FNC";
        $data['dept']       = "FNC";
        $data['laporan']    = "laporan_rekap_sta_fnc";
        $data['print']      = "print_laporan_rekap_sta_fnc";
        $data['tabel_data'] = "tbl_master_barang_atk_fnc";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_fnc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_fnc";
        $data['wh']          = "M423";
        $data['dept']        = "FNC";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_gas()
    {
        $data['title']      = "Laporan Rekap STA GAS";
        $data['dept']       = "GAS";
        $data['laporan']    = "laporan_rekap_sta_gas";
        $data['print']      = "print_laporan_rekap_sta_gas";
        $data['tabel_data'] = "tbl_master_barang_atk_gas";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_gas()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_gas";
        $data['wh']          = "M424";
        $data['dept']        = "GAS";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_gdb()
    {
        $data['title']      = "Laporan Rekap STA GDB";
        $data['dept']       = "GDB";
        $data['laporan']    = "laporan_rekap_sta_gdb";
        $data['print']      = "print_laporan_rekap_sta_gdb";
        $data['tabel_data'] = "tbl_master_barang_atk_gdb";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_gdb()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_gdb";
        $data['wh']          = "M419";
        $data['dept']        = "GDB";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_ghs()
    {
        $data['title']      = "Laporan Rekap STA GHS";
        $data['dept']       = "GHS";
        $data['laporan']    = "laporan_rekap_sta_ghs";
        $data['print']      = "print_laporan_rekap_sta_ghs";
        $data['tabel_data'] = "tbl_master_barang_atk_ghs";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_ghs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_ghs";
        $data['wh']          = "M427";
        $data['dept']        = "GHS";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_gkg()
    {
        $data['title']      = "Laporan Rekap STA GKG";
        $data['dept']       = "GKG";
        $data['laporan']    = "laporan_rekap_sta_gkg";
        $data['print']      = "print_laporan_rekap_sta_gkg";
        $data['tabel_data'] = "tbl_master_barang_atk_gkg";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_gkg()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_gkg";
        $data['wh']          = "M418";
        $data['dept']        = "GKG";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_hrd()
    {
        $data['title']      = "Laporan Rekap STA HRD";
        $data['dept']       = "HRD";
        $data['laporan']    = "laporan_rekap_sta_hrd";
        $data['print']      = "print_laporan_rekap_sta_hrd";
        $data['tabel_data'] = "tbl_master_barang_atk_hrd";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_hrd()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_hrd";
        $data['wh']          = "M411";
        $data['dept']        = "HRD";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_knt()
    {
        $data['title']      = "Laporan Rekap STA KNT";
        $data['dept']       = "KNT";
        $data['laporan']    = "laporan_rekap_sta_knt";
        $data['print']      = "print_laporan_rekap_sta_knt";
        $data['tabel_data'] = "tbl_master_barang_atk_knt";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_knt()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_knt";
        $data['wh']          = "M408";
        $data['dept']        = "KNT";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_lab()
    {
        $data['title']      = "Laporan Rekap STA LAB";
        $data['dept']       = "LAB";
        $data['laporan']    = "laporan_rekap_sta_lab";
        $data['print']      = "print_laporan_rekap_sta_lab";
        $data['tabel_data'] = "tbl_master_barang_atk_lab";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_lab()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_lab";
        $data['wh']          = "M402";
        $data['dept']        = "LAB";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_mkt()
    {
        $data['title']      = "Laporan Rekap STA MKT";
        $data['dept']       = "MKT";
        $data['laporan']    = "laporan_rekap_sta_mkt";
        $data['print']      = "print_laporan_rekap_sta_mkt";
        $data['tabel_data'] = "tbl_master_barang_atk_mkt";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_mkt()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_mkt";
        $data['wh']          = "M416";
        $data['dept']        = "MKT";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_mnf()
    {
        $data['title']      = "Laporan Rekap STA MNF";
        $data['dept']       = "MNF";
        $data['laporan']    = "laporan_rekap_sta_mnf";
        $data['print']      = "print_laporan_rekap_sta_mnf";
        $data['tabel_data'] = "tbl_master_barang_atk_mnf";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_mnf()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_mnf";
        $data['wh']          = "M414";
        $data['dept']        = "MNF";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_pcs()
    {
        $data['title']      = "Laporan Rekap STA PCS";
        $data['dept']       = "PCS";
        $data['laporan']    = "laporan_rekap_sta_pcs";
        $data['print']      = "print_laporan_rekap_sta_pcs";
        $data['tabel_data'] = "tbl_master_barang_atk_pcs";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_pcs()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_pcs";
        $data['wh']          = "M409";
        $data['dept']        = "PCS";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_ppc()
    {
        $data['title']      = "Laporan Rekap STA PPC";
        $data['dept']       = "PPC";
        $data['laporan']    = "laporan_rekap_sta_ppc";
        $data['print']      = "print_laporan_rekap_sta_ppc";
        $data['tabel_data'] = "tbl_master_barang_atk_ppc";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_ppc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_ppc";
        $data['wh']          = "M415";
        $data['dept']        = "PPC";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_qai()
    {
        $data['title']      = "Laporan Rekap STA QAI";
        $data['dept']       = "QAI";
        $data['laporan']    = "laporan_rekap_sta_qai";
        $data['print']      = "print_laporan_rekap_sta_qai";
        $data['tabel_data'] = "tbl_master_barang_atk_qai";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_qai()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_qai";
        $data['wh']          = "M410";
        $data['dept']        = "QAI";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_qcf()
    {
        $data['title']      = "Laporan Rekap STA QCF";
        $data['dept']       = "QCF";
        $data['laporan']    = "laporan_rekap_sta_qcf";
        $data['print']      = "print_laporan_rekap_sta_qcf";
        $data['tabel_data'] = "tbl_master_barang_atk_qcf";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_qcf()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_qcf";
        $data['wh']          = "M407";
        $data['dept']        = "QCF";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_rmp()
    {
        $data['title']      = "Laporan Rekap STA RMP";
        $data['dept']       = "RMP";
        $data['laporan']    = "laporan_rekap_sta_rmp";
        $data['print']      = "print_laporan_rekap_sta_rmp";
        $data['tabel_data'] = "tbl_master_barang_atk_rmp";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_rmp()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_rmp";
        $data['wh']          = "M417";
        $data['dept']        = "RMP";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_tas()
    {
        $data['title']      = "Laporan Rekap STA TAS";
        $data['dept']       = "TAS";
        $data['laporan']    = "laporan_rekap_sta_tas";
        $data['print']      = "print_laporan_rekap_sta_tas";
        $data['tabel_data'] = "tbl_master_barang_atk_tas";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_tas()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_tas";
        $data['wh']          = "M413";
        $data['dept']        = "TAS";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_tq()
    {
        $data['title']      = "Laporan Rekap STA TQ";
        $data['dept']       = "TQ";
        $data['laporan']    = "laporan_rekap_sta_tq";
        $data['print']      = "print_laporan_rekap_sta_tq";
        $data['tabel_data'] = "tbl_master_barang_atk_tq";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_tq()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_tq";
        $data['wh']          = "M407";
        $data['dept']        = "TQ";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
    
    public function laporan_rekap_sta_ynd()
    {
        $data['title']      = "Laporan Rekap STA YND";
        $data['dept']       = "YND";
        $data['laporan']    = "laporan_rekap_sta_ynd";
        $data['print']      = "print_laporan_rekap_sta_ynd";
        $data['tabel_data'] = "tbl_master_barang_atk_ynd";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_ynd()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_atk_ynd";
        $data['wh']          = "M426";
        $data['dept']        = "YND";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }

    public function laporan_rekap_sta_mtc()
    {
        $data['title']      = "Laporan Rekap STA MTC";
        $data['dept']       = "MTC";
        $data['laporan']    = "laporan_rekap_sta_mtc";
        $data['print']      = "print_laporan_rekap_sta_mtc";
        $data['tabel_data'] = "tbl_master_barang_stationary_mtc";

        $this->template->load('template', $this->folder . '/laporan_rekap_sta', $data);
    }

    public function print_laporan_rekap_sta_mtc()
    {
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['date1']       = $this->input->post('date1');
        $data['date2']       = $this->input->post('date2');   
        $data['tabel_data'] = "tbl_master_barang_stationary_mtc";
        $data['wh']          = "M412";
        $data['dept']        = "MTC";

        $this->load->view('kartu_riwayat/print_laporan_rekap_sta', $data);
    }
}

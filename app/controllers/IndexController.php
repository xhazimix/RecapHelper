<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        // Add some local CSS assets
        $this->assets->collection('headerCss')
            ->addCss('css/sb-admin-2.min.css')
            ->addCss('vendor/datatables/dataTables.bootstrap4.min.css')
            ->addCss('vendor/fontawesome-free/css/all.min.css');

        // And some local JavaScript assets
        $this->assets->collection('footerJs')
            ->addJs('vendor/jquery/jquery.min.js')
            ->addJs('vendor/bootstrap/js/bootstrap.bundle.min.js')
            ->addJs('vendor/jquery-easing/jquery.easing.min.js')
            ->addJs('js/sb-admin-2.min.js')
            ->addJs('vendor/datatables/jquery.dataTables.min.js')
            ->addJs('vendor/datatables/dataTables.bootstrap4.min.js')
            ->addJs('js/demo/datatables-demo.js');
        
        // Rekap kategori dana - jumlah orang dan uang
        $count_cust = Bantuan::count(
            [
                'jumlah_uang != 0'
            ]
        );
        $this->view->money_customer = $count_cust;

        $sum_money = Bantuan::sum(
            [
                'column' => 'jumlah_uang'
            ]
        );
        $this->view->money = $sum_money;

        //tabel kategori dana
        $this->view->danabantuans = Bantuan::find(
            [
                'jenis_bantuan = "Dana"'
            ]
        );
        $idTransaksi = $danabantuans->id_transaksi;
        $this->view->danacustomers = Transaksi::find(
            [
                'id' => $idTransaksi
            ]
        );

        // Rekap kategori bahan makanan - jumlah orang - distribusi
        $count_cust = Bantuan::count(
            [
                'jenis_bantuan = "Bahan Makanan"',
                "distinct" => "id_transaksi"
            ]
        );
        $this->view->food_customer = $count_cust;

        $helpname = Bantuan::find(
            [
                'columns' => 'DISTINCT nama_barang',
                'jenis_bantuan = "Bahan Makanan"'
            ]
        );
        $this->view->reliefitem = $helpname;

        //tabel kategori makanan
        $this->view->makananbantuans = Bantuan::find(
            [
                'jenis_bantuan = "Bahan Makanan"'
            ]
        );
        $idTransaksi = $makananbantuans->id_transaksi;
        $this->view->makanancustomers = Transaksi::find(
            [
                'id' => $idTransaksi
            ]
        );

        // Rekap kategori kesehatan - jumlah orang - distribusi
        $count_cust = Bantuan::count(
            [
                'jenis_bantuan = "Kesehatan"',
                "distinct" => "id_transaksi"
            ]
        );
        $this->view->meds_customer = $count_cust;

        $help_name = Bantuan::find(
            [
                'columns' => 'DISTINCT nama_barang',
                'jenis_bantuan = "Kesehatan"'
            ]
        );
        $this->view->reliefitems = $help_name;

        //tabel kategori kesehatan
        $this->view->kesehatanbantuans = Bantuan::find(
            [
                'jenis_bantuan = "Kesehatan"'
            ]
        );
        $idTransaksi = $kesehatanbantuans->id_transaksi;
        $this->view->kesehatancustomers = Transaksi::find(
            [
                'id' => $idTransaksi
            ]
        );
    }
}

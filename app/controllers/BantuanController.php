<?php

use Phalcon\Mvc\Controller;

class BantuanController extends Controller
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

        $this->view->customer = Transaksi::find();
    }

    public function createAction()
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
            ->addJs('vendor/chart.js/Chart.min.js')
            ->addJs('js/demo/chart-area-demo.js')
            ->addJs('js/demo/chart-pie-demo.js')
            ->addJs('vendor/datatables/jquery.dataTables.min.js')
            ->addJs('vendor/datatables/dataTables.bootstrap4.min.js')
            ->addJs('js/demo/datatables-demo.js');
    }

    
    public function storeAction()
    {  
        $transaksi = new Transaksi();
        $data = $this->request->getPost();
  
        $transaksi->assign(
            [
                'nama_penggalang' => $data['nama']
            ]
        );
        $transaksi->save();

        $transaksiId = $transaksi->id;

        for($i=0; $i < count($data['kat_bantuan']); $i++){ 
            $bantuan = new Bantuan();
            $bantuan->assign( 
                [ 
                    'id_transaksi' => $transaksiId,
                    'jenis_bantuan' => $data['kat_bantuan'][$i],
                    'jumlah_uang' => $data['jum_dana'][$i],
                    'nama_barang' => $data['barang'][$i]
                ]
            );
            $success = $bantuan->create();
        }
        
        $this->response->redirect('/bantuan');
    }

    public function detailAction($id){ 
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
            ->addJs('vendor/chart.js/Chart.min.js')
            ->addJs('js/demo/chart-area-demo.js')
            ->addJs('js/demo/chart-pie-demo.js')
            ->addJs('vendor/datatables/jquery.dataTables.min.js')
            ->addJs('vendor/datatables/dataTables.bootstrap4.min.js')
            ->addJs('js/demo/datatables-demo.js');

        $this->view->customer = Transaksi::findFirst(
            [
                "id = $id" 
            ]
        );

        $this->view->details = Bantuan::find(
            [
                "id_transaksi = $id" 
            ]
        );
    }

    public function editAction($id)
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
            ->addJs('vendor/chart.js/Chart.min.js')
            ->addJs('js/demo/chart-area-demo.js')
            ->addJs('js/demo/chart-pie-demo.js')
            ->addJs('vendor/datatables/jquery.dataTables.min.js')
            ->addJs('vendor/datatables/dataTables.bootstrap4.min.js')
            ->addJs('js/demo/datatables-demo.js');

        $this->view->customer = Transaksi::findFirst(
            [
                "id = $id" 
            ]
        );

        $this->view->details = Bantuan::find(
            [
                "id_transaksi = $id" 
            ]
        );
    }

    public function updateAction($id)
    {
        // cari transaksi yg mau di edit
        $transaksi = Transaksi::findFirstById($id);
        
        // ambil semua data dari form
        $data = $this->request->getPost();
        
        // update daata transaksi
        $transaksi->assign(
            [
                'nama_penggalang' => $data['nama']
            ]
        );
        $transaksi->save();

        // ambil id trans
        $transaksiId = $transaksi->id;
        
        // hapus semua data bantuan yg memiliki id transaksi
        $oldBantuan  = Bantuan::find(
            [
                "id_transaksi = $transaksiId" 
            ]
        );
        $oldBantuan->delete();
        
        // ganti dengan data bantuan yg baru
        $i=0;
        while($data['kat_bantuan']!=NULL){ 
            $bantuan = new Bantuan();
            $bantuan->assign( 
                [ 
                    'id_transaksi' => $transaksiId,
                    'jenis_bantuan' => $data['kat_bantuan'][$i],
                    'jumlah_uang' => $data['jum_dana'][$i],
                    'nama_barang' => $data['barang'][$i]
                ]
            );
            $success = $bantuan->create(); 
            $i++;
        }
        
        // kelar~
        $this->response->redirect('/bantuan');
    }

    public function deleteAction($id)
    {
        // cari transaksi yg mau di hapus
        $transaksi = Transaksi::findFirstById($id);

        // ambil id trans
        $transaksiId = $transaksi->id;
        
        // hapus semua data bantuan yg memiliki id transaksi
        $bantuan  = Bantuan::find(
            [
                "id_transaksi = $transaksiId" 
            ]
        );
        $bantuan->delete();
        $transaksi->delete();
        
        // kelar~
        $this->response->redirect('/bantuan');
    }
}

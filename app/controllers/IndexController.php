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
            ->addJs('vendor/chart.js/Chart.min.js')
            ->addJs('js/demo/chart-area-demo.js')
            ->addJs('js/demo/chart-pie-demo.js')
            ->addJs('vendor/datatables/jquery.dataTables.min.js')
            ->addJs('vendor/datatables/dataTables.bootstrap4.min.js')
            ->addJs('js/demo/datatables-demo.js');
    }
}

<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\Bidang;
use App\Models\Lemdik;
use App\Models\Peserta;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $jumlah_peserta = Peserta::count();
        $jumlah_opd = Opd::count();
        $jumlah_bidang = Bidang::count();
        $jumlah_lemdik = Lemdik::count();

        $info_peserta = new InfoBox('Jumlah User','user','blue','/admin/peserta',$jumlah_peserta);
        $info_opd = new InfoBox('Jumlah OPD','opd','yellow','/admin/opd',$jumlah_opd);
        $info_bidang = new InfoBox('Jumlah Bidang','bidang','red','/admin/bidang',$jumlah_bidang);
        $info_lemdik = new InfoBox('Jumlah Lemdik','lemdik','green','admin/lemdik',$jumlah_lemdik);

        return $content
            ->title('Dashboard')
            ->description('Description...')
            // ->body(view('chart.bar'))
            ->row(function (Row $row) use ($info_opd,$info_bidang,$info_lemdik,$info_peserta) {
                $row->column(3, function (Column $column) use ($info_peserta) {
                    $column->append($info_peserta->render());
                });
                $row->column(3, function (Column $column) use ($info_opd) {
                    $column->append($info_opd->render());
                });
                $row->column(3, function (Column $column) use ($info_bidang) {
                    $column->append($info_bidang->render());
                });
                $row->column(3, function (Column $column) use ($info_lemdik) {
                    $column->append($info_lemdik->render());
                });
            });
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\Bidang;
use App\Models\Lemdik;
use App\Models\Opd;
use App\Models\Jenis;
use App\Models\Peserta;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Peserta';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Peserta());

        //$grid->filter(function($filter){

            // Remove the default id filter
            // $filter->disableIdFilter();
        
            // Add a column filter
            // $filter->like('nama','nama');
            // $filter->like('opd.nama','OPD');
        
        //});

        $grid->column('id', __('No'));
        $grid->column('nama', __('Nama'));
        $grid->column('lemdik.lemdik',__('Lembaga Pendidikan'));
        $grid->column('opd.nama', __('OPD'));
        $grid->column('jenis', __('Jenis'));
        $grid->column('bidang.nama', __('Bidang'));
        $grid->column('email',__('Email'));
        $grid->column('judul_proyek', __('Judul proyek'));
        $grid->column('no_telp_peserta', __('No telp peserta'));
        $grid->column('pembimbing_lemdik', __('Pembimbing lemdik'));
        $grid->column('no_telp_pembimbing', __('No telp pembimbing'));
        $grid->column('laporan_akhir', __('Laporan Akhir'));
    
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Peserta::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('lemdik_id', __('Lemdik'));
        $show->field('opd_id', __('OPD'));
        $show->field('bidang_id', __('Bidang'));
        $show->field('email', __('Email'));
        $show->field('jenis_id', __('Jenis'));
        $show->field('judul_proyek', __('Judul proyek'));
        $show->field('no_telp_peserta', __('No telp peserta'));
        $show->field('pembimbing_lemdik', __('Pembimbing lemdik'));
        $show->field('no_telp_pembimbing', __('No telp pembimbing'));
        $show->field('laporan_akhir', __('Laporan Akhir'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Peserta());

        $form->text('nama', __('Nama'));
        $daftarlemdik = Lemdik::all()->pluck('lemdik','id');
        $form->select('lemdik_id', __('Lembaga Pendidikan'))->options($daftarlemdik);
        $daftaropd = Opd::all()->pluck('nama','id');
        $form->select('opd_id', __('OPD'))->options($daftaropd)->load('bidang_id', '/admin/api/bidang_id');
        $daftarjenis = Jenis::all()->pluck('nama','id');
        $form->select('jenis_id', __('Jenis'))->options($daftarjenis);
        $daftarbidang = Bidang::all()->pluck('nama','id', 'opd_id');
        $form->select('bidang_id', __('Bidang'))->options($daftarbidang);
        $form->text('email', __('Email'));
        $form->text('judul_proyek', __('Judul proyek'));
        $form->text('no_telp_peserta', __('No telp peserta'));
        $form->text('pembimbing_lemdik', __('Pembimbing lemdik'));
        $form->text('no_telp_pembimbing', __('No telp pembimbing'));
        $form->file('laporan_akhir', __('Laporan Akhir'))->rules('mimes:pdf');

        return $form;
    }

    public function bidang_id(Request $request)
    {
        $opd_id = $request->get('q');

        return Bidang::where('opd_id', $opd_id)->get(['id', DB::raw('nama as text')]); //untuk mengambil data bidang berdasarkan OPD yg dipilih
    }
}
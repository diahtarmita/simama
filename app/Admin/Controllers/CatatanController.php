<?php

namespace App\Admin\Controllers;

use App\Models\Catatan;
use App\Models\Lemdik;
use App\Models\Opd;
use App\Models\Bidang; 
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CatatanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Catatan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Catatan());

        $grid->column('id', __('Id'));
        $grid->column('nama', __('Nama'));
        $grid->column('tanggal', __('Tanggal'));
        $grid->column('uraian_kegiatan', __('Uraian kegiatan'));
        $grid->column('lemdik_id', __('Lemdik id'));
        $grid->column('opd_id', __('Opd id'));
        $grid->column('bidang_id', __('Bidang id'));
        $grid->column('disetujui', __('Disetujui'));

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
        $show = new Show(Catatan::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('tanggal', __('Tanggal'));
        $show->field('uraian_kegiatan', __('Uraian kegiatan'));
        $show->field('lemdik_id', __('Lemdik id'));
        $show->field('opd_id', __('Opd id'));
        $show->field('bidang_id', __('Bidang id'));
        $show->field('disetujui', __('Disetujui'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Catatan());

        $form->text('nama', __('Nama'));
        $form->date('tanggal', __('Tanggal'))->default(date('Y-m-d'));
        $form->text('uraian_kegiatan', __('Uraian kegiatan'));

        $daftarlemdik = Lemdik::all()->pluck('lemdik', 'email','alamat','id');
        $form->select('lemdik_id', __('Lemdik id'))->options($daftarlemdik);

        $daftaropd = Opd::all()->pluck('nama', 'id');
        $form->select('opd_id', __('Opd id'))->options($daftaropd);
        
        $daftarbidang = Bidang::all()->pluck('nama', 'id', 'opd_id');
        $form->select('bidang_id', __('Bidang'))->options($daftarbidang);

        $form->checkbox('disetujui', __('Disetujui'))->options(['1' => 'Setuju'])->default('1');

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\Catatan;
use App\Models\Lemdik;
use App\Models\Opd;
use App\Models\Bidang; 
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
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

        $grid->filter(function ($filter) {

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('peserta.nama','Nama');
        });

        $grid->column('peserta.id', __('Id'));
        // $grid->number('No')->display(function ($value, $column) {
        //     return $column->getRowNumber();
        // });
        $grid->column('peserta.nama', __('Nama'));
        $grid->column('tanggal', __('Tanggal'));
        $grid->column('uraian_kegiatan', __('Uraian kegiatan'));

        $states = [
            'on'  => ['value' => 1, 'text' => 'disetujui', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'belum disetujui', 'color' => 'danger'],
        ];
        $grid->column('disetujui', __('Disetujui'))->switch($states);

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

        $show->field('peserta_id', __('No')); //edit tania tadinya id saja
        $show->field('nama', __('Nama'));
        $show->field('tanggal', __('Tanggal'));
        $show->field('uraian_kegiatan', __('Uraian kegiatan'));
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

        // $form->text('nama', __('Nama'));
        $form->date('tanggal', __('Tanggal'))->default(date('Y-m-d'));
        $form->text('uraian_kegiatan', __('Uraian kegiatan'));

        $states = [
            'on'  => ['value' => 1, 'text' => 'disetujui', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'belum disetujui', 'color' => 'danger'],
        ];
        $form->switch('disetujui', 'Disetujui')->states($states);

        return $form;


    }
}

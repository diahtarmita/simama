<?php

namespace App\Admin\Controllers;

use App\Models\Bidang;
use App\Models\Opd;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;


class BidangController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bidang';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bidang());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('nama','Bidang');
            $filter->like('opd.nama','OPD');
        
        });

        $grid->column('nama', __('Bidang'));
        $grid->column('opd.nama', __('OPD'));

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
        $show = new Show(Bidang::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('opd_id', __('Opd id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */

    protected function form()
    {
        $form = new Form(new Bidang());

        $daftaropd = Opd::all()->pluck('nama', 'id');
        $form->text('nama', __('Nama'));
        $form->select('opd_id', __('Opd id'))->options($daftaropd);

        
        return $form;
    }
}

    
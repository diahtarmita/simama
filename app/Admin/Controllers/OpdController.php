<?php

namespace App\Admin\Controllers;

use App\Models\Opd;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OpdController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Organisasi Perangkat Daerah (OPD)';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Opd());

        $grid->filter(function ($filter) {

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('nama', 'OPD');
        });

        $grid->column('nama', __('Nama OPD'));

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
        $show = new Show(Opd::findOrFail($id));

        $show->field('id', __('No'));
        $show->field('nama', __('Nama OPD'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Opd());

        $form->text('nama', __('Nama OPD'));

        $form->hasMany('bidang', function (Form\NestedForm $form) {
            $form->text('nama');
        });

        return $form;
    }
}

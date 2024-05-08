<?php

namespace App\Admin\Controllers;

use App\Models\Lemdik;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LemdikController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lembaga Pendidikan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lemdik());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('nama','Lembaga Pendidikan');
        
        });

        $grid->column('lemdik', __('Lembaga Pendidikan'));
        $grid->column('email', __('Email'));
        $grid->column('alamat', __('Alamat'));

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
        $show = new Show(Lemdik::findOrFail($id));

        $show->field('id', __('No'));
        $show->field('lemdik', __('Lembaga Pendidikan'));
        $show->field('email', __('Email'));
        $show->field('alamat', __('Alamat'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Lemdik());

        $form->text('lemdik', __('Lembaga Pendidikan'));
        $form->email('email', __('Email'));
        $form->text('alamat', __('Alamat'));

        return $form;
    }
}

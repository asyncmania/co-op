<?php

namespace Modules\Ledgers\Forms;

use Kris\LaravelFormBuilder\Form;

class LedgersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('member_id', 'select', [
                'label' => 'Member',
                'empty_value' => '-- select a member --',
                'choices' => \Members::all()->pluck('name', 'id')->all()
            ])
            ->add('start_date', 'text', [
                'label' => 'Start Date',
                'attr' => ['class'=>'form-control date-picker','placeholder'=>'dd/mm/yyyy']
            ])
            ->add('end_date', 'text', [
                'label' => 'End Date',
                'attr' => ['class'=>'form-control date-picker','placeholder'=>'dd/mm/yyyy']
            ])
            ->add('thrift_savings', 'number', [
                'label' => 'Thrift Savings'
            ])
            ->add('share_capital', 'number', [
                'label' => 'Share Capital'
            ])
            ->add('loan_balance', 'number', [
                'label' => 'Loan Balance'
            ])
            ->add('loan_interest', 'number', [
                'label' => 'Loan Interest'
            ]);;
    }
}

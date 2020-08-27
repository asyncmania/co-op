<?php

namespace Modules\Balances\Forms;

use Kris\LaravelFormBuilder\Form;

class BalancesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('balance_type', 'select', [
                'label' => 'Balance Type',
                'empty_value' => '-- select a type --',
                'choices' => config('balances.types'),
            ])
            ->add('start_date', 'text', [
                'label' => 'Start Date',
                'attr' => ['class'=>'form-control date-picker','placeholder'=>'dd/mm/yyyy']
            ])
            ->add('end_date', 'text', [
                'label' => 'End Date',
                'attr' => ['class'=>'form-control date-picker','placeholder'=>'dd/mm/yyyy']
            ])
            ->add('particulars', 'text', [
                'label' => 'Particulars'
            ])
            ->add('debit_amount', 'number', [
                'label' => 'Debit Amount'
            ])
            ->add('credit_amount', 'number', [
                'label' => 'Credit Amount'
            ]);
    }
}

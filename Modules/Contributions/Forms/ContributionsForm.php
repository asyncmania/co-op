<?php

namespace Modules\Contributions\Forms;

use Kris\LaravelFormBuilder\Form;

class ContributionsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('member_id', 'select', [
                'label' => 'Member',
                'empty_value' => '-- select a member --',
                'choices' => \Members::all()->pluck('name', 'id')->all()
            ])
            ->add('contribution_date', 'text', [
                'label' => 'Contribution Date',
                'attr' => ['class'=>'form-control date-picker','placeholder'=>'dd/mm/yyyy']
            ])
            ->add('particulars', 'text', [
                'label' => 'Particulars'
            ])
            ->add('type', 'select', [
                'label' => 'Type',
                'empty_value' => '-- select a type --',
                'choices' => [
                    'thrift savings' => 'thrift savings',
                    'loan' => 'loan',
                    'share capital' => 'share capital',
                ],
            ])
            ->add('debit_amount', 'number', [
                'label' => 'Debit Amount'
            ])
            ->add('credit_amount', 'number', [
                'label' => 'Credit Amount'
            ])
            ->add('balance', 'number', [
                'label' => 'Balance'
            ]);
    }
}

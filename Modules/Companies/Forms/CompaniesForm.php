<?php

namespace Modules\Companies\Forms;

use Kris\LaravelFormBuilder\Form;

class CompaniesForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text',[
            'label' => 'Name of Society',
            'attr' => ['required']
        ]);
        $this->add('registration_number', 'text',[
            'label' => 'Registration Number',
            'attr' => ['required']
        ]);
        $this->add('type', 'select', [
            'label'       => 'Type of Cooperative',
            'choices'     => [
                'Primary' => 'Primary',
                'Secondary/Union' => 'Secondary/Union',
                'State Apex/Federation' => 'State Apex/Federation',
                'National Apex/Federation' => 'National Apex/Federation',
                'National Primary' => 'National Primary',
            ],
            'empty_value' => '- Set type of cooperative -',
            'attr' => ['required']
        ]);
        $this->add('email', 'text',[
            'label' => 'Society Email Address',
            'attr' => ['required']
        ]);
        $this->add('phone', 'text',[
            'label' => 'Phone Number'
        ]);
        $this->add('address', 'textarea', [
            'attr' => ['class' => 'wysihtml5 form-control', 'rows' => 2],
        ]);
    }
}

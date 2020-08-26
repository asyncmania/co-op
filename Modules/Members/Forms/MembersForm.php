<?php

namespace Modules\Members\Forms;

use Kris\LaravelFormBuilder\Form;

class MembersForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text',[
            'attr' => ['required']
        ]);
        $this->add('email', 'text',[
            'attr' => ['required']
        ]);
        $this->add('phone', 'text',[
            'attr' => ['required']
        ]);
        $this->add('gender', 'select',[
            'choices'     => [
                'male' => 'Male',
                'female' => 'Female',
            ],
            'empty_value' => '- Select a gender -',
        ]);
        $this->add('occupation', 'text');
        $this->add('address', 'textarea', [
            'attr' => ['class' => 'wysihtml5 form-control', 'rows' => 2]
        ]);
    }
}

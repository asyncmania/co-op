<?php

namespace Modules\Members\Forms;

use Kris\LaravelFormBuilder\Form;

class MembersForm extends Form
{
    public function buildForm()
    {
        $this->add('firstname', 'text');
        $this->add('lastname', 'text');
        $this->add('phone', 'text');
        $this->add('dob', 'text');
        $this->add('gender', 'text');
        $this->add('occupation', 'text');
        $this->add('address', 'textarea', [
            'attr' => ['class' => 'wysihtml5 form-control', 'rows' => 4]
        ]);
    }
}

<?php

namespace Modules\Companies\Forms;

use Kris\LaravelFormBuilder\Form;

class CompaniesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
        $this->add('registration_number', 'text');
        $this->add('type', 'text');
        $this->add('affliation', 'text');
        $this->add('address', 'textarea', [
            'attr' => ['class' => 'wysihtml5 form-control', 'rows' => 4]
        ]);
        $this->add('banker', 'text');
        $this->add('contact_details', 'text');
    }
}

<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text',[
                'label'=>'First Name',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('last_name', 'text',[
                'label'=>'Last Name',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('phone', 'text',[
                'label'=>'Phone Number',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('address', 'textarea',[
                'label'=>'Address',
                'attr'=>[
                    'class'=>'form-control','required',
                    'rows'=>2
                ]
            ])
            ->add('email', 'text',[
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('password', 'password',[
                'attr'=>[
                    'class'=>'form-control required',
                    'value'=>''
                ]
            ])
            ->add('confirm_password', 'password',[
                'label'=>'Confirm Password',
                'attr'=>[
                    'class'=>'form-control required'
                ]
            ])
           /* ->add('roles', 'select',[
                'label'=>'Parent',
                'empty_value'=>'-- select roles --',
                'choices'=>$this->getData('roles'),
                'multiple'=>true
            ])*/
            ->add('activated', 'choice', [
                'label'=>'Activated?',
                'choices' => [
                    0 => 'No',
                    1 => 'Yes'
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])

            ->add('avatar', 'file', [
                'label' => 'Avatar'
            ]);




    }
}
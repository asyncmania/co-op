<?php

namespace Modules\Settings\Forms;

use Kris\LaravelFormBuilder\Form;

class SettingsForm extends Form {

    public function buildForm()
    {
        $this
            ->add('app_name', 'text', [
                'label' => 'App Name'
            ])
            ->add('webmaster_email', 'text', [
                'label' => 'Webmaster Email'
            ])
            ->add('contact_email', 'text', [
                'label' => 'Contact Email'
            ])
            ->add('phone', 'text', [
                'label' => 'Phone Number'
            ])
            ->add('image', 'file', [
                'label' => 'Logo'
            ])
            ->add('mail_driver', 'select', [
                'label'       => 'Mail Driver',
                'choices'     => $this->getData('drivers'),
                /*'empty_value' => '- Set mail driver -',*/
                'selected'    => 'mail'
            ])
            ->add('mail_from_name', 'text', [
                'label' => 'Mail From (Name)',
                'default_value'=>config('myapp.website_title'),
            ])
            ->add('mail_from_address', 'text', [
                'label' => 'Mail From (Address)',
                'default_value'=>config('myapp.contact_email'),
            ])
            ->add('mail_host', 'text', [
                'label' => 'Mail Host',
                'default_value'=>'smtp.mailgun.org'
            ])
            ->add('mail_port', 'text', [
                'label' => 'Mail Port',
                'default_value'=>587
            ])
            ->add('mail_username', 'text', [
                'label' => 'Mail Username'
            ])
            ->add('mail_password', 'password', [
                'label' => 'Mail Password',
                'default_value'=>'null'
            ])
            ->add('mail_encryption', 'text', [
                'label' => 'Mail Encryption',
                /*'default_value'=>'tls'*/
            ])
            ->add('mailgun_domain', 'text', [
                'label' => 'Mailgun Domain'
            ])
            ->add('mailgun_secret', 'text', [
                'label' => 'Mailgun Secret'
            ]);
    }
}

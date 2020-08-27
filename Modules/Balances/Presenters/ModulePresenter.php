<?php namespace Modules\Balances\Presenters;

use Modules\Core\Presenters\Presenter;

class ModulePresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return config('balances.types.'.$this->entity->balance_type);
    }

    public function url()
    {
        return route('balances.slug',[$this->entity->slug]);
    }
}
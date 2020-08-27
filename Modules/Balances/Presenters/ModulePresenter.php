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
        return $this->entity->title;
    }

    public function url()
    {
        return route('balances.slug',[$this->entity->slug]);
    }
}
<?php namespace Modules\Contributions\Presenters;

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
        return route('contributions.slug',[$this->entity->slug]);
    }
}
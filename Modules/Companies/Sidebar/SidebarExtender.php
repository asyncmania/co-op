<?php

namespace Modules\Companies\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.content'), function (Group $group)
        {
            $group->item(trans('companies::global.name'),function(Item $item){
                $item->weight(config('companies.sidebar.weight'));
                $item->icon(config('companies.sidebar.icon'));
                $item->route('admin.companies.index');
                $item->authorize($this->auth->hasAccess('companies.index'));
            });
        });

        return $menu;
    }
}
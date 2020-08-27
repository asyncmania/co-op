<?php

namespace Modules\Ledgers\Sidebar;


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
            $group->item(trans('ledgers::global.name'),function(Item $item){
                $item->weight(config('ledgers.sidebar.weight'));
                $item->icon(config('ledgers.sidebar.icon'));
                $item->route('admin.ledgers.index');
                $item->authorize($this->auth->hasAccess('ledgers.index'));
            });
        });

        return $menu;
    }
}
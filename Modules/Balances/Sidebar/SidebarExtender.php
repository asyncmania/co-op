<?php

namespace Modules\Balances\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.company'), function (Group $group)
        {
            $group->item(trans('balances::global.name'),function(Item $item){
                $item->weight(config('balances.sidebar.weight'));
                $item->icon(config('balances.sidebar.icon'));
                $item->route('admin.balances.index');
                $item->authorize($this->auth->hasAccess('balances.index'));
            });
        });

        return $menu;
    }
}
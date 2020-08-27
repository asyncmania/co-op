<?php

namespace Modules\Contributions\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.members'), function (Group $group)
        {
            $group->item(trans('contributions::global.name'),function(Item $item){
                $item->weight(config('contributions.sidebar.weight'));
                $item->icon(config('contributions.sidebar.icon'));
                $item->route('admin.contributions.index');
                $item->authorize($this->auth->hasAccess('contributions.index'));
            });
        });

        return $menu;
    }
}
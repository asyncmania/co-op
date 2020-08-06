<?php

namespace Modules\Members\Sidebar;


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
            $group->item(trans('members::global.name'),function(Item $item){
                $item->weight(config('members.sidebar.weight'));
                $item->icon(config('members.sidebar.icon'));
                $item->route('admin.members.index');
                $item->authorize($this->auth->hasAccess('members.index'));
            });
        });

        return $menu;
    }
}
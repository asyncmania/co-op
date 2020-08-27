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
        $menu->group(trans('core::global.menus.company'), function (Group $group)
        {
            if(is_admin_role()){
                $group->hideHeading();
            }
            $group->weight(2);
            $group->item(trans('companies::global.name'),function(Item $item){
                $item->weight(config('companies.sidebar.weight'));
                $item->icon(config('companies.sidebar.icon'));
                $item->route('admin.companies.index');
                $item->authorize($this->auth->hasAccess('companies.index'));
            });

            $group->item('Society\'s Profile',function(Item $item){
                $item->weight(config('companies.sidebar.weight'));
                $item->icon(config('companies.sidebar.icon'));
                $item->route('admin.companies.show');
                $item->authorize(is_company_role());
            });
        });

        return $menu;
    }
}
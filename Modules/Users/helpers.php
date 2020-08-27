<?php

function current_user(){
    return app('Modules\Users\Repositories\AuthenticationInterface')->check();
}

function role_by_name($name){
    return app(\Modules\Users\Repositories\RoleInterface::class)->findByName($name);
}


function current_user_roles($all=false){
    $user = current_user();
    if($user){
        $groups = $user->groups();
        return ($all) ? $groups : $groups->first();
    }
    return false;
}

function current_user_company(){
    $user = current_user();
    $company = (isset($user->companies)) ? $user->companies()->first() : null;
    return $company;
}

function is_admin_role($user = NULL){
    $user = empty($user) ? current_user() : $user;
    if(!empty($user) && $user->hasRoleName('Admin')) return true;
    return false;
}

function is_company_role($user = NULL){
    $user = empty($user) ? current_user() : $user;
    if(!empty($user) && $user->hasRoleName('Company')) return true;
    return false;
}

function current_user_email(){
    $user = current_user();
    if($user){
        return $user->email;
    }
    return '';
}

function is_user_current($user_id)
{
    $user = current_user();
    if (isset($user)){
        if ($user_id == current_user()->id)
        {
            return true;
        }
    }
    return false;
}

function generate_password(){
    $password = substr(md5(rand()), 0, 7);
    return $password;
}

function has_access($permission)
{
    return app('Modules\Users\Repositories\AuthenticationInterface')->hasAccess($permission);
}
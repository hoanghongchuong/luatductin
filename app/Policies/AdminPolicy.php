<?php

namespace App\Policies;

use App\Admin;
use App\Authorization;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function adminManager(Admin $admin)
    {
        // dd($admin);
        return $admin->authorization->isSuperAdmin();            
    }
    public function categoryNewsManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canNewsCategory();
    }

    public function newsManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canNews();
    }
    public function contactManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canContact();
    }
    public function settingManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canSetting();
    }
    public function questionManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canQuestion();
    }
    public function deleteQuestionManager(Admin $admin)
    {
        return $admin->authorization->isSuperAdmin() || $admin->authorization->canDeleteQuestion();
    }
}

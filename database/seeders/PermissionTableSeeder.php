<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            'role',
            'permission',
            'slider-image',
            'objective',
            'milestone',
            'collaboration',
            'product',
            'trainer',
            'training',
            'training-city',
            'consent',
            'payment-account',
            'event',
            'service',
            'skill',
            'virtual-assistant',
            'office',
            'appointment',
            'faq',
            'user',
            ];
        $permissions = [

            '-list',
            '-create',
            '-edit',
            '-delete',

        ];

//        $permissions = [
//
//            ##Roles###########################
//            'role-list',
//            'role-create',
//            'role-edit',
//            'role-delete',
//             #################################
//
//            ##Permission######################
//            'permission-list',
//            'permission-create',
//            'permission-edit',
//            'permission-delete',
//            ##################################
//
//            ##Slider Image####################
//            'slider-image-list',
//            'slider-image-create',
//            'slider-image-edit',
//            'slider-image-delete',
//            ##################################
//
//            ##Achievement######################
//            'achievement-list',
//            'achievement-create',
//            'achievement-edit',
//            'achievement-delete',
//            ##################################
//
//            ##Objectives######################
//            'objective-list',
//            'objective-create',
//            'objective-edit',
//            'objective-delete',
//            ##################################
//
//            ##Milestones######################
//            'milestone-list',
//            'milestone-create',
//            'milestone-edit',
//            'milestone-delete',
//            ##################################
//
//            ##collaborations######################
//            'milestone-list',
//            'milestone-create',
//            'milestone-edit',
//            'milestone-delete',
//            ##################################
//
//
//
//            'product-list',
//            'product-create',
//            'product-edit',
//            'product-delete'
//        ];

        foreach ($modules as $module) {
            foreach ($permissions as $permission) {
                Permission::create([
                    'name' => $module . $permission,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}

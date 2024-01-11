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
        $permissions = [

            'الإشعارات',

            //اللينكات الرئيسية
            'صلاحيات المستخدمين',
            'الأماكن',



            //صلاحيات المستخدمين
            'عرض مستخدم',
            'إضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'إضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',



            //الأماكن
            'عرض دولة',
            'إضافة دولة',
            'تعديل دولة',
            'حذف دولة',

            'عرض مدينة',
            'إضافة مدينة',
            'تعديل مدينة',
            'حذف مدينة',

            'عرض منطقة',
            'إضافة منطقة',
            'تعديل منطقة',
            'حذف منطقة',

        ];



        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CompanyTableSeeder::class);
        //factory(App\Models\Position::class, 2000)->create();     //插入2000个职位
        
        //factory(App\Models\Resume::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemBasic::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemEducation::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemContact::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemProject::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemWork::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemAward::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemJob::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemSkill::class, 100)->create();     //插入2000个职位
        //factory(App\Models\ItemComment::class, 2000)->create();     //插入2000个职位
       //factory(App\Models\ItemAttach::class, 2000)->create();     //插入2000个职位
        factory(App\Models\CareerTalk::class, 1000)->create();     //插入2000个职位
        factory(App\Models\JobFair::class, 20)->create();
    }
}

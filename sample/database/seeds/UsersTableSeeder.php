<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remeber_token'])->toArray());

        // 修改第一个用户, 便于以后登陆测试
        $user = User::find(1);
        $user->name = 'Aufree';
        $user->email = 'aufee@yousails.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();
    }
}

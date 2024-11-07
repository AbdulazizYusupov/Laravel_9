<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Product;
use App\Models\Roles;
use App\Models\Student;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(10)->create();
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        $role1 = Roles::create(['name' => 'admin']);
//        $role2 = Roles::create(['name' => 'car']);
//        $role3 = Roles::create(['name' => 'product']);
//        $role4 = Roles::create(['name' => 'student']);
//        $role5 = Roles::create(['name' => 'post']);
//        $role6 = Roles::create(['name' => 'category']);
//
//        for($m = 1; $m <= 10; $m++){
//            $user = User::create([
//               'name' => 'User ' . $m,
//               'email' => 'user' . $m . '@example.com',
//               'password' => Hash::make('123456')
//            ]);
//            for($n = 1; $n <= 5; $n++){
//                $user->roles()->attach(rand(1,5));
//            }
//
//        }
//
//        for ($i = 0; $i < 50; $i++) {
//            Student::create([
//                'name' => 'Student ' . $i,
//                'phone' => '0123456789' . $i,
//                'address' => 'Address ' . $i,
//            ]);
//        }
//
//        for ($i = 0; $i < 50; $i++) {
//            Post::create([
//                'title' => 'Title ' . $i,
//                'body' => 'Body ' . $i,
//            ]);
//        }
//
//        for ($j = 0; $j < 50; $j++) {
//            Category::create([
//                'name' => 'Category ' . $j,
//                'tr' => $j,
//            ]);
//        }
//
//        for ($k = 0; $k < 50; $k++) {
//            Product::create([
//                'name' => 'Product ' . $k,
//                'price' => $k,
//                'count' => $k + 1000,
//            ]);
//        }
//
//        for ($l = 0; $l < 50; $l++) {
//            Car::create([
//                'model' => 'Car ' . $l,
//                'color' => 'Color ' . $l,
//                'price' => $l + 1000,
//            ]);
//        }

//        $routes = Route::getRoutes();
//
//        foreach ($routes as $route) {
//
//            $key = $route->getName();
//
//            if ($key && !str_starts_with($key, 'generated::') && $key !== 'storage.local') {
//
//                $name = ucfirst(str_replace('.', '-', $key));
//
//                Permission::create([
//                    'key' => $key,
//                    'name' => $name,
//                ]);
//            }
//        }

        $permissions = Permission::all()->pluck('id')->toArray();
        foreach (Roles::all() as $role) {
            $role->permissions()->attach($permissions);
        }
//        $role1->permissions()->attach($permissions);
//        $role2->permissions()->attach($permissions);
//        $role3->permissions()->attach($permissions);
//        $role4->permissions()->attach($permissions);
//        $role5->permissions()->attach($permissions);
//        $role6->permissions()->attach($permissions);
    }
}

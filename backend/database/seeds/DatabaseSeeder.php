<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_level')->insert([
            'id' => 1,
            'description' => 'Administrador',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_level')->insert([
            'id' => 2,
            'description' => 'Operador',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('module')->insert([
            'id' => 1,
            'description' => 'Usuários',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('module')->insert([
            'id' => 2,
            'description' => 'Ativos',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user')->insert([
            'id' => 1,
            'name' => 'José Geraldo',
            'login' => 'jgt.josegeraldo@gmail.com',
            'pass' => Crypt::encrypt('jgtHP0c71'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user')->insert([
            'id' => 2,
            'name' => 'Juliano Souza',
            'login' => 'jgt.julianosouza@gmail.com',
            'pass' => Crypt::encrypt('ju$S3c62'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission')->insert([
            'id' => 1,
            'permission_level_id' => 1,
            'user_id' => 1,
            'module_id' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission')->insert([
            'id' => 2,
            'permission_level_id' => 1,
            'user_id' => 1,
            'module_id' => 2,
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission')->insert([
            'id' => 3,
            'permission_level_id' => 1,
            'user_id' => 2,
            'module_id' => 2,
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission')->insert([
            'id' => 4,
            'permission_level_id' => 1,
            'user_id' => 2,
            'module_id' => 2,
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'id' => 1,
            'description' => 'Bombas',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'id' => 2,
            'description' => 'Caldeiras',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('maintenance_status')->insert([
            'id' => 1,
            'description' => 'Agendada',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('maintenance_status')->insert([
            'id' => 2,
            'description' => 'Atrasada',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('maintenance_status')->insert([
            'id' => 3,
            'description' => 'Realizada',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('asset_status')->insert([
            'id' => 1,
            'description' => 'Funcional',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('asset_status')->insert([
            'id' => 2,
            'description' => 'Defeituoso',
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $asset = factory(App\Model\Asset\ModelEloquent\Asset::class, 100)->create();

        $asset = factory(App\Model\Asset\ModelEloquent\Mantenance::class, 200)->create();
    }
}

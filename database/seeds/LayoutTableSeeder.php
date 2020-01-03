<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LayoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir = base_path('/resources/views/layouts/layouts');
        $list = scandir($dir,1);
        $newlist = array_splice($list, -2);

        foreach($list as $item) {
            $dir = resource_path('views/layouts/layouts/');
            $filepath = $dir . $item;
            $content = file_get_contents($filepath, FILE_IGNORE_NEW_LINES);

            DB::table('layouts')->insert([
                'name' => strtok($item, '.'),
                'filename' => Str::camel(strtok($item, '.')) . ".blade.php",
                'content' => $content,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

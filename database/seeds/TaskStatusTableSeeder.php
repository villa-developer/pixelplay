<?php

use App\taskStatus;
use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['open', 'close', 'hidden'];

        foreach ($status as $status) {
            taskStatus::create([
                'name' => $status
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use DateTime;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Task::insert([
            'name' => 'Menulis 2 Artikel',
            'description' => 'Untuk blog website',
            'assigned_to' => 'bryan',
            'due_date' => new DateTime()
        ]);
    }
}

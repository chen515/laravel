<?php

use App\Note;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create(array(
            'message' => 'Test user seeding',
            'tags' => 'Testing',
        ));
    }
}
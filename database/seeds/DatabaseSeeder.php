<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisions')->insert([
            ["name" => "Vocabulary", "display_name"=>"Vocabulary", "parent_id"=>0, "key_code" => "0"],
            ["name" => "Vocabulary List", "display_name"=>"Vocabulary List", "parent_id"=>1, "key_code" => "Vocabulary_List"],
            ["name" => "Vocabulary Detail", "display_name"=>"Vocabulary Detail", "parent_id"=>1, "key_code" => "Vocabulary_Detail"],
            ["name" => "Question Vocabulary List", "display_name"=>"Question Vocabulary List", "parent_id"=>1, "key_code" => "Question_Vocabulary_List"],
            ["name" => "Question Vocabulary Create", "display_name"=>"Question Vocabulary Create", "parent_id"=>1, "key_code" => "Question_Vocabulary_Create"],

            ["name" => "Listening", "display_name"=>"Listening", "parent_id"=>0, "key_code" => "0"],
            ["name" => "Listening List", "display_name"=>"Listening List", "parent_id"=>6, "key_code" => "Listening_List"],
            ["name" => "Listening Detail", "display_name"=>"Listening Detail", "parent_id"=>6, "key_code" => "Listening_Detail"],
            ["name" => "Question Listening List", "display_name"=>"Question Listening List", "parent_id"=>6, "key_code" => "Question_Listening_List"],
            ["name" => "Question Listening Edit", "display_name"=>"Question Listening Edit", "parent_id"=>6, "key_code" => "Question_Listening_Edit"],
            ["name" => "Question Listening Create", "display_name"=>"Question Listening Create", "parent_id"=>6, "key_code" => "Question_Listening_Create"],

            ["name" => "Grammar", "display_name"=>"Grammar", "parent_id"=>0, "key_code" => "0"],
            ["name" => "Grammar List", "display_name"=>"Grammar List", "parent_id"=>12, "key_code" => "Grammar_List"],
            ["name" => "Grammar Detail", "display_name"=>"Grammar Detail", "parent_id"=>12, "key_code" => "Grammar_Detail"],
            ["name" => "Question Grammar List", "display_name"=>"Question Grammar List", "parent_id"=>12, "key_code" => "Question_Grammar_List"],
            ["name" => "Question Grammar Create", "display_name"=>"Question Grammar Create", "parent_id"=>12, "key_code" => "Question_Grammar_Create"],


            ["name" => "Reading", "display_name"=>"Reading", "parent_id"=>0, "key_code" => "0"],
            ["name" => "Reading List", "display_name"=>"Reading List", "parent_id"=>17, "key_code" => "Reading_List"],
            ["name" => "Reading Detail", "display_name"=>"Reading Detail", "parent_id"=>17, "key_code" => "Reading_Detail"],
            ["name" => "Reading Create", "display_name"=>"Reading Create", "parent_id"=>17, "key_code" => "Reading_Create"],

            ["name" => "User", "display_name"=>"User", "parent_id"=>0, "key_code" => "User"],
            ["name" => "User List", "display_name"=>"User List", "parent_id"=>21, "key_code" => "User_List"],
            ["name" => "User Create", "display_name"=>"User Create", "parent_id"=>21, "key_code" => "User_Create"],
            ["name" => "User Edit", "display_name"=>"User Edit", "parent_id"=>21, "key_code" => "User_Edit"],

            ["name" => "Role", "display_name"=>"Role", "parent_id"=>0, "key_code" => "Role"],
            ["name" => "Role List", "display_name"=>"Role List", "parent_id"=>25, "key_code" => "Role_List"],
            ["name" => "Role Create", "display_name"=>"Role Create", "parent_id"=>25, "key_code" => "Role_Create"],
            ["name" => "Role Edit", "display_name"=>"Role Edit", "parent_id"=>25, "key_code" => "Role_Edit"],
        ]);
    }
}

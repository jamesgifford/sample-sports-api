<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Testing account
        ---------------------------------------------------------------------*/

        $userId = DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test_user@testemail.com',
            'password' => '$2y$10$OznydXX9lXs8WkF2QBPc1uz03Kp75/gUWEmftpiJK8F6hIIqIvs92',
            'created_at' => '2018-05-06 05:16:21',
            'updated_at' => '2018-05-06 05:16:21'
        ]);

        $clientId = DB::table('oauth_clients')->insert([
            'user_id' => $userId,
            'name' => 'Laravel Personal Access Client',
            'secret' => 'Nc0HckR5Dgr8XygVmcTk0dD88zCFWE7vDRsbTN6Y',
            'redirect' => 'http://sports-api.local',
            'personal_access_client' => true,
            'password_client' => false,
            'revoked' => false,
            'created_at' => '2018-05-06 05:18:28',
            'updated_at' => '2018-05-06 05:18:28'
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $clientId,
            'created_at' => '2018-05-06 05:19:10',
            'updated_at' => '2018-05-06 05:19:10'
        ]);

        DB::table('oauth_access_tokens')->insert([
            'id' => '0114aad4f94080e5bc5cae7a20a8ada235587b7c92e656e09098d5e423574b8d121ce3db6f671fd5',
            'user_id' => $userId,
            'client_id' => 1,
            'name' => 'Local Dev Token',
            'revoked' => false,
            'created_at' => '2018-05-06 09:01:51',
            'updated_at' => '2018-05-06 09:01:51',
            'expires_at' => '2019-05-07 09:01:51',
        ]);
    }
}

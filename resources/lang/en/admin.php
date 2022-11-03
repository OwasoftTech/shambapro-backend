<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],
    'user' => [
        'title' => 'Farms',

        'actions' => [
            'index' => 'Farms',
            'create' => 'New User',
            'edit' => 'Edit :phone_number',
            'edit_profile' => 'Edit User',
         ],

        'columns' => [
            'id' => 'ID',
             'name' => 'Name',
            'farm_name' => 'Farm Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'role' => 'Role',
            'status' => 'Status',
            
                
        ],
    ],


    // Do not delete me :) I'm used for auto-generation
];
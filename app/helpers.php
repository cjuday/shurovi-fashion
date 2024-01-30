<?php
use App\Models\User;
use App\Models\Groups;

function get_admin_name($id) {
    $data = User::find($id);
    return $data->name;
}

function get_group_name($id) {
    return Groups::where('id',$id)->value('name');
}
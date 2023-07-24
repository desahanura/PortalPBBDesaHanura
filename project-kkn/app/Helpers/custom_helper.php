<?php
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('tb_users')->where('id_user', session('id_user'))->get()->getRow();
}

function countData($table)
{
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
}

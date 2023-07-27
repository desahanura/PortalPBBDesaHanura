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

function countDataSudahBayar($table)
{
    $db = \Config\Database::connect();
    // return $db->table($table)->countAllResults();
    $query = $db->table($table)->where('status_bayar', '1')->countAllResults();
    return $query;
}

function countDataHarusDitagih($table)
{
    $db = \Config\Database::connect();
    // return $db->table($table)->countAllResults();
    $query = $db->table($table)->where('status_bayar', '0')->countAllResults();
    return $query;
}

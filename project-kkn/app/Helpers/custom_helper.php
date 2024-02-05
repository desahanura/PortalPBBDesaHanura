<?php
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('tb_users')->where('id_user', session('id_user'))->get()->getRow();
}

function sumBesaranPbb($status)
{
    $db = \Config\Database::connect();
    $query = $db->table('tb_noppbb')->selectSum('besaran_pbb')->where('status_bayar', $status)->get()->getRow();
    return $query->besaran_pbb ?? 0;

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

function sum($table){
    $db = \Config\Database::connect();
    $query = $db->nopModel->selectSum('besaran_pbb')->get()->getRow()->besaran_pbb;
    return $query;
}

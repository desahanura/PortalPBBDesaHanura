/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]

$('ul.sidebar-menu li a').each(function()
{
    if($(this).attr('href').indexOf(url) !== -1 && path[1] !== "")
    {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
        $('#sidebar_home').removeClass('active')
        console.log(url)
        console.log(path)
    }
})

// datatables
$(document).ready(function(){
    $('#table1').DataTable();
});

// modal confirmation
function submitDel(id){
    $('#del-'+id).submit();
}

// logout
function returnLogout(){
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}
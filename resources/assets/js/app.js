
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

$(document).ready(function() {
    var table = $('.table-data').DataTable({
        "lengthChange": false,
        "searching": false,
        "paginate": false,
        "info": false,
        // scrollY:        true,
        // scrollX:        true,
        // scrollCollapse: true,
        // paging:         false,
        // fixedColumns:   {
        //     leftColumns: 2
        // }
    });

});

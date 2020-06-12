/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";



$('.btn-batal').each(function () {
    $(this).click(function () {
        let id = $(this).data('id');
        let form = $('#modal-pembatalan').find('form');
        form.attr('action', '');
        form.attr('action', id);
    })
});

$('.btn-input-resi').each(function () {
    $(this).click(function () {
        let id = $(this).data('id');
        let form = $('#modal-input-resi').find('form');
        form.attr('action', '');
        form.attr('action', id);
    })
});


$('.btn-konfirmasi-pembayaran').each(function () {
    $(this).click(function () {

        let id = $(this).data('id')
        let form = $('#modal-konfirmasi-pembayaran').find('form')
        form.attr('action', '')
        form.attr('action', id)

        let image = $(this).data('image');
        let img = $('#modal-konfirmasi-pembayaran').find('img');
        img.attr('src', '')
        img.attr('src', image);

    })
})
/**
 * Created by vodo-tech on 01/06/2015.
 */

/*

    */
$('body').on('click','#edit-btn',function(e)
{
    $('input').attr('readonly',false);
    $(this).html('Confirmer les changement').addClass('confirm-edit');

}).on('click','.confirm-edit',function(e)
{
    e.preventDefault();
    $.ajax({
        url: 'http://vodo.intranet.dev/admin/edit/organisation',
        type:'post',
        data: ,
        dataType: 'json',
        success: function(data)
        {

        },
        error:  function(data)
        {

        }
    });

    $(this).html('Modifier les informations');
    $(this).removeClass('confirm-edit');
    $('input').attr('readonly',true);

});






$('.confirm-edit').click(function(e)
{

});
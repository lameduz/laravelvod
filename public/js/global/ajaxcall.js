/**
 * Created by vodo-tech on 01/06/2015.
 */

/*$('form').submit(function(e)
{
   event.preventDefault();
    $.ajax({
        url: '',
        type:'post',
        data: $('form').serialize(),
        dataType: 'json',
        success: function(data)
        {

        },
        error:  function(data)
        {

        }
    });
});

    */
$('body').on('click','#edit-btn',function(e)
{
    $('input').attr('readonly',false);
    $(this).html('Confirmer les changement').addClass('confirm-edit');

}).on('click','.confirm-edit',function()
{
    $(this).html('Modifier les informations');
    $(this).removeClass('confirm-edit');
    $('input').attr('readonly',true);
});







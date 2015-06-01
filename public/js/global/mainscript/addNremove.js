$(document).ready(function() {
    var max_fields      = 2;
    var wrapper         = $(".input_fields_wrap");
    var add_button      = $(".add_field_button");
    var select_option   = $(".select_to_text");

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" class="form-control" name="org_type[]"/><a href="#" class="remove_field">Supprimer le champ</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

    $(select_option).on("click", function(){
        $(this).replaceWith('<input type="text" name="country">');
    });
});
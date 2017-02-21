(function ($) {
    Drupal.behaviors.board_game_helper = {
        attach: function (context, settings) {

            if($('input[name="field_available_as[und][3]"]').attr('checked')){
                $('#rent-details').show();
            }else{
                $('#rent-details').hide();
            }

            if($('input[name="field_available_as[und][9]"]').attr('checked')){
                $('#selling-details').show();
            }else{
                $('#selling-details').hide();
            }

            if($('input[name="field_available_as[und][2]"]').attr('checked')){
                $('#swap-details').show();
            }else{
                $('#swap-details').hide();
            }
            $('#additional-details .panel-body').hide();

            $('input[name="field_available_as[und][3]"]').change(function(){
                $('#rent-details').toggle(500);
            });
            $('input[name="field_available_as[und][9]"]').change(function(){
                $('#selling-details').toggle(500);
            });
            $('input[name="field_available_as[und][2]"]').change(function(){
                $('#swap-details').toggle(500);
            })
            $('#additional-details a').click(function(){
                $('#additional-details .panel-body').toggle(500);
            });
        }
    };
}(jQuery));



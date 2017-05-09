/**
 * Created by phili on 8/05/2017.
 */
$(document).ready(function(){
    $('.editButton').click(

        function(){
            var input = $('.editInput');
            if(input.css('display') == 'none') {
                $('.editInput').css('display', 'block');

            }else{
                $('.editInput').css('display','none');
            }
            })
})
$(document).ready(function(){
    // for each button
    $('button').each(function(){
        // set click event
        $(this).click(function(){
            // get the id of the button
            var id = $(this).attr('id');
            // send ajax request
            $.ajax({
                url: 'resp.php',
                type: 'GET',
                data: {id: id},
                success: function(data){
                    alert('success: ' + data);
                }
            });
        });
    });
});
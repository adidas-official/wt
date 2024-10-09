$(document).ready(function () {
    $('.toggler').click(function () {
        console.log('sanity check');
        $(this).siblings('.answer').toggleClass('transparent');
    });
});

$( function() {

    $(".toDrag").draggable();
    $(".toDrop").each(function() {
        const index = $(this).attr('data-source');
        $(this).droppable({
            accept: $(".toDrag:nth-child(" + index + ")"),
            drop: function( event, ui ) {
                $(this)
                .addClass( "highlight-correct" );
            },
            out: function( event, ui ) {
                $(this)
                .removeClass("highlight-correct");
            }
        });
    });
});

$( function() {
    var icons = {
      header: "ui-icon-circle-triangle-n",
      activeHeader: "ui-icon-circle-triangle-s"
    };
    $( "#accordion" ).accordion({
      icons: icons,
      collapsible: true
    });
});
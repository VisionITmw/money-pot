$(function(){
    $("[data-toggle='delete']").on('click',function(e){
        var data = $(e.target)
        var url = data.attr('data-url');
        var message = data.attr('data-message');
        $("#delete-message").html(message);
        $("#delete-form").attr({'action':url}); // set action of form to url
        Metro.dialog.open("#delete-dialog")
    });
})

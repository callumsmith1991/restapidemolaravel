
    $("#news-api-form").bind('submit', function(e) {


        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: $('#news-api-form').serialize(), // serializes the form's elements.
            success: function(data) {
                $('#output').html(data); // show response from the php script.
            }, error: function (e) {
                $('#output').html('');
                $.each(e.responseJSON.errors, function(key,value) {
                    $('#output').append('<div class="alert alert-danger">'+value+'</div');
                }); 
            }
        });


    });
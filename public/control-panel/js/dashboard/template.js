var Template = function()
{
    this.__construct = function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };

    this.ajaxPostCall = function (url, postData, formBind)
    {
        $(formBind).find(':input[type=submit]').prop('disabled', true);
        $.ajax({
            type: "POST",
            url: url,
            data: postData,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function (data)
            {
                $(formBind).find(':input[type=submit]').prop('disabled', false);

                if(data.success !== undefined) {
                    Result.notify('Success', data.success, 'success', true, true);
                }

                if(data.warning !== undefined) {
                    Result.notify('Success', data.warning, 'warning', true, true);
                }

                if(data.view !== undefined) {
                    $('.'+data.target).hide().html(data.view).slideDown(500);
                    return true;
                }

                if(data.location === true) {
                    location.reload();
                    return true;
                }
                if(data.location === false) {
                    $( ".modal" ).modal('hide');
                    return true;
                }
                window.location.replace(data.location);
            },
            error: function (data)
            {
                $(formBind).find(':input[type=submit]').prop('disabled', false);

                if (data.status === 200 || data.status === 422) {
                    data = data.responseJSON;
                    Result.notify('Oh No!', data.errors, 'error', true, true);
                }
            },
            statusCode: {
                500: function()
                {
                    $(formBind).find(':input[type=submit]').prop('disabled', false);

                    Result.notify('Oh No!', "Something bad happened.", 'error', true, true);
                },
                403: function()
                {
                    $(formBind).find(':input[type=submit]').prop('disabled', false);

                    Result.notify('Oh No!', "You are not authorised.<br/>403 Error", 'error', true, true);
                },
                404: function()
                {
                    $(formBind).find(':input[type=submit]').prop('disabled', false);

                    Result.notify('Oh No!', "Something bad happened.<br/>404 Error", 'error', true, true);
                },
                405: function()
                {
                    $(formBind).find(':input[type=submit]').prop('disabled', false);

                    Result.notify('Oh No!', "Something bad happened.", 'error', true, true);
                }
            }
        });
    };

    this.ajaxGetCall = function (url)
    {
        $.ajax({
            type: "GET",
            url: url,
            success: function (data)
            {
                PNotify.removeAll();

                if(data.success !== undefined) {
                    Result.notify('Success', data.success, 'success', true, true);

                    if(data.location === true) {
                        location.reload();
                        return true;
                    }
                    if(data.location === false) {
                        $( ".modal" ).modal('hide');
                        return true;
                    }
                    window.location.replace(data.location);

                    return true;
                }

                $( ".editModal" ).html(data).modal('show');

                var elements = Array.prototype.slice.call(document.querySelectorAll('.js-switch-new'));
                elements.forEach(function(html) {
                    var switchery = new Switchery(html, {color:"#26B99A"});
                });
            },
            error: function (data)
            {
                Result.notify('Oh No!', "Fail", 'error', true, true);
            },
            statusCode: {
                500: function()
                {
                    Result.notify('Oh No!', "Something bad happened.", 'error', true, true);
                },
                422: function (data)
                {
                    data = data.responseJSON;
                    Result.notify('Oh No!', data.errors, 'error', true, true);
                },
                403: function()
                {
                    Result.notify('Oh No!', "You are not authorised.", 'error', true, true);
                },
                404: function()
                {
                    Result.notify('Oh No!', "Something bad happened.<br/>404 Error", 'error', true, true);
                },
                405: function()
                {
                    Result.notify('Oh No!', "Something bad happened.", 'error', true, true);
                }
            }
        });
    };


    // Initializing the __construct()
    this.__construct();

};

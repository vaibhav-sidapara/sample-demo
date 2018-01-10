var Event = function()
{
    var $this = this;

    this.__construct = function()
    {
        ajaxStaticForm();
        ajaxDelegationForm();
        showModal();
        showModalDataTable();
        ajaxPost();
    };

    var ajaxStaticForm = function()
    {
        $('.ajaxForm').on('submit', function(e)
        {
            e.preventDefault ? e.preventDefault() : (event.returnValue = false);
            e.stopPropagation();
            var url = $(this).attr('action');
            var postData = new FormData($(this)[0]);
            Result.notify('Processing', "<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Please Wait", 'info');
            Template.ajaxPostCall(url, postData, this);
        });
    };

    var ajaxDelegationForm = function ()
    {
        $(".editModal").on('submit', '.ajaxForm', function(e)
        {
            e.preventDefault ? e.preventDefault() : (event.returnValue = false);
            e.stopPropagation();
            var url = $(this).attr('action');
            var postData = new FormData($(this)[0]);
            Result.notify('Processing', "<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Please Wait", 'info');
            Template.ajaxPostCall(url, postData);
        });
    };

    var showModal = function()
    {
        $(".modalEvent").on('click', function(e)
        {
            e.preventDefault ? e.preventDefault() : (event.returnValue = false);
            e.stopPropagation();
            var url = $(this).data('url');
            Result.notify('Please Wait', "<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Loading", 'info');
            Template.ajaxGetCall(url);
        });
    };

    var showModalDataTable = function()
    {
        $("#data-table").on('click', '.modalEvent', function(e)
        {
            e.preventDefault ? e.preventDefault() : (event.returnValue = false);
            e.stopPropagation();
            var url = $(this).data('url');
            Result.notify('Please Wait', "<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Loading", 'info');
            Template.ajaxGetCall(url);
        });
    };

    var ajaxPost = function()
    {
        $(".ajaxPost").on('click', function(e)
        {
            e.preventDefault ? e.preventDefault() : (event.returnValue = false);
            e.stopPropagation();
            var url = $(this).data('url');
            var postData = '';
            Result.notify('Processing', "<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Please Wait", 'info');
            Template.ajaxPostCall(url, postData);
        });
    };



    // Initializing the __construct()
    this.__construct();

};

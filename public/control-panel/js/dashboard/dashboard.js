var Dashboard = function()
{
    this.__construct = function()
    {
        window.onload = function()  {
            $( ".bg-load" ).fadeOut(1000);

            $('.modal').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
                $('.selectpicker').selectpicker();
            });
        };

        Template    = new Template();
        Event       = new Event();
        Result      = new Result();

        htmlTooltip();
    };

    this.__construct();
};

// Enable html tags in tooltip
var htmlTooltip = function ()
{
    $('.htmlTooltip').tooltip({html: true});
};

// Initialize Dashboard
var dashboard = new Dashboard();
var Result = function()
{
    this.__construct = function()
    {
        //
    };

    this.notify = function(title, message, type, remove, hide)
    {
        if (message instanceof Array || message instanceof Object) {
            var errorsHtml = "";
            $.each( message, function( key, value )
            {
                errorsHtml += '<p>' + value[0] + '</p>';
            });
            message = errorsHtml;
        }

        if (remove === undefined || remove === true) {
            PNotify.removeAll();
        }

        if (hide === undefined) {
            hide = false;
        }

        var notice = new PNotify({
            title: title,
            text: message,
            icon: false,
            type: type,
            hide: hide,
            styling: 'bootstrap3'
        });

        notice.get().click(function()
        {
            notice.remove();
        });
    };

    this.chartSolid = function (id, data, type)
    {
        var canvas = document.getElementById(id).getContext("2d");
        new Chart(canvas, {
            type: type,
            data: {
                labels: data.months,
                datasets: [{
                    label: data.label1,
                    backgroundColor: "#26B99A",
                    data: data.currentMonths,
                    fill: false
                }, {
                    label: data.label2,
                    backgroundColor: "#03586A",
                    data: data.lastYTDs,
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: !0
                        }
                    }]
                }
            }
        });
    };

    this.chartTransparent = function (id, data, type)
    {
        var canvas = document.getElementById(id).getContext("2d");
        new Chart(canvas, {
            type: type,
            data: {
                labels: data.months,
                datasets: [{
                    label: data.label1,
                    backgroundColor: "rgba(38, 185, 154, 0.31)",
                    borderColor: "rgba(38, 185, 154, 0.7)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: data.currentMonths,
                    fill: true
                }, {
                    label: data.label2,
                    backgroundColor: "rgba(3, 88, 106, 0.3)",
                    borderColor: "rgba(3, 88, 106, 0.70)",
                    pointBorderColor: "rgba(3, 88, 106, 0.70)",
                    pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(151,187,205,1)",
                    pointBorderWidth: 1,
                    data: data.lastYTDs,
                    fill: true
                }],
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            }
        });
    };

    // Initializing the __construct()
    this.__construct();
    
};

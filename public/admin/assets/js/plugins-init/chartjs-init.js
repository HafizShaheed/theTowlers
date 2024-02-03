(function($) {
  "use strict"


	/* function draw() {

	} */

 var dlabSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow

	var screenWidth = $(window).width();
 //========================================================================== Ratio graph start ========================= //

    // Current ratio  start

    var barChart1financialRatio = function(){
        if(jQuery('#barChart_financialRation').length > 0 ){
            const barChart_financialRation = document.getElementById("barChart_financialRation").getContext('2d');

            barChart_financialRation.height = 100;

            new Chart(barChart_financialRation, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Current Ratio",
                            data: financialrationGrapFY_current_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    // Current ratio  end

    var barChart_QuickRatio = function(){
        if(jQuery('#barChart_QuickRatio').length > 0 ){
            const barChart_QuickRatio = document.getElementById("barChart_QuickRatio").getContext('2d');

            barChart_QuickRatio.height = 100;

            new Chart(barChart_QuickRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Quick Ratio",
                            data: financialrationGrapFY_quick_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_DebtRatio = function(){
        if(jQuery('#barChart_DebtRatio').length > 0 ){
            const barChart_DebtRatio = document.getElementById("barChart_DebtRatio").getContext('2d');

            barChart_DebtRatio.height = 100;

            new Chart(barChart_DebtRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Dept Ratio",
                            data: financialrationGrapFY_debt_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_SolvencyRatio = function(){
        if(jQuery('#barChart_SolvencyRatio').length > 0 ){
            const barChart_SolvencyRatio = document.getElementById("barChart_SolvencyRatio").getContext('2d');

            barChart_SolvencyRatio.height = 100;

            new Chart(barChart_SolvencyRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Solvency Ratio",
                            data: financialrationGrapFY_solvency_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_DebtToEquityRatio = function(){
        if(jQuery('#barChart_DebtToEquityRatio').length > 0 ){
            const barChart_DebtToEquityRatio = document.getElementById("barChart_DebtToEquityRatio").getContext('2d');

            barChart_DebtToEquityRatio.height = 100;

            new Chart(barChart_DebtToEquityRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Ratio Dept to Equity",
                            data: financialrationGrapFY_debt_to_equity_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_AssetTurnoverRatio = function(){
        if(jQuery('#barChart_AssetTurnoverRatio').length > 0 ){
            const barChart_AssetTurnoverRatio = document.getElementById("barChart_AssetTurnoverRatio").getContext('2d');

            barChart_AssetTurnoverRatio.height = 100;

            new Chart(barChart_AssetTurnoverRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Asset Turnover Ratio",
                            data: financialrationGrapFY_asset_turnover_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_AbsoluteLiquidityRatio = function(){
        if(jQuery('#barChart_AbsoluteLiquidityRatio').length > 0 ){
            const barChart_AbsoluteLiquidityRatio = document.getElementById("barChart_AbsoluteLiquidityRatio").getContext('2d');

            barChart_AbsoluteLiquidityRatio.height = 100;

            new Chart(barChart_AbsoluteLiquidityRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials absolute liquidity ratio",
                            data: financialrationGrapFY_absolute_liquidity_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_ProprietaryRatio = function(){
        if(jQuery('#barChart_ProprietaryRatio').length > 0 ){
            const barChart_ProprietaryRatio = document.getElementById("barChart_ProprietaryRatio").getContext('2d');

            barChart_ProprietaryRatio.height = 100;

            new Chart(barChart_ProprietaryRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Property ratio",
                            data: financialrationGrapFY_proprietary_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }


    var barChart_NetProfitRatio = function(){
        if(jQuery('#barChart_NetProfitRatio').length > 0 ){
            const barChart_NetProfitRatio = document.getElementById("barChart_NetProfitRatio").getContext('2d');

            barChart_NetProfitRatio.height = 100;

            new Chart(barChart_NetProfitRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Net Profit",
                            data: financialrationGrapFY_net_profit_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_GrossProfitRatio = function(){
        if(jQuery('#barChart_GrossProfitRatio').length > 0 ){
            const barChart_GrossProfitRatio = document.getElementById("barChart_GrossProfitRatio").getContext('2d');

            barChart_GrossProfitRatio.height = 100;

            new Chart(barChart_GrossProfitRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Gross Profit",
                            data: financialrationGrapFY_gross_profit_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }


    var barChart_SpringateSScore = function(){
        if(jQuery('#barChart_SpringateSScore').length > 0 ){
            const barChart_SpringateSScore = document.getElementById("barChart_SpringateSScore").getContext('2d');

            barChart_SpringateSScore.height = 100;

            new Chart(barChart_SpringateSScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials springate score ratio",
                            data: financialrationGrapFY_springate_s_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TradeReceivableDays = function(){
        if(jQuery('#barChart_TradeReceivableDays').length > 0 ){
            const barChart_TradeReceivableDays = document.getElementById("barChart_TradeReceivableDays").getContext('2d');

            barChart_TradeReceivableDays.height = 100;

            new Chart(barChart_TradeReceivableDays, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials trade receivable days ratio",
                            data: financialrationGrapFY_trade_receivable_days_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TradePayableDays = function(){
        if(jQuery('#barChart_TradePayableDays').length > 0 ){
            const barChart_TradePayableDays = document.getElementById("barChart_TradePayableDays").getContext('2d');

            barChart_TradePayableDays.height = 100;

            new Chart(barChart_TradePayableDays, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financialstrade payable days ratio",
                            data: financialrationGrapFY_trade_payable_days_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TafflerZScore = function(){
        if(jQuery('#barChart_TafflerZScore').length > 0 ){
            const barChart_TafflerZScore = document.getElementById("barChart_TafflerZScore").getContext('2d');

            barChart_TafflerZScore.height = 100;

            new Chart(barChart_TafflerZScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials taffler z score ratio",
                            data: financialrationGrapFY_taffler_z_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_ZmijewskiXScore = function(){
        if(jQuery('#barChart_ZmijewskiXScore').length > 0 ){
            const barChart_ZmijewskiXScore = document.getElementById("barChart_ZmijewskiXScore").getContext('2d');

            barChart_ZmijewskiXScore.height = 100;

            new Chart(barChart_ZmijewskiXScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials zmijewski x score ratio",
                            data: financialrationGrapFY_zmijewski_x_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    //========================================================================== Ratio graph start ========================= //
    //========================================================================== BI graph start ========================= //


        // pay able start
    var barChart1businessIntelligenc = function(){
        if(jQuery('#barChart_businessIntelligence').length > 0 ){
            const barChart_businessIntelligence = document.getElementById("barChart_businessIntelligence").getContext('2d');

            barChart_businessIntelligence.height = 100;

            new Chart(barChart_businessIntelligence, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence operating efficiency",
                            data: businessInteligenceGrapFY_accounts_payable,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

        // pay able end
    var barChart_DaysSalesInInventory = function(){
        if(jQuery('#barChart_DaysSalesInInventory').length > 0 ){
            const barChart_DaysSalesInInventory = document.getElementById("barChart_DaysSalesInInventory").getContext('2d');

            barChart_DaysSalesInInventory.height = 100;

            new Chart(barChart_DaysSalesInInventory, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence inventory turnover",
                            data: businessInteligenceGrapFY_inventory_turnover,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_InventoryTurnoverRatio = function(){
        if(jQuery('#barChart_InventoryTurnoverRatio').length > 0 ){
            const barChart_InventoryTurnoverRatio = document.getElementById("barChart_InventoryTurnoverRatio").getContext('2d');

            barChart_InventoryTurnoverRatio.height = 100;

            new Chart(barChart_InventoryTurnoverRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence days sales in inventory",
                            data: businessInteligenceGrapFY_days_sales_in_inventory,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_OperatingEfficiencyRatio = function(){
        if(jQuery('#barChart_OperatingEfficiencyRatio').length > 0 ){
            const barChart_OperatingEfficiencyRatio = document.getElementById("barChart_OperatingEfficiencyRatio").getContext('2d');

            barChart_OperatingEfficiencyRatio.height = 100;

            new Chart(barChart_OperatingEfficiencyRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence accounts payable",
                            data: businessInteligenceGrapFY_operating_efficiency,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    //========================================================================== BI graph start ========================= //

    //========================================================================== Ratio graph start ========================= //


    //========================================================================== finding graph start ========================= //


    // Revenue graphp start
    var barChart1 = function(){
		if(jQuery('#barChart_1').length > 0 ){
			const barChart_1 = document.getElementById("barChart_1").getContext('2d');

			barChart_1.height = 100;

			new Chart(barChart_1, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Revenue",
                            data: financialFindingsGrapFY_revenue,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    // Revenue graphp end

    // =========================NetProfit graphp start  ===================
    var barChart_NetProfit = function(){
		if(jQuery('#barChart_NetProfit').length > 0 ){
			const barChart_NetProfit = document.getElementById("barChart_NetProfit").getContext('2d');

			barChart_NetProfit.height = 100;

			new Chart(barChart_NetProfit, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Net Profit",
                            data: financialFindingsGrapFY_net_profit,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =========================NetProfit graphp end =====================
    // ========================GrossProfit graphp start  ===================
     var barChart_GrossProfit = function(){
		if(jQuery('#barChart_GrossProfit').length > 0 ){
			const barChart_GrossProfit = document.getElementById("barChart_GrossProfit").getContext('2d');

			barChart_GrossProfit.height = 100;

			new Chart(barChart_GrossProfit, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Gross Profit",
                            data: financialFindingsGrapFY_gross_profit,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // ========================GrossProfit graphp end =====================
    // =======================WorkingCapital graphp start  ===================
    var barChart_WorkingCapital = function(){
		if(jQuery('#barChart_WorkingCapital').length > 0 ){
			const barChart_WorkingCapital = document.getElementById("barChart_WorkingCapital").getContext('2d');

			barChart_WorkingCapital.height = 100;

			new Chart(barChart_WorkingCapital, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Working Capital",
                            data: financialFindingsGrapFY_working_capital_1,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =======================WorkingCapital graphp end =====================

    // =======================WorkingCapital graphp start  ===================
    var barChart_QuickAssets = function(){
		if(jQuery('#barChart_QuickAssets').length > 0 ){
			const barChart_QuickAssets = document.getElementById("barChart_QuickAssets").getContext('2d');

			barChart_QuickAssets.height = 100;

			new Chart(barChart_QuickAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Quick Assets",
                            data: financialFindingsGrapFY_quick_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =======================WorkingCapital graphp end =====================

    var barChart_TotalAssets = function(){
		if(jQuery('#barChart_TotalAssets').length > 0 ){
			const barChart_TotalAssets = document.getElementById("barChart_TotalAssets").getContext('2d');

			barChart_TotalAssets.height = 100;

			new Chart(barChart_TotalAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Total Assets",
                            data: financialFindingsGrapFY_total_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CurrentAssets = function(){
		if(jQuery('#barChart_CurrentAssets').length > 0 ){
			const barChart_CurrentAssets = document.getElementById("barChart_CurrentAssets").getContext('2d');

			barChart_CurrentAssets.height = 100;

			new Chart(barChart_CurrentAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Current Assets",
                            data: financialFindingsGrapFY_current_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CurrentLiabilities = function(){
		if(jQuery('#barChart_CurrentLiabilities').length > 0 ){
			const barChart_CurrentLiabilities = document.getElementById("barChart_CurrentLiabilities").getContext('2d');

			barChart_CurrentLiabilities.height = 100;

			new Chart(barChart_CurrentLiabilities, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Current Liabilities",
                            data: financialFindingsGrapFY_current_liabilities,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_Debt = function(){
		if(jQuery('#barChart_Debt').length > 0 ){
			const barChart_Debt = document.getElementById("barChart_Debt").getContext('2d');

			barChart_Debt.height = 100;

			new Chart(barChart_Debt, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Debt",
                            data: financialFindingsGrapFY_debt,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    var barChart_AverageInventory = function(){
		if(jQuery('#barChart_AverageInventory').length > 0 ){
			const barChart_AverageInventory = document.getElementById("barChart_AverageInventory").getContext('2d');

			barChart_AverageInventory.height = 100;

			new Chart(barChart_AverageInventory, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Average Inventory",
                            data: financialFindingsGrapFY_average_inventory,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_NetSales = function(){
		if(jQuery('#barChart_NetSales').length > 0 ){
			const barChart_NetSales = document.getElementById("barChart_NetSales").getContext('2d');

			barChart_NetSales.height = 100;

			new Chart(barChart_NetSales, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Net Sales",
                            data: financialFindingsGrapFY_net_sales,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_ShareCapital = function(){
		if(jQuery('#barChart_ShareCapital').length > 0 ){
			const barChart_ShareCapital = document.getElementById("barChart_ShareCapital").getContext('2d');

			barChart_ShareCapital.height = 100;

			new Chart(barChart_ShareCapital, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Equity Share Capital",
                            data: financialFindingsGrapFY_equity_share_capital,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_SundryDebtors = function(){
		if(jQuery('#barChart_SundryDebtors').length > 0 ){
			const barChart_SundryDebtors = document.getElementById("barChart_SundryDebtors").getContext('2d');

			barChart_SundryDebtors.height = 100;

			new Chart(barChart_SundryDebtors, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Sundry Debtors",
                            data: financialFindingsGrapFY_sundry_debtors,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}


    var barChart_SundryCreditors = function(){
		if(jQuery('#barChart_SundryCreditors').length > 0 ){
			const barChart_SundryCreditors = document.getElementById("barChart_SundryCreditors").getContext('2d');

			barChart_SundryCreditors.height = 100;

			new Chart(barChart_SundryCreditors, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Sundry Creditors",
                            data: financialFindingsGrapFY_sundry_creditors,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_LoansAndAdvances = function(){
		if(jQuery('#barChart_LoansAndAdvances').length > 0 ){
			const barChart_LoansAndAdvances = document.getElementById("barChart_LoansAndAdvances").getContext('2d');

			barChart_LoansAndAdvances.height = 100;

			new Chart(barChart_LoansAndAdvances, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Loans And Advances",
                            data: financialFindingsGrapFY_loans_and_advances,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CashAndCashEquivalents = function(){
		if(jQuery('#barChart_CashAndCashEquivalents').length > 0 ){
			const barChart_CashAndCashEquivalents = document.getElementById("barChart_CashAndCashEquivalents").getContext('2d');

			barChart_CashAndCashEquivalents.height = 100;

			new Chart(barChart_CashAndCashEquivalents, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Cash & Cash Equivalents",
                            data: financialFindingsGrapFY_cash_and_cash_equivalents,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}




    // finding graph end
	var barChart2 = function(){
		if(jQuery('#barChart_2').length > 0 ){

		//gradient bar chart
			const barChart_2 = document.getElementById("barChart_2").getContext('2d');
			//generate gradient
			const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
			barChart_2gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			barChart_2gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			barChart_2.height = 100;

			new Chart(barChart_2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [65, 59, 80, 81, 56, 55, 40],
							borderColor: barChart_2gradientStroke,
							borderWidth: "0",
							backgroundColor: barChart_2gradientStroke,
							hoverBackgroundColor: barChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							//display:0,
							ticks: {
								beginAtZero: true,
								fontColor:	'#888',

							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var barChart3 = function(){
		//stalked bar chart
		if(jQuery('#barChart_3').length > 0 ){
			const barChart_3 = document.getElementById("barChart_3").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			barChart_3gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			const barChart_3gradientStroke2 = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(98, 126, 234, 1)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(98, 126, 234, 1)");

			const barChart_3gradientStroke3 = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(238, 60, 60, 1)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(238, 60, 60, 1)");

			barChart_3.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
				datasets: [{
					label: 'Red',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}, {
					label: 'Green',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}, {
					label: 'Blue',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}]

			};

			new Chart(barChart_3, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					},
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							//display:0,
							stacked: true,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						yAxes: [{
							//display:0,
							stacked: true,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart1 = function(){


		if(jQuery('#lineChart_1').length > 0 ){


		//basic line chart
			const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(255, 0, 0, .2)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_1.height = 100;

			new Chart(lineChart_1, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgba(44, 44, 44, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 1)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});

		}
	}

	var lineChart2 = function(){
		//gradient line chart
		if(jQuery('#lineChart_2').length > 0 ){

			const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');
			//generate gradient
			const lineChart_2gradientStroke = lineChart_2.createLinearGradient(500, 0, 100, 0);
			lineChart_2gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			lineChart_2gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 128, .2)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_2.height = 100;

			new Chart(lineChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: lineChart_2gradientStroke,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 0.5)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart3 = function(){
		//dual line chart
		if(jQuery('#lineChart_3').length > 0 ){
			const lineChart_3 = document.getElementById("lineChart_3").getContext('2d');
			//generate gradient
			const lineChart_3gradientStroke1 = lineChart_3.createLinearGradient(500, 0, 100, 0);
			lineChart_3gradientStroke1.addColorStop(0, "rgba(44, 44, 44, 1)");
			lineChart_3gradientStroke1.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			const lineChart_3gradientStroke2 = lineChart_3.createLinearGradient(500, 0, 100, 0);
			lineChart_3gradientStroke2.addColorStop(0, "rgba(255, 92, 0, 1)");
			lineChart_3gradientStroke2.addColorStop(1, "rgba(255, 92, 0, 1)");

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 0, 0)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_3.height = 100;

			new Chart(lineChart_3, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: lineChart_3gradientStroke1,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 0.5)'
						}, {
							label: "My First dataset",
							data: [5, 20, 15, 41, 35, 65, 80],
							borderColor: lineChart_3gradientStroke2,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(254, 176, 25, 1)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart03 = function(){
		//dual line chart
		if(jQuery('#lineChart_3Kk').length > 0 ){
			const lineChart_3Kk = document.getElementById("lineChart_3Kk").getContext('2d');
			//generate gradient

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 0, 0)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_3Kk.height = 100;

			new Chart(lineChart_3Kk, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [90, 60, 80, 50, 60, 55, 80],
							borderColor: 'rgba(58,122,254,1)',
							borderWidth: "3",
							backgroundColor: 'rgba(0,0,0,0)',
							pointBackgroundColor: 'rgba(0, 0, 0, 0)'
						}
					]
				},
				options: {
					legend: false,
					elements: {
							point:{
								radius: 0
							}
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							},
							borderWidth:3,
							display:false,
							lineTension:0.4,
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}

						}]
					}
				}
			});
		}

	}
	var areaChart1 = function(){
		//basic area chart
		if(jQuery('#areaChart_1').length > 0 ){
			const areaChart_1 = document.getElementById("areaChart_1").getContext('2d');

			areaChart_1.height = 100;

			new Chart(areaChart_1, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgba(0, 0, 1128, .3)',
							borderWidth: "1",
							backgroundColor: 'rgba(44, 44, 44,1)',
							pointBackgroundColor: 'rgba(0, 0, 1128, .3)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var areaChart2 = function(){
		//gradient area chart
		if(jQuery('#areaChart_2').length > 0 ){
			const areaChart_2 = document.getElementById("areaChart_2").getContext('2d');
			//generate gradient
			const areaChart_2gradientStroke = areaChart_2.createLinearGradient(0, 1, 0, 500);
			areaChart_2gradientStroke.addColorStop(0, "rgba(238, 60, 60, 0.2)");
			areaChart_2gradientStroke.addColorStop(1, "rgba(238, 60, 60, 0)");

			areaChart_2.height = 100;

			new Chart(areaChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: "#ff2625",
							borderWidth: "4",
							backgroundColor: areaChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var areaChart3 = function(){
		//gradient area chart
		if(jQuery('#areaChart_3').length > 0 ){
			const areaChart_3 = document.getElementById("areaChart_3").getContext('2d');

			areaChart_3.height = 100;

			new Chart(areaChart_3, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgb(44, 44, 44)',
							borderWidth: "1",
							backgroundColor: 'rgba(44, 44, 44,1)'
						},
						{
							label: "My First dataset",
							data: [5, 25, 20, 41, 36, 75, 70],
							borderColor: 'rgb(255, 92, 0)',
							borderWidth: "1",
							backgroundColor: 'rgba(255, 92, 0, .5)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var radarChart = function(){
		if(jQuery('#radar_chart').length > 0 ){
			//radar chart
			const radar_chart = document.getElementById("radar_chart").getContext('2d');

			const radar_chartgradientStroke1 = radar_chart.createLinearGradient(500, 0, 100, 0);
			radar_chartgradientStroke1.addColorStop(0, "rgba(54, 185, 216, .5)");
			radar_chartgradientStroke1.addColorStop(1, "rgba(75, 255, 162, .5)");

			const radar_chartgradientStroke2 = radar_chart.createLinearGradient(500, 0, 100, 0);
			radar_chartgradientStroke2.addColorStop(0, "rgba(68, 0, 235, .5");
			radar_chartgradientStroke2.addColorStop(1, "rgba(68, 236, 245, .5");

			// radar_chart.height = 100;
			new Chart(radar_chart, {
				type: 'radar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
					datasets: [
						{
							label: "My First dataset",
							data: [65, 59, 66, 45, 56, 55, 40],
							borderColor: '#ffff',
							borderWidth: "1",
							backgroundColor: radar_chartgradientStroke2
						},
						{
							label: "My Second dataset",
							data: [28, 12, 40, 19, 63, 27, 87],
							borderColor: '#ffff',
							borderWidth: "1",
							backgroundColor: radar_chartgradientStroke1
						}
					]
				},
				options: {
					legend: false,
					//maintainAspectRatio: false,
					scale: {
						ticks: {
							beginAtZero: true,
							fontColor:'#ffffff',
						},
						gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
					}
				}
			});
		}
	}
	var pieChart = function(){
		//pie chart
		if(jQuery('#pie_chart').length > 0 ){
			//pie chart
			const pie_chart = document.getElementById("pie_chart").getContext('2d');
			// pie_chart.height = 100;
			new Chart(pie_chart, {
				type: 'pie',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [45, 25, 20, 10],
						borderWidth: 0,
						backgroundColor: [
							"rgba(44, 44, 44, .9)",
							"rgba(44, 44, 44, .7)",
							"rgba(44, 44, 44,1)",
							"rgba(0,0,0,0.07)"
						],
						hoverBackgroundColor: [
							"rgba(44, 44, 44, .9)",
							"rgba(44, 44, 44, .7)",
							"rgba(44, 44, 44,1)",
							"rgba(0,0,0,0.07)"
						]

					}],
					labels: [
						"one",
						"two",
						"three",
						"four"
					]
				},
				options: {
					responsive: true,
					legend: false,
					//maintainAspectRatio: false
				}
			});
		}
	}
    var doughnutChart = function(){
		if(jQuery('#doughnut_chart').length > 0 ){
			//doughut chart
			const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
			doughnut_chart.height = 100;
			new Chart(doughnut_chart, {
				type: 'doughnut',
				data: {
					weight: 5,
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: finalValueforGraKeyObservation,
						borderWidth: 3,
						borderColor: "rgba(255,255,255,1)",
						backgroundColor: [
							"rgba(98, 126, 234, 1)",


						],
						hoverBackgroundColor: [
							"rgba(98, 126, 234, .9)",

						]

					}],
					labels: [
					    "Score",
					    "Out of",


					]
				},
				options: {
					weight: 19,

                     cutoutPercentage: 80,
                rotation: 1 * Math.PI,
                circumference: 1 * Math.PI,
                responsive: true,
					// maintainAspectRatio: false
				}
			});
		}
	}
    // var doughnutChart = function(){
    //     if(jQuery('#doughnut_chart').length > 0 ){
    //         //doughut chart
    //         const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
    //         doughnut_chart.height = 100;

    //         new Chart(doughnut_chart, {
    //             type: 'doughnut',
    //             data: {
    //                 weight: 5,
    //                 defaultFontFamily: 'Poppins',
    //                 datasets: [{
    //                     data: [2],
    //                     borderWidth: 3,
    //                     borderColor: "rgba(255,255,255,1)",
    //                     backgroundColor: [
    //                         "rgba(98, 126, 234, 1)",
    //                     ],
    //                     hoverBackgroundColor: [
    //                         "rgba(98, 126, 234, .9)",
    //                     ]
    //                 }],
    //                 labels: ["score"],
    //             },
    //             options: {
    //                 weight: 19,
    //                 cutoutPercentage: 80,
    //                 rotation: 1 * Math.PI,
    //                 circumference: 1 * Math.PI,
    //                 responsive: true,
    //                 plugins: {
    //                     afterDraw: function(chart) {
    //                         var ctx = chart.ctx;
    //                         var width = chart.width;
    //                         var height = chart.height;

    //                         var heading = "Doughnut Chart";
    //                         var label = "Score";
    //                         var value = chart.data.datasets[0].data[0].toString();

    //                         ctx.font = "24px Poppins";
    //                         ctx.fillStyle = "#666"; // Color for the heading
    //                         ctx.textBaseline = "middle";
    //                         ctx.textAlign = "center";

    //                         var centerX = width / 2;
    //                         var centerY = height / 4; // Adjust the vertical position

    //                         // Display the heading
    //                         ctx.fillText(heading, centerX, centerY);

    //                         // Display the label
    //                         ctx.font = "20px Poppins";
    //                         centerY += 20; // Adjust the vertical position
    //                         ctx.fillText(label, centerX, centerY);

    //                         // Display the value
    //                         ctx.font = "30px Poppins";
    //                         centerY += 30; // Adjust the vertical position
    //                         ctx.fillText(value, centerX, centerY);
    //                     }
    //                 }
    //             }
    //         });
    //     }
    // }

	var polarChart = function(){
		if(jQuery('#polar_chart').length > 0 ){
			//polar chart
			const polar_chart = document.getElementById("polar_chart").getContext('2d');
			// polar_chart.height = 100;
			new Chart(polar_chart, {
				type: 'polarArea',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [15, 18, 9, 6, 19],
						borderWidth: 0,
						backgroundColor: [
							"rgba(44, 44, 44, 1)",
							"rgba(98, 126, 234, 1)",
							"rgba(238, 60, 60, 1)",
							"rgba(54, 147, 255, 1)",
							"rgba(255, 92, 0, 1)"
						]

					}]
				},
				options: {
					responsive: true,
					//maintainAspectRatio: false
				}
			});

		}
	}



	/* Function ============ */
	return {
		init:function(){
		},


		load:function(){
            barChart1();
			barChart_NetProfit();
            barChart_GrossProfit();
            barChart_WorkingCapital();
            barChart_QuickAssets();
            barChart_TotalAssets();
            barChart_CurrentAssets();
            barChart_CurrentLiabilities();

            barChart_Debt();
            barChart_AverageInventory();
            barChart_NetSales();
            barChart_ShareCapital();


            barChart_SundryDebtors();
            barChart_SundryCreditors();
            barChart_LoansAndAdvances();
            barChart_CashAndCashEquivalents();

			// finding financial end
            // financial Ratio start

            barChart1financialRatio();
            barChart_QuickRatio();
            barChart_DebtRatio();
            barChart_SolvencyRatio();
            barChart_DebtToEquityRatio();
            barChart_AssetTurnoverRatio();
            barChart_AbsoluteLiquidityRatio();
            barChart_ProprietaryRatio();
            barChart_NetProfitRatio();
            barChart_GrossProfitRatio();
            barChart_SpringateSScore();
            barChart_TradeReceivableDays();
            barChart_TradePayableDays();
            barChart_TafflerZScore();
            barChart_ZmijewskiXScore();

            // financial Ratio end


            // business Ratio start
            barChart1businessIntelligenc();
            barChart_DaysSalesInInventory();
            barChart_InventoryTurnoverRatio();
            barChart_OperatingEfficiencyRatio();
            // business Ratio end


            // doughnutChartall();
			barChart2();
			barChart3();
			lineChart1();
			lineChart2();
			lineChart3();
			lineChart03();
			areaChart1();
			areaChart2();
			areaChart3();
			radarChart();
			pieChart();
			doughnutChart();
			polarChart();
		},

		resize:function(){
			// barChart1();
			// barChart2();
			// barChart3();
			// lineChart1();
			// lineChart2();
			// lineChart3();
			// lineChart03();
			// areaChart1();
			// areaChart2();
			// areaChart3();
			// radarChart();
			// pieChart();
			// doughnutChart();
			// polarChart();
		}
	}

}();

jQuery(document).ready(function(){
});

jQuery(window).on('load',function(){
	dlabSparkLine.load();
});

jQuery(window).on('resize',function(){
	//dlabSparkLine.resize();
	setTimeout(function(){ dlabSparkLine.resize(); }, 1000);
});

})(jQuery);

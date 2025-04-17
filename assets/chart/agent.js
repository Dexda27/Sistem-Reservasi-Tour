/**
 * Statistics Cards
 */

'use strict';

(function () {
  window.onload = function () {

    var dataFromPHP = JSON.parse(document.getElementById('dataFromPHP').textContent); 
    var dataMonth = JSON.parse(document.getElementById('dataMounth').textContent); 
    var dataYear = JSON.parse(document.getElementById('dataYear').textContent); 

  // fungsi untuk last week Chart
  // --------------------------------------------------------------------
    function generateDateRange(startDate, endDate) {
      let dates = [];
      let currentDate = new Date(startDate);
      let end = new Date(endDate);

      while (currentDate <= end) {
        dates.push(currentDate.toISOString().split('T')[0]); // Format YYYY-MM-DD
        currentDate.setDate(currentDate.getDate() + 1);
      }

      return dates;
    }
    function getDynamicDates() {
      let today = new Date();

      let endDate = new Date();
      endDate.setDate(today.getDate() - 1);
      endDate = endDate.toISOString().split('T')[0]; 

      let startDate = new Date();
      startDate.setDate(today.getDate() - 7); 
      startDate = startDate.toISOString().split('T')[0];

      return { startDate, endDate };
    }
    var { startDate, endDate } = getDynamicDates();
    // Menghasilkan rentang tanggal
    var allDates = generateDateRange(startDate, endDate);
    // Mengubah dataFromPHP ke dalam format yang mudah digunakan
    var dataMap = dataFromPHP.reduce(function(acc, item) {
      acc[item.date] = parseInt(item.reservations_count);
      return acc;
    }, {});
    // Menyiapkan data untuk grafik
    var labels = allDates;
    var data = allDates.map(function(date) {
      return dataMap[date] || 0; 
    });


  // fungsi untuk last month Chart
  // --------------------------------------------------------------------
    function getDynamicDatesMonth() {
      let today = new Date();

      let endDate = new Date();
      endDate.setDate(today.getDate() - 1);
      endDate = endDate.toISOString().split('T')[0]; 

      let startDate = new Date();
      startDate.setDate(today.getDate() - 30); 
      startDate = startDate.toISOString().split('T')[0];

      return { startDate, endDate };
    }
    var { startDate, endDate } = getDynamicDatesMonth();
    var allDates = generateDateRange(startDate, endDate);
    var dataMapMonth = dataMonth.reduce(function(acc, item) {
      acc[item.date] = parseInt(item.reservations_count);
      return acc;
    }, {});
    var dataMonth = allDates.map(function(date) {
      return dataMapMonth[date] || 0; 
    });

    // console.log(dataMounth)


  // fungsi untuk last year Chart
  // --------------------------------------------------------------------
    function getDynamicDatesYear() {
      let today = new Date();

      let endDate = new Date();
      endDate.setDate(today.getDate() - 1);
      endDate = endDate.toISOString().split('T')[0]; 

      let startDate = new Date();
      startDate.setDate(today.getDate() - 365); 
      startDate = startDate.toISOString().split('T')[0];

      return { startDate, endDate };
    }
    var { startDate, endDate } = getDynamicDatesYear();
    var allDates = generateDateRange(startDate, endDate);
    var dataMapYear = dataYear.reduce(function(acc, item) {
      acc[item.date] = parseInt(item.reservations_count);
      return acc;
    }, {});
    var dataYear = allDates.map(function(date) {
      return dataMapYear[date] || 0; 
    });

    // console.log(dataMounth)



    let cardColor, shadeColor, labelColor, headingColor, barBgColor, borderColor;

    if (isDarkStyle) {
      cardColor = config.colors_dark.cardColor;
      labelColor = config.colors_dark.textMuted;
      headingColor = config.colors_dark.headingColor;
      shadeColor = 'dark';
      barBgColor = '#8692d014';
      borderColor = config.colors_dark.borderColor;
    } else {
      cardColor = config.colors.cardColor;
      labelColor = config.colors.textMuted;
      headingColor = config.colors.headingColor;
      shadeColor = '';
      barBgColor = '#4b465c14';
      borderColor = config.colors.borderColor;
    }


  // Orders last week Bar Chart
  // --------------------------------------------------------------------
    const ordersLastWeekEl = document.querySelector('#ordersLastWeek'),
    ordersLastWeekConfig = {
      chart: {
        height: 90,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          barHeight: '100%',
          columnWidth: '40px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          colors: {
            backgroundBarColors: [barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor],
            backgroundBarRadius: 4
          }
        }
      },
      colors: [config.colors.primary],
      grid: {
        show: false,
        padding: {
          top: -30,
          left: -16,
          bottom: 0,
          right: -6
        }
      },
      dataLabels: {
        enabled: false
      },
      series: [
      {
        data: data
        // data : [10,123,123,123,123,123,14]
      }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
      {
        breakpoint: 1441,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '40%',
              borderRadius: 4
            }
          }
        }
      },
      {
        breakpoint: 1368,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '48%'
            }
          }
        }
      },
      {
        breakpoint: 1200,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 6,
              columnWidth: '30%',
              colors: {
                backgroundBarRadius: 6
              }
            }
          }
        }
      },
      {
        breakpoint: 991,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '35%',
              borderRadius: 6
            }
          }
        }
      },
      {
        breakpoint: 883,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '40%'
            }
          }
        }
      },
      {
        breakpoint: 768,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '25%'
            }
          }
        }
      },
      {
        breakpoint: 576,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 9
            },
            colors: {
              backgroundBarRadius: 9
            }
          }
        }
      },
      {
        breakpoint: 479,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 4,
              columnWidth: '35%'
            },
            colors: {
              backgroundBarRadius: 4
            }
          },
          grid: {
            padding: {
              right: -15,
              left: -15
            }
          }
        }
      },
      {
        breakpoint: 376,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 3
            }
          }
        }
      }
      ]
    };
    if (typeof ordersLastWeekEl !== undefined && ordersLastWeekEl !== null) {
      const ordersLastWeek = new ApexCharts(ordersLastWeekEl, ordersLastWeekConfig);
      ordersLastWeek.render();
    }

  // Sales last year Area Chart
  // --------------------------------------------------------------------
    const salesLastYearEl = document.querySelector('#salesLastYear'),
    salesLastYearConfig = {
      chart: {
        height: 90,
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.25
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
      {
        data: dataYear
        // data : [10,123,123,123,123,123,14]
      }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
    if (typeof salesLastYearEl !== undefined && salesLastYearEl !== null) {
      const salesLastYear = new ApexCharts(salesLastYearEl, salesLastYearConfig);
      salesLastYear.render();
    }

  // Order Received Area Chart
  // --------------------------------------------------------------------
    const orderReceivedEl = document.querySelector('#orderReceived'),
    orderReceivedConfig = {
      chart: {
        height: 90,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.warning],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.1
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
      {
        data: dataMonth
        // data : [10,123,123,123,123,123,14]
      }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
    if (typeof orderReceivedEl !== undefined && orderReceivedEl !== null) {
      const orderReceived = new ApexCharts(orderReceivedEl, orderReceivedConfig);
      orderReceived.render();
    }

  }
})();

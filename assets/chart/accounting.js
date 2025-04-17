/**
 * Statistics Cards
 */

'use strict';

(function () {
  window.onload = function () {



    var bulanPertama = JSON.parse(document.getElementById('bulanPertama').textContent); 
    var bulanKedua = JSON.parse(document.getElementById('bulanKedua').textContent); 
    function getCurrentMonthName(i) {
      const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
        ];

      const now = new Date();
      const monthIndex = now.getMonth() - parseInt(i); 

      return months[monthIndex];
    }


    function formatDateString(dateString) {
      let [year, month, day] = dateString.split('-');
      if (month.length === 1) {
        month = '0' + month;
      }
      if (day.length === 1) {
        day = '0' + day;
      }

      return `${year}-${month}-${day}`;
    }
    function generateDateForCurrentMonth() {
      let dates = [];
      let now = new Date();

      let startDate = new Date(now.getFullYear(), now.getMonth(), 1); 
      let endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);

      let currentDate = new Date(startDate);

      while (currentDate <= endDate) {
        let tgl = new Date(currentDate).getDate();
        dates.push(tgl); 
        currentDate.setDate(currentDate.getDate() + 1);
      }

      return dates;
    }

    function generateDateRangeForCurrentMonth() {
      let dates = [];
      let now = new Date();

      let startDate = new Date(now.getFullYear(), now.getMonth(), 1); 
      let endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);

      let currentDate = new Date(startDate);

      while (currentDate <= endDate) {
        let tgl = new Date(currentDate).getFullYear()+"-"+ (new Date(currentDate).getMonth() + 1) +"-"+new Date(currentDate).getDate();
        dates.push(formatDateString(tgl)); // Format YYYY-MM-DD
        currentDate.setDate(currentDate.getDate() + 1);
      }

      return dates;
    }

    function generateDateRangeForPreviousMonth() {
      let dates = [];
      let now = new Date();
      let startDate = new Date(now.getFullYear(), now.getMonth() - 1,1); 
      let endDate = new Date(now.getFullYear(), now.getMonth(), 0); 

      let currentDate = new Date(startDate);

      while (currentDate <= endDate) {
        let tgl = new Date(currentDate).getFullYear()+"-"+ (new Date(currentDate).getMonth() + 1) +"-"+new Date(currentDate).getDate();
        // console.log(tgl)
        dates.push(formatDateString(tgl));
        currentDate.setDate(currentDate.getDate() + 1);
      }

      return dates;
    }

    var allDates = generateDateRangeForCurrentMonth();
    var dataMapBulanPertama = bulanPertama.reduce(function(acc, item) {
      acc[item.date] = parseInt(item.total);
      return acc;
    }, {});
    var bulanPertama = allDates.map(function(date) {
      return dataMapBulanPertama[date] || 0; 
    });


    var allDates = generateDateRangeForPreviousMonth();
    var dataMapBulanKedua = bulanKedua.reduce(function(acc, item) {
      acc[item.date] = parseInt(item.total);
      return acc;
    }, {});
    var bulanKedua = allDates.map(function(date) {
      return dataMapBulanKedua[date] || 0; 
    });
    console.log(bulanKedua)
    console.log(allDates)

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

    const profitLastMonthEl = document.querySelector('#profitLastMonth'),
    profitLastMonthConfig = {
      chart: {
        height: 350,
        type: 'line',
        parentHeightOffset: 0,
        toolbar: {
          show: true
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 6,
        xaxis: {
          lines: {
            show: true,
            colors: '#000'
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: 10,
          left: 10,
          right: 20,
          bottom: 10
        }
      },
      colors: [config.colors.success,config.colors.warning],
      stroke: {
        curve: 'smooth',
        width: 2
      },
      series: [
      {
        name: getCurrentMonthName(0),
        data: bulanPertama
      },
      {
        name: getCurrentMonthName(1),
        data: bulanKedua
      }
      ],
      tooltip: {
        shared: false,
        intersect: true,
        x: {
          show: false
        }
      },
      xaxis: {
        categories: generateDateForCurrentMonth(),
        title: {
          text: 'Month'
        },
        labels: {
          show: true
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      markers: {
        size: 3.5,
        fillColor: config.colors.info,
        strokeColors: 'transparent',
        strokeWidth: 3.2,
        discrete: [
        {
          seriesIndex: 0,
          dataPointIndex: 5,
          fillColor: cardColor,
          strokeColor: config.colors.info,
          size: 5,
          shape: 'circle'
        }
        ],
        hover: {
          size: 5.5
        }
      },
      responsive: [
      {
        breakpoint: 768,
        options: {
          chart: {
            height: 110
          }
        }
      }
      ]
    };

    if (typeof profitLastMonthEl !== undefined && profitLastMonthEl !== null) {
      const profitLastMonth = new ApexCharts(profitLastMonthEl, profitLastMonthConfig);
      profitLastMonth.render();
    }

  }
})();
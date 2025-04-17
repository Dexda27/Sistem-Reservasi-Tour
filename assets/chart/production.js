/**
 * Statistics Cards
 */

'use strict';

(function () {
	window.onload = function () {

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
  // Donut Chart Colors
		const chartColors = {
			donut: {
				series1: config.colors.success,
				series2: '#28c76fb3',
				series3: '#28c76f80',
				series4: config.colors_label.success
			}
		};

		const chartColorsProduk = {
			donut: {
				series1: config.colors.warning,
				series2: '#FCB36B',
				series3: '#FBD3AC',
				series4: config.colors_label.warning
			}
		};

  // Generated Leads Chart
 // --------------------------------------------------------------------
		var dataProgram = JSON.parse(document.getElementById('dataProgram').textContent); 
		var dataMap = dataProgram.reduce(function(acc, item) {
			acc[item.nama_program] = parseInt(item.count_program);
			return acc;
		}, {});

		const programNames = Object.keys(dataMap);
		const programValues = Object.values(dataMap);

		const generatedLeadsChartEl = document.querySelector('#generatedLeadsChart'),
		generatedLeadsChartConfig = {
			chart: {
				height: 400,
				width: 380,
				parentHeightOffset: 0,
				type: 'donut'
			},
			labels: programNames,
			series: programValues,
			colors: [
				chartColors.donut.series1,
				chartColors.donut.series2,
				chartColors.donut.series3,
				chartColors.donut.series4
				],
			stroke: {
				width: 0
			},
			dataLabels: {
				enabled: false,
				formatter: function (val, opt) {
					return parseInt(val) + '%';
				}
			},
			legend: {
				show: true
			},
			tooltip: {
				theme: false
			},
			grid: {
				padding: {
					top: 10,
					right: -20,
					left: 50
				}
			},
			states: {
				hover: {
					filter: {
						type: 'none'
					}
				}
			},
			plotOptions: {
				pie: {
					donut: {
						size: '50%',
						labels: {
							show: true,
							value: {
								fontSize: '1.375rem',
								fontFamily: 'Public Sans',
								color: headingColor,
								fontWeight: 600,
								offsetY: -15,
								formatter: function (val) {
									return parseInt(val) + '%';
								}
							},
							name: {
								offsetY: 20,
								fontFamily: 'Public Sans'
							},
							total: {
								show: false,
								showAlways: true,
								color: config.colors.success,
								fontSize: '.8125rem',
								label: 'Total',
								fontFamily: 'Public Sans',
								formatter: function (w) {
									return '111';
								}
							}
						}
					}
				}
			}
		};
		if (typeof generatedLeadsChartEl !== undefined && generatedLeadsChartEl !== null) {
			const generatedLeadsChart = new ApexCharts(generatedLeadsChartEl, generatedLeadsChartConfig);
			generatedLeadsChart.render();
		}


		var dataProduk = JSON.parse(document.getElementById('dataProduk').textContent);
		var dataMap = dataProduk.reduce(function(acc, item) {
			acc[item.nama_produk] = parseInt(item.count_produk);
			return acc;
		}, {});
		const produkNames = Object.keys(dataMap);
		const produkValues = Object.values(dataMap);


		const generatedLeadsChartElProduk = document.querySelector('#generatedLeadsChartProduk'),
		generatedLeadsChartConfigProduk = {
			chart: {
				height: 400,
				width: 380,
				parentHeightOffset: 0,
				type: 'donut'
			},
			labels: produkNames,
			series: produkValues,
			colors: [
				chartColorsProduk.donut.series1,
				chartColorsProduk.donut.series2,
				chartColorsProduk.donut.series3,
				chartColorsProduk.donut.series4
				],
			stroke: {
				width: 0
			},
			dataLabels: {
				enabled: false,
				formatter: function (val, opt) {
					return parseInt(val) + '%';
				}
			},
			legend: {
				show: true
			},
			tooltip: {
				theme: false
			},
			grid: {
				padding: {
					top: 15,
					right: -20,
					left: 50
				}
			},
			states: {
				hover: {
					filter: {
						type: 'none'
					}
				}
			},
			plotOptions: {
				pie: {
					donut: {
						size: '50%',
						labels: {
							show: true,
							value: {
								fontSize: '1.375rem',
								fontFamily: 'Public Sans',
								color: headingColor,
								fontWeight: 600,
								offsetY: -15,
								formatter: function (val) {
									return parseInt(val) + '%';
								}
							},
							name: {
								offsetY: 20,
								fontFamily: 'Public Sans'
							},
							total: {
								show: false,
								showAlways: true,
								color: config.colors.success,
								fontSize: '.8125rem',
								label: 'Total',
								fontFamily: 'Public Sans',
								formatter: function (w) {
									return '111';
								}
							}
						}
					}
				}
			}
		};
		if (typeof generatedLeadsChartElProduk !== undefined && generatedLeadsChartElProduk !== null) {
			const generatedLeadsChartProduk = new ApexCharts(generatedLeadsChartElProduk, generatedLeadsChartConfigProduk);
			generatedLeadsChartProduk.render();
		}

	};
})();

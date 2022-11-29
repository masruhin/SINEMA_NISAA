<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
  <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
        class="ml-25" href="#" target="_blank">Development</a></span></p>
</footer>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="../plugins/select2/js/select2.full.min.js"></script> -->
<script src="../vendor/app-assets/vendors/js/vendors.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="../vendor/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="../vendor/app-assets/vendors/js/charts/chart.min.js"></script>
<script src="../vendor/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
<script src="../vendor/app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
<script src="js/vendors.min.js"></script>
<script src="../vendor/app-assets/vendors/js/charts/chart.min.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="../vendor/app-assets/js/core/app-menu.js"></script>
<script src="../vendor/app-assets/js/core/app.js"></script>
<!-- <script src="../vendor/app-assets/vendors/js/forms/select/select2.full.min.js"></script> -->
<script src="../vendor/app-assets/js/scripts/charts/chart-chartjs.js"></script>
<script src="../vendor/app-assets/js/scripts/forms/form-select2.js"></script>
<script src="../vendor/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../vendor/app-assets/vendors/js/file-uploaders/dropzone.min.js"></script>
<script src="../vendor/app-assets/js/scripts/forms/form-file-uploader.js"></script>
<script>
$(function() {
  $("#dataTables").DataTable({
    "responsive": true,
    "autoWidth": true,
  });
});
</script>
<script>
$(window).on('load', function() {
  if (feather) {
    feather.replace({
      width: 14,
      height: 14
    });
  }
})
</script>
<script>
$(window).on('load', function() {
  'use strict';

  var chartWrapper = $('.chartjs'),
    flatPicker = $('.flat-picker'),
    radarChartEx = $('.radar-chart-ex'),
    polarAreaChartEx = $('.polar-area-chart-ex');

  // Color Variables
  var primaryColorShade = '#836AF9',
    yellowColor = '#ffe800',
    successColorShade = '#28dac6',
    warningColorShade = '#ffe802',
    warningLightColor = '#FDAC34',
    infoColorShade = '#299AFF',
    greyColor = '#4F5D70',
    blueColor = '#2c9aff',
    blueLightColor = '#84D0FF',
    greyLightColor = '#EDF1F4',
    tooltipShadow = 'rgba(0, 0, 0, 0.25)',
    lineChartPrimary = '#666ee8',
    lineChartDanger = '#ff4961',
    labelColor = '#6e6b7b',
    grid_line_color = 'rgba(200, 200, 200, 0.2)'; // RGBA color helps in dark layout

  // Detect Dark Layout
  if ($('html').hasClass('dark-layout')) {
    labelColor = '#b4b7bd';
  }

  // Wrap charts with div of height according to their data-height
  if (chartWrapper.length) {
    chartWrapper.each(function() {
      $(this).wrap($('<div style="height:' + this.getAttribute('data-height') + 'px"></div>'));
    });
  }

  // Init flatpicker
  if (flatPicker.length) {
    var date = new Date();
    flatPicker.each(function() {
      $(this).flatpickr({
        mode: 'range',
        defaultDate: ['2019-05-01', '2019-05-10']
      });
    });
  }


  // Radar Chart
  // --------------------------------------------------------------------
  if (radarChartEx.length) {
    var canvas = document.getElementById('canvas');

    // For radar gradient color
    var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
    gradientBlue.addColorStop(0, 'rgba(155,136,250, 0.9)');
    gradientBlue.addColorStop(1, 'rgba(155,136,250, 0.8)');

    var gradientRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
    gradientRed.addColorStop(0, 'rgba(255,161,161, 0.9)');
    gradientRed.addColorStop(1, 'rgba(255,161,161, 0.8)');

    var radarExample = new Chart(radarChartEx, {
      type: 'radar',
      plugins: [
        // to add spacing between legends and chart
        {
          beforeInit: function(chart) {
            chart.legend.afterFit = function() {
              this.height += 20;
            };
          }
        }
      ],
      data: {
        labels: ['STA', 'STR', 'AGI', 'VIT', 'CHA', 'INT'],
        datasets: [{
            label: 'Donté Panlin',
            data: [25, 59, 90, 81, 60, 82],
            fill: true,
            backgroundColor: gradientRed,
            borderColor: 'transparent',
            pointBackgroundColor: 'transparent',
            pointBorderColor: 'transparent'
          },
          {
            label: 'Mireska Sunbreeze',
            data: [40, 100, 40, 90, 40, 90],
            fill: true,
            backgroundColor: gradientBlue,
            borderColor: 'transparent',
            pointBackgroundColor: 'transparent',
            pointBorderColor: 'transparent'
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
          position: 'top',
          labels: {
            padding: 25,
            fontColor: labelColor
          }
        },
        layout: {
          padding: {
            top: -20
          }
        },
        tooltips: {
          enabled: false,
          custom: function(tooltip) {
            var tooltipEl = document.getElementById('tooltip');
            if (tooltip.body) {
              tooltipEl.style.display = 'block';
              if (tooltip.body[0].lines && tooltip.body[0].lines[0]) {
                tooltipEl.innerHTML = tooltip.body[0].lines[0];
              }
            } else {
              setTimeout(function() {
                tooltipEl.style.display = 'none';
              }, 500);
            }
          }
        },
        gridLines: {
          display: false
        },
        scale: {
          ticks: {
            maxTicksLimit: 1,
            display: false,
            fontColor: labelColor
          },
          gridLines: {
            color: grid_line_color
          },
          angleLines: {
            color: grid_line_color
          }
        }
      }
    });
  }

  // Polar Area Chart
  // --------------------------------------------------------------------
  if (polarAreaChartEx.length) {
    var polarExample = new Chart(polarAreaChartEx, {
      type: 'polarArea',
      options: {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
          position: 'right',
          labels: {
            usePointStyle: true,
            padding: 25,
            boxWidth: 9,
            fontColor: labelColor
          }
        },
        layout: {
          padding: {
            top: -5,
            bottom: -45
          }
        },
        tooltips: {
          // Updated default tooltip UI
          shadowOffsetX: 1,
          shadowOffsetY: 1,
          shadowBlur: 8,
          shadowColor: tooltipShadow,
          backgroundColor: window.colors.solid.white,
          titleFontColor: window.colors.solid.black,
          bodyFontColor: window.colors.solid.black
        },
        scale: {
          scaleShowLine: true,
          scaleLineWidth: 1,
          ticks: {
            display: false,
            fontColor: labelColor
          },
          reverse: false,
          gridLines: {
            display: false
          }
        },
        animation: {
          animateRotate: false
        }
      },
      data: {
        labels: ['Africa', 'Asia', 'Europe', 'America', 'Antarctica', 'Australia'],
        datasets: [{
          label: 'Population (millions)',
          backgroundColor: [
            primaryColorShade,
            warningColorShade,
            window.colors.solid.primary,
            infoColorShade,
            greyColor,
            successColorShade
          ],
          data: [19, 17.5, 15, 13.5, 11, 9],
          borderWidth: 0
        }]
      }
    });
  }

});
</script>

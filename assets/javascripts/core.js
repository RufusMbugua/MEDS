/**
 * [runGraph description]
 * @param  {[type]} container             [description]
 * @param  {[type]} chart_title           [description]
 * @param  {[type]} chart_stacking        [description]
 * @param  {[type]} chart_type            [description]
 * @param  {[type]} chart_categories      [description]
 * @param  {[type]} chart_series          [description]
 * @param  {[type]} chart_drilldown       [description]
 * @param  {[type]} chart_length          [description]
 * @param  {[type]} chart_width           [description]
 * @param  {[type]} chart_margin          [description]
 * @param  {[type]} color_scheme          [description]
 * @param  {[type]} chart_label_rotation  [description]
 * @param  {[type]} chart_legend_floating [description]
 * @return {[type]}                       [description]
 */
function runGraph(container, chart_title, chart_stacking, chart_type,
    chart_categories, chart_series, chart_drilldown, chart_length, chart_width,
    chart_margin, color_scheme, chart_label_rotation, chart_legend_floating) {
    file_name = container.replace('#', '');
    file_name = file_name.replace('_', ' ');
    $('#' + container).highcharts({
      colors: color_scheme,
      chart: {
        zoomType: 'x',
        height: chart_length,
        width: chart_width,
        type: chart_type,
        marginBottom: chart_margin
      },
      title: {
        text: ''
      },
      xAxis: {
        categories: chart_categories,
        labels: {
          rotation: chart_label_rotation
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: chart_title,
          align: 'high'
        },
        labels: {
          overflow: 'justify',
          style: {
            'word-break': 'break-all'
          }
        }
      },
      tooltip: {
        formatter: function() {
          if (typeof this.series.options.stack != 'undefined') {
            return this.series.name + '<i>(' + this.series.options.stack +
              ')</i><br/>' + this.point.category + ' : <b>' + this.y +
              '</b>';
          } else if (typeof this.point.category == 'undefined') {
            return this.point.name + ' : ' + this.y
          } else {
            return this.point.category + '<br/>' + this.series.name +
              ' : <b>' + this.y + '</b>';

          }
        },
        followPointer: true

      },

      plotOptions: {
        series: {
          stacking: chart_stacking
        },
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            backgroundColor: '#428bca',
            borderRadius: '3px',
            padding: 4,
            enabled: true,
            distance: -40,
            formatter: function() {

              return Math.round(this.percentage) + '%';


            },
            color: 'white',
            style: {
              fontWeight: 'bold',
              opacity: 0.7
            }
          },
          showInLegend: true,
          tooltip: {
            formatter: function() {

              return this.series.name + ' : <b>' + this.y + '</b>';

            }

          },
          followPointer: true
        },
        line: {
          dataLabels: {
            enabled: true,
            formatter: function() {
              if (this.y != 0 && chart_stacking == 'percent') {
                return Math.round(this.percentage) + '%';
              } else {
                return this.value;
              }
            },
            color: 'black'
          },
          events: {
            legendItemClick: function() {
              return false; // <== returning false will cancel the default action
            }
          },
          tooltip: {
            formatter: function() {
              return this.series.name + ' : <b>' + this.y + '</b>';

            }

          }
        },
        bar: {
          dataLabels: {
            enabled: true,
            formatter: function() {
              if (this.y != 0 && chart_stacking == 'percent') {
                return Math.round(this.percentage) + '%';
              } else {
                return this.value;
              }
            },
            color: 'white'
          },
          events: {
            legendItemClick: function() {
              return false; // <== returning false will cancel the default action
            }
          }
        },
        column: {
          dataLabels: {
            enabled: false,
            formatter: function() {
              if (this.y != 0 && chart_stacking == 'percent') {
                return Math.round(this.percentage) + '%';
              } else {
                return this.value;
              }
            },
            color: 'white'
          }
        }
      },
      legend: {
        enabled: false,
        layout: 'horizontal',
        align: 'left',
        floating: true,
        borderWidth: 1,
        backgroundColor: '#FFFFFF',
        shadow: true
      },
      credits: {
        enabled: false
      },
      series: chart_series,
      drilldown: {
        series: chart_drilldown
      }
    });

  }
  /**
   * [runSimpleGraph description]
   * @param  {[type]} container             [description]
   * @param  {[type]} chart_title           [description]
   * @param  {[type]} chart_stacking        [description]
   * @param  {[type]} chart_type            [description]
   * @param  {[type]} chart_categories      [description]
   * @param  {[type]} chart_series          [description]
   * @param  {[type]} chart_drilldown       [description]
   * @param  {[type]} chart_length          [description]
   * @param  {[type]} chart_width           [description]
   * @param  {[type]} chart_margin          [description]
   * @param  {[type]} color_scheme          [description]
   * @param  {[type]} chart_label_rotation  [description]
   * @param  {[type]} chart_legend_floating [description]
   * @return {[type]}                       [description]
   */
function runSimpleGraph(container, chart_title, chart_stacking, chart_type,
    chart_categories, chart_series, chart_drilldown, chart_length, chart_width,
    chart_margin, color_scheme, chart_label_rotation, chart_legend_floating) {
    file_name = container.replace('#', '');
    file_name = file_name.replace('_', ' ');
    $('#' + container).highcharts({
      colors: color_scheme,
      chart: {
        zoomType: 'x',
        height: 60,
        width: 200,
        type: chart_type,
        marginBottom: chart_margin,
        backgroundColor: null
      },
      title: {
        text: ''
      },
      xAxis: {
        lineWidth: 0,
        minorGridLineWidth: 0,
        lineColor: 'transparent',
        labels: {
          enabled: false
        },
        minorTickLength: 0,
        tickLength: 0,
        categories: chart_categories,

      },
      exporting: {
        enabled: false
      },
      yAxis: {
        title: {
          text: null
        },
        gridLineWidth: 0,
        minorGridLineWidth: 0,
        lineColor: 'transparent',
        labels: {
          enabled: false
        },
        minorTickLength: 0
      },


      plotOptions: {
        series: {
          stacking: chart_stacking
        },
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: false
          },
          showInLegend: true,
          tooltip: {
            formatter: function() {

              return this.series.name + ' : <b>' + this.y + '</b>';

            }

          },
          followPointer: true
        },
        bar: {
          tooltip: {
            followPointer: true
          },
          dataLabels: {
            enabled: true,
            formatter: function() {
              if (this.y != 0 && chart_stacking == 'percent') {
                return Math.round(this.percentage) + '%';
              } else {
                return this.value;
              }
            },
            color: 'white'
          },
          events: {
            legendItemClick: function() {
              return false; // <== returning false will cancel the default action
            }
          }
        },
      },
      legend: {
        enabled: false
      },
      credits: {
        enabled: false
      },
      series: chart_series,
      drilldown: {
        series: chart_drilldown
      }
    });

  }
  /**
   * [loadGraph description]
   * @param  {[type]} base_url      [description]
   * @param  {[type]} function_url  [description]
   * @param  {[type]} graph_section [description]
   * @return {[type]}               [description]
   */
function loadGraph(base_url, function_url, graph_section) {
  var container;
  container = $(graph_section).parent().find('h4');

  load_more(container);

  $.ajax({
    url: base_url + function_url,
    beforeSend: function(xhr) {
      $(graph_section).empty();
      $(graph_section).append('<div class="loader" >Loading...</div>');
    },
    success: function(data) {
      //console.log(data);
      obj = jQuery.parseJSON(data);
      // console.log(obj);
      $(graph_section).empty();
      $(graph_section).append('<div id="' + obj.container +
        '" ></div>');
      runGraph(obj.container, obj.chart_title, obj.chart_stacking,
        obj.chart_type, obj.chart_categories, obj.chart_series, obj
        .chart_drilldown, obj.chart_length, obj.chart_width, obj.chart_margin,
        obj.color_scheme, obj.chart_label_rotation, obj.chart_legend_floating
      );


      // // console.log(obj.filter);
      if (obj.filter) {
        load_filter(container, obj.filter);
        container.find('.filter').show();
      } else {
        container.find('.filter').hide();
      }

    },
    error: function(xhr) {
      $(graph_section).empty();
      $(graph_section).append(
        '<div class="null_message"><i class="fa fa-exclamation-triangle"></i>Process Interrupted</div>'
      );
    }
  });
}

function load_more(container) {
  if (container.find('.more').length == 0) {
    more = '<div class="more">' +
      '<ul><li class="dropdown">' +
      '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i>More</a>' +
      '<ul class="dropdown-menu" role="menu"><li><a href="#"><i class="fa fa-expand show-more"></i>Expand</a></li><li class="divider"></li><li><a href="#"><i class="fa fa-file-pdf-o"></i>PDF</a></li><li><a href="#"><i class="fa fa-file-excel-o"></i>Excel</a></li></ul></li></ul></div>';
    container.prepend(more)
    $('.show-more').click(function() {
      // show_more();
    });
  }
}

function run_filter(filter, that, period) {
  graph_url = that.parent().parent().parent().parent().find('div').attr('id');
  // console.log($(that).parent());
  if ($(that).parent().parent().find('.category_scope').length > 0) {
    var graph_filter = new Array();
    graph_filter = {
      'date': filter,
      'scope': period,
      'choice': $(that).parent().parent().find('.category_scope').val()
    };
    graph_filter = encodeURIComponent(JSON.stringify(graph_filter));
     loadGraph(base_url, 'analytics/' + graph_url + '/' + graph_filter, '#' + graph_url);
  } else {
    loadGraph(base_url, 'analytics/' + graph_url + '/' + filter + '/' + period, '#' + graph_url);
  }
}

function change_scope() {
  $('.filter_scope').unbind('change').bind('change', function() {
    $(this).parent().find('.bs').attr('class', 'bs bs-' + $(this).val()).trigger('re-initialize');
  });
}

function load_filter(container, filter) {
    filterElement = '<div class="filter"><form>';
    if (container.find('.filter').length == 0) {
      $.each(filter, function(k, v) {
        filterElement += '<i class="fa fa-calendar-o"></i>' + k + v;
        if (k == 'Duration') {
          filterElement += '<input type="text" class="bs">';
        }
      });
      filterElement += '</form></div>';
      // console.log(filterElement);
      // '<ul><li>'+'<i class="fa fa-calendar-o"></i>'+data['text']+'<input class="datepicker"></li></ul></div>';
      container.append(filterElement);
      date_filter();
      change_scope();
    }
    // run_filter();
  }
  /**
   * [loadSimpleGraph description]
   * @param  {[type]} base_url      [description]
   * @param  {[type]} function_url  [description]
   * @param  {[type]} graph_section [description]
   * @return {[type]}               [description]
   */
function loadSimpleGraph(base_url, function_url, graph_section) {

  $.ajax({
    url: base_url + function_url,
    beforeSend: function(xhr) {
      $(graph_section).empty();
    },
    success: function(data) {
      obj = jQuery.parseJSON(data);
      // console.log(obj);
      $(graph_section).empty();
      if (obj.chart_series != null && obj.chart_series[0] != null) {
        $(graph_section).append('<div id="' + obj.container +
          '" ></div>');
        runSimpleGraph(obj.container, obj.chart_title, obj.chart_stacking,
          obj.chart_type, obj.chart_categories, obj.chart_series, obj
          .chart_drilldown, obj.chart_length, obj.chart_width, obj.chart_margin,
          obj.color_scheme, obj.chart_label_rotation, obj.chart_legend_floating
        );
      } else {
        $(graph_section).append(
          '<div class="null_message"><i class="fa fa-exclamation-triangle"></i>No Data Found</div>'
        );

      }
    },
    error: function(xhr) {
      $(graph_section).empty();
      $(graph_section).append(
        '<div class="null_message"><i class="fa fa-exclamation-triangle"></i>Process Interrupted</div>'
      );
    }
  });
}

/**
 * [trim description]
 * @param  {[type]} str      [description]
 * @param  {[type]} charlist [description]
 * @return {[type]}          [description]
 */
function trim(str, charlist) {
  //  discuss at: http://phpjs.org/functions/trim/
  // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: mdsjack (http://www.mdsjack.bo.it)
  // improved by: Alexander Ermolaev (http://snippets.dzone.com/user/AlexanderErmolaev)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Steven Levithan (http://blog.stevenlevithan.com)
  // improved by: Jack
  //    input by: Erkekjetter
  //    input by: DxGx
  // bugfixed by: Onno Marsman
  //   example 1: trim('    Kevin van Zonneveld    ');
  //   returns 1: 'Kevin van Zonneveld'
  //   example 2: trim('Hello World', 'Hdle');
  //   returns 2: 'o Wor'
  //   example 3: trim(16, 1);
  //   returns 3: 6

  var whitespace, l = 0,
    i = 0;
  str += '';

  if (!charlist) {
    // default list
    whitespace =
      ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
  } else {
    // preg_quote custom list
    charlist += '';
    whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
  }

  l = str.length;
  for (i = 0; i < l; i++) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(i);
      break;
    }
  }

  l = str.length;
  for (i = l - 1; i >= 0; i--) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(0, i + 1);
      break;
    }
  }

  return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}

function show_more() {
  $('#full-page-1').animate({
    left: '-=100%'
  }, 1000);
  $('#full-page-2').animate({
    left: '100%'
  }, 1000); // $('.graph').css('left','-100%');
}

function date_filter() {
    $('.bs').val('');
    $('.bs-day').datepicker('remove');
    $('.bs-day').datepicker({
      format: 'yyyy-mm-dd',
      minViewMode: 0
    }).on('changeDate', function(e) {
      date = $(this).datepicker('getUTCDate');
      year = date.getFullYear();
      month = date.getMonth() + 1;
      day = date.getDate();
      now = year + '-' + month + '-' + day;
      // console.log(now);
      obj = $(this);
      run_filter(now, obj, 'day');
    });
    $('.bs-month').datepicker('remove');
    $('.bs-month').datepicker({
      format: 'yyyy-mm-dd',
      minViewMode: 1
    }).on('changeDate', function(e) {
      date = $(this).datepicker('getUTCDate');
      year = date.getFullYear();
      month = date.getMonth() + 1;
      day = date.getDate();
      now = year + '-' + month;
      // console.log(now);
      obj = $(this);
      run_filter(now, obj, 'month');
    });
    $('.bs-year').datepicker('remove');
    $('.bs-year').datepicker({
      format: 'yyyy-mm-dd',
      minViewMode: 2
    }).on('changeDate', function(e) {
      date = $(this).datepicker('getUTCDate');
      year = date.getFullYear();
      month = date.getMonth() + 1;
      day = date.getDate();
      now = year;
      // console.log(now);
      obj = $(this);
      // console.log(obj);
      run_filter(now, obj, 'year');
    })
  }
  /**
   * [description]
   * @return {[type]} [description]
   */
$(document).ready(function() {

  $(document).on('re-initialize', function() {
    date_filter();
  })

});
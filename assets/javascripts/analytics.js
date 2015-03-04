function startAnalytics(base_url) {
  var chart, div;
  var date = new Date();
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();
  now = year + '-' + month + '-' + day;
  loadGraph(base_url, 'analytics/failure_rate', '#failure_rate');
  loadGraph(base_url, 'analytics/income_generated/' + now + '/day', '#income_generated');
  loadGraph(base_url, 'analytics/analyst_performance/' + now + '/day', '#analyst_performance');
  loadGraph(base_url, 'analytics/quotation_conversion/' + now + '/day', '#quotation_conversion');
  loadGraph(base_url, 'analytics/turnaround_time', '#turnaround_time');



  // Samples
  var graph_filter = new Array();
  graph_filter = {'date':now,'scope':'year','choice':'Done : No Repeat'};
  // graph_filter.date=now;
  // graph_filter.scope='day';
  // graph_filter.choice='Unassigned';
  // console.log('Here');
  graph_filter = encodeURIComponent(JSON.stringify(graph_filter));
  loadGraph(base_url, 'analytics/samples/' + graph_filter, '#samples');
  graph_filter = '';
}
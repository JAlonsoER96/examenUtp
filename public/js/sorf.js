$(document).ready(inicializar);

function inicializar() {
  $('#yajra').DataTable({
    "language": {
      "url": "/js/DataTablesSpanish.json"
    }
  });
  $('#kami').DataTable({
    "language": {
      "url": "/js/DataTablesSpanish.json"
    }
  });
  $('#chris').DataTable({
    "language": {
      "url": "/js/DataTablesSpanish.json"
    }
  });
}

$(window).load(function() {
  $("#preloaders").fadeOut(3000);
});
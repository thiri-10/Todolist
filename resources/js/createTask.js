$(document).ready(function(){
    var date_input = $('input[name="due_date"]');
    var container = $('form').length>0 ? 
                   $('form').parent() : "body";
    var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
       
        autoclose: true,
    };
    date_input.datepicker(options);
 })
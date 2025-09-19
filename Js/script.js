alert("hi");
flatpickr("#datepicker", {
    dateFormat: "Y-m-d",   
    allowInput: true,      
    defaultDate: null,     
    minDate: "today"       
  });




  const tp = flatpickr("#timepicker", {
    enableTime: true,      
    noCalendar: true,       
    dateFormat: "h:i K",    
    time_24hr: false,       
    defaultDate: null,
    onReady: function(selectedDates, dateStr, instance) {
      instance.input.setAttribute('placeholder', 'Select time');
    }
  });

  document.getElementById("clockIcon").addEventListener("click", function() {
    tp.open();
  });


document.addEventListener('DOMContentLoaded', function() {
    
    const calendarEl = document.getElementById('calendar');
    let calendar;
    const url = '/api/Task';
    fetch(url)
           .then(response => response.json())
           .then(data => {
         
        const events = data.map(event => ({
        id: event.id,
        title: event.task,
        start: event.due_date,
       }));

       calendar = new FullCalendar.Calendar(calendarEl, {
        initialView : 'dayGridMonth',
        events: events,
       });
    
       calendar.render();
       })
         .catch(error => {
         console.error('Fetch error:', error);
        });

  });
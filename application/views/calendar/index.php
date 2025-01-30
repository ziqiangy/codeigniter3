<script type="text/javascript" src="/node_modules/fullcalendar/index.global.min.js"></script>
<script>



      document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');

          var events;

  $.ajax({
    type:"get",
    url:"<?php echo base_url(); ?>index.php/calendar/listeventsapi",
    success:data=>{
      events = data;
      console.log(events);
      var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',


    headerToolbar:{
      start: 'title',
      end: 'timeGridDay,prev,next'
    },
          events: events
        });

        calendar.render();
      
    }
  })
        
      });

    </script>

        <div id='calendar'></div>

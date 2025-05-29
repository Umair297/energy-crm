@extends('home')
@section('content')

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<style>
    #calendar {
        max-width: 900px;
        margin: 40px auto;
    }
</style>

<div id='calendar'></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
            eventColor: '#28a745',
            eventDisplay: 'block'
        });

        calendar.render();
    });
</script>
<!-- Modal -->
<div class="modal fade" id="followupModal" tabindex="-1" aria-labelledby="followupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="followupModalLabel">Follow-up Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Prospect:</strong> <span id="modalProspect"></span></p>
        <p><strong>Note:</strong> <span id="modalNote"></span></p>
        <p><strong>Status:</strong> <span id="modalStatus"></span></p>
        <p><strong>Commission:</strong> $<span id="modalCommission"></span></p>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
            eventColor: '#28a745',
            eventDisplay: 'block',
            eventClick: function(info) {
                // Access extendedProps
                const props = info.event.extendedProps;
                document.getElementById('modalProspect').innerText = props.prospect;
                document.getElementById('modalNote').innerText = props.note;
                document.getElementById('modalStatus').innerText = props.status;
                document.getElementById('modalCommission').innerText = parseFloat(props.commission).toFixed(2);
                
                // Show Bootstrap modal
                var myModal = new bootstrap.Modal(document.getElementById('followupModal'));
                myModal.show();
            }
        });

        calendar.render();
    });
</script>


@endsection

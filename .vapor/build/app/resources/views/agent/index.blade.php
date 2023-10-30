<x-app>
  <x-slot:title>
    Agent 
</x-slot:title>
  <div class="px-4 p-md-5">

{{-- <div class="card col-lg-2 col-sm-12">
      <div class="card-body d-flex">
        <div class="col-md-4">
          <div class="mr-3">
            <a href="/agent/create">
              <i class="fas fa-check-circle fa-4x"></i>
            </a>
          </div>  
        </div>
        <div class="col px-2">
          <h5 class="font-weight-bold" >Total tickets</h5>
          <h6>{{ $tickets->count() }}</h6>
        </div>
      </div>
</div> --}}
      
      <h1>Tickets</h1>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Ticket id</th><!-- Show-->
              <th>Priority</th>
              <th>Categories</th>
              <th>Labels</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
      
              @forelse ($tickets as $ticket)
              <tr>
                <td><a class="text-decoration-none" href="/agent/{{ $ticket->ticket_id }}" style="font-weight: bold">{{ $ticket->ticket_id }}</a></td>
                  <td class="text-{{ $ticket->priority == 'high' ? 'danger' : 'secondary' }}" style="font-weight: bold">{{ $ticket->priority }}</td>
                  <td>{{ $ticket->categories }}</td>
                  <td>{{ $ticket->label}}</td>
                  <td>{{ $ticket->status ? $ticket->status : 'Not updated yet'}}</td>
                  <td><a class="text-decoration-none" href="/agent/{{  $ticket->ticket_id }}/edit">Edit</a></td>

              </tr>   
              @empty
              @endforelse         
          </tbody>
        </table>  
      </div>
   

  </div>
</x-app>
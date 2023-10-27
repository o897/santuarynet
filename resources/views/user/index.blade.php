<x-app>
<x-slot:title>
    User 
</x-slot:title>

<h1>Tickets</h1>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Ticket id</th>
        <th>Priority</th>
        <th>Categories</th>
        <th>Labels</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

        @forelse ($tickets as $ticket)
        <tr>
            <td><a class="text-decoration-none" href="/user/{{ $ticket->ticket_id }}" style="font-weight: bold">{{ $ticket->ticket_id }}</a></td>
            <td class="text-{{ $ticket->priority == 'high' ? 'danger' : 'secondary' }}" style="font-weight: bold">{{ $ticket->priority }}</td>
            <td>{{ $ticket->categories }}</td>
            <td>{{ $ticket->label}}</td>
            <td>{{ $ticket->status ? $ticket->status : 'Not updated yet'}}</td>
        </tr>   
        @empty
        @endforelse

        
      </tbody>
  </table>  
  {{ $tickets->links() }}
</div>

</x-app>




   


  

<x-app>
    <h1>Dashboard</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Ticket id</th><!-- Show-->
            <th>Priority</th>
            <th>Created at</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td><a href="/agent/{{ $ticket->ticket_id }}">{{ $ticket->ticket_id }}</a></td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td><a href="/agent/{{  $ticket->ticket_id }}/edit">Edit</a></td>
              </tr>   
            @endforeach
        
        </tbody>
      </table>
</x-app>
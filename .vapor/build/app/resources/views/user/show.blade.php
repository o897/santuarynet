<x-app>
    <div class="card text-center">
        <div class="card-header">
          Ticket Information
        </div>
        <div class="card-body">
          <h5 class="card-title">Ticket id: {{ $ticket->ticket_id }}</h5>
          <p class="card-text">
            Name: {{ $ticket->title }} {{ $ticket->name }}<br>
            Priority: {{ $ticket->priority }}<br>
            Status: {{ $ticket->status ? $ticket->status : 'Not set' }}<br>
            Label: {{ $ticket->label }}<br>
            Categories: {{ $ticket->categories }}<br>
            Updated at: {{ $ticket->updated_at }}<br>
           <span>{{$ticket->content}}</span> <br>

          </p>
           
          <a href="/replies/{{ $ticket->ticket_id }}" class="btn btn-primary">View Comments</a>
        </div>
        <div class="card-footer text-muted">
            Created at: {{ $ticket->created_at }}<br>
        </div>
      </div>
      
</x-app>
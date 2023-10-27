<x-layout>
  <div class="mb-5 p-5">
    <h1>Table summary</h1>
    {{-- <p>Priority High</p>
    <p>No of tickets</p>
    <p>Unassigned tickets</p>
    <p>Open</p> --}}
    <div class="card">

    </div>
  </div>
    <div class="p-5" style="bottom: 0">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Ticket id</th>
              <th>Current Agent</th>
              <th>Priority</th>
              <th>Categories</th>
              <th>Labels</th>
              <th>Created at</th>
              <th>Agent</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
            @forelse ($tickets as $ticket)
            <form action="/admin/{{ $ticket->ticket_id }}" method="POST">                         
              @csrf
              @method('PUT')
                <tr>
                  <td >{{ $ticket->ticket_id }}</td>
                  @isset($ticket->agent->name)
                  <td>{{ $ticket->agent->name}}</td> 
                  @else
                  <td>No agent assigned</td>
                  @endisset
                  <td>{{ $ticket->priority}}</td>
                  <td>{{ $ticket->categories }}</td>
                  <td>{{ $ticket->label }}</td>
                  <td>{{ $ticket->created_at }}</td>
                  <td>
                    <select class="form-select form-select-sm" name="agent">
                      @foreach ($agents as $agent)
                      <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                      @endforeach
                    </select>                            
                  </td>
                  <td><a href="/replies/{{ $ticket->ticket_id }}" class="btn btn-link">Comments</a></td>
                  
                  <td><button type="submit" class="btn btn-link" style="text-decoration: none">Assign</button></td>
                  {{-- They can edit tickets and add comments. --}}
                </tr>
            </form>
            @empty
                <tr>
                  <td><p class="text-center">No tickets.</p></td>
                </tr>
            @endforelse    
            </tbody>
        </table> 
        {{-- Use cache  --}}
        {{ $tickets->links() }}
      </div>
        
      </div>
</x-layout>
<x-app>
  
    <h3>Ticket id: {{ $ticket->ticket_id }}</h3>
    <div class="">
      <h6>{{ $ticket->content }}</h6>
    </div>
    <form action="/agent/{{ $ticket->ticket_id }}" method="POST">
      @csrf
      @method('PUT')
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Status:</label>
          <select name="status" class="form-select">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
          </select>
        </div>
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Reply :</label>
          <textarea class="form-control" rows="5" name="content"></textarea>    
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      
</x-app>
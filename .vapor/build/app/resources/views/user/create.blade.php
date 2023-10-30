<x-app>

  <div class="container-fluid">
    <form action="/user" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Ticket Title</label>
        <input type="text" class="form-control" placeholder="e.g. Network problem" name="title" required>
      </div>
  
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">Message:</label>
        <textarea class="form-control" rows="5" name="content" required></textarea>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill in the description.</div>
  
      </div>
  
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">Labels</label><br>
        <div class="form-check-inline">
          @forelse ($labels as $label)
          <input type="checkbox" class="form-check-input" value="{{ $label->label }}" name="label[]" >
          <label class="form-check-inline" for="check1">{{ $label->label }}</label>
          @empty
          @endforelse
        </div>
    
      </div>  
    
      <div class="mb-3 mt-3">
        <label class="form-label">Categories</label><br>
          @forelse ($categories as $category)
          <div class="form-check-inline">
            <input type="checkbox" class="form-check-input" value="{{ $category->category }}"  name="categories[]">
            <label class="form-check-inline" for="check1">{{ $category->category }}</label>          
          </div> 
          @empty
          @endforelse   
      </div>
    
      <div class="mb-3">
        <label for="description" class="form-label">Priority:</label>
        <select class="form-select" name="priority" required>
          <option value="low">Low</option>
          <option value="medium">Medium</option>
          <option value="high">High</option>
        </select>
        <div class="invalid-feedback">Please select your ticket's priority.</div>
  
      </div>
  
      <div class="mb-3">
        <input type="file" name="file" class="form-control">
      </div>
  
      <button type="submit" class="btn bg-success">Submit</button>
    </form>
  </div>
  
</x-app>



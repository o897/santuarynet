<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-2bH4GqU/Z9vlCOjzg+aRwnFZDEzIgaTyJaLmzb6fj
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">{{ $ticket->name }}</a>
        </div>
      </nav>
   
          <div class="mb-3 mt-3">
            <label for="title" class="form-label">Ticket Title</label>
            <input type="text" class="form-control" placeholder="e.g. Network problem" @disabled(true) name="title" value="{{ $ticket->title }}">
          </div>
      
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Message:</label>
            <textarea class="form-control" rows="5" name="content" @disabled(true)>{{ $ticket->content }}</textarea>  
          </div>
      
          <div class="mb-3 mt-3">
            <label for="bug" class="form-label">Labels</label><br>
            <div class="form-check-inline">
              <input type="checkbox" id="" class="form-check-input" value="bug" name="label[]"
              @if (in_array('bug', explode(',', $ticket->label))) 
              checked 
              @disabled(true)
              @endif
              >
              <label class="form-check-inline" for="check1">bug</label>
          
              <input type="checkbox" class="form-check-input"  value="question" name="label[]" 
              @if (in_array('question', explode(',', $ticket->label))) 
              @disabled(true)
              checked 
              @endif
              >
              <label class="form-check-inline" for="check2">question</label>
           
              <input type="checkbox" class="form-check-input" value="enhancement" name="label[]"
              @if (in_array('enhancement', explode(',', $ticket->label))) 
              @disabled(true)
              checked 
              @endif
              >
              <label class="form-check-label">enhancement</label>
            </div>
          </div>

          <div class="mb-3 mt-3">
            <label for="bug" class="form-label">Categories</label><br>
            <div class="form-check-inline">
              
              <input type="checkbox" id="" class="form-check-input" value="bug" name="label[]"
              @if (in_array('Uncategorized', explode(',', $ticket->categories))) 
              checked 
              @disabled(true)
              @endif
              >
              <label class="form-check-inline" for="check1">Uncategorized</label>
          
              <input type="checkbox" class="form-check-input"  value="question" name="label[]" 
              @if (in_array('Billing/Payments', explode(',', $ticket->categories))) 
              @disabled(true)
              checked 
              @endif
              >
              <label class="form-check-inline" for="check2">Billing/Payments</label>
           
              <input type="checkbox" class="form-check-input" value="enhancement" name="label[]"
              @if (in_array('Technical question', explode(',', $ticket->categories))) 
              @disabled(true)
              checked 
              @endif
              >
              <label class="form-check-label">Technical question</label>
            </div>
          </div>
    
       
        
          <div class="mb-3">
            <label for="description" class="form-label">Priority:</label>
            <select class="form-select" name="priority" @disabled(true)>
              <option value="{{ $ticket->priority}}" selected>{{ $ticket->priority}}</option>
            </select>      
          </div>
      
          @if ($ticket->file != null)
          <a href="/files/example.pdf" class="btn btn-primary">
            <i class="fa-sharp fa-solid fa-files"></i>
             Download Files
          </a> 
          @endif
              
    </div>
</body>
</html>

  
  
  
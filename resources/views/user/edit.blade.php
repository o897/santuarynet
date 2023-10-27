<x-app>

    <h1>Profile</h1>

    <form action="/user/{{ $user->id }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Email:</label>
        <input type="email" class="form-control" placeholder="{{ $user->email }}" name="email">
      </div>
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Location:</label>
        <input type="email" class="form-control" placeholder="{{ $user->location }}" name="location">
      </div>
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Current password:</label>
        <input type="email" class="form-control" placeholder="" name="password">
      </div>
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">New password:</label>
        <input type="email" class="form-control" placeholder="Mr" name="email">
      </div>
  
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Confirm password:</label>
        <input type="email" class="form-control" placeholder="Mr" name="password">
      </div>
  
      <button type="submit" class="btn btn-primary">Submit</button> 
    </form>
  </x-app>
  
  
  
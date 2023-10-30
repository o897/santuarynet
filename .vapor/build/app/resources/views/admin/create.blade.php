<x-layout>

    <div class="container">
      <div class="register-form mt-5">
        <h3>Register</h3>
        <form class="forms-sample" action="/admin" method="POST">
            @csrf
            <div class="mb-3 mt-3">
              <label for="title" class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="fullname" name="name" required>
            </div>
  
            <div class="mb-3 mt-3">
              <label for="title" class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="admin@mail.com" name="email" required>
            </div>
      
            <div class="mb-3 mt-3">
              <label for="exampleInputPassword4">Password</label>
              {{-- Try to integrate google password suggest or find how it works --}}
              <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
            </div>
  
            <div class="mb-3 mt-3">
              <label for="exampleSelectGender">Assign role</label>
              <select name="role" class="form-control" id="exampleSelectGender">
                <option value="user">Regular user</option>
                <option value="agent">Agent</option>
                <option value="admin">Admin</option>
              </select>
            </div>
          <button type="submit" class="btn bg-success">Submit</button>
        </form>
      </div>
    
    </div>
    
  </x-layout>
  
  
  
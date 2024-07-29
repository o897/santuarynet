<x-layout>

    <div class="container">
        <div class="table-responsive pt-5">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Username</th> 
                  <th class="text-center">Type</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody> 
            
                  @forelse ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->getRoleNames()->first()}}</td>
                    <td>
        
                      <form action="/admin/user/{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                       <button type="submit" class="btn btn-danger"><i class="fa fa-trash" href="#" aria-hidden="true"></i></button> 
                      </form>
                    </td>
                  </tr>  
                  @empty
                      <td>No users</td>
                  @endforelse
                                      
                </tbody>
            </table>
            {{ $users->links() }}
            
             
          </div>
    </div>

    {{-- Add a new user, delete user, update user role --}}
</x-layout>
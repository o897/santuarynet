<x-layout>
    
  {{-- Update Labels CRUD--}}
  <div class="container pt-5">
    <div class="">
      <h4>Create a new label</h4>
      <form action="/admin/store/label" method="post">
        @csrf
      <input type="text" class="form-control mb-2" name="new_label" placeholder="New Label name">
      <button class="btn btn-success mb-5" >Create</button>
      </form>
    </div>

      <div class="table-responsive">
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Label</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                  <form id="update-form" action="/label/update" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" id="id" name="id" hidden>
                    <input type="text" id="label" name="label" class="form-control mb-2" placeholder="">
                    <button class="btn btn-primary" id="update-btn">Update</button>
                  </form>
                  </div>
              </div>           
            </div>
          </div>
        </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Label name</th>      
                <th></th>
                <th></th>       
              </tr>
            </thead>
            <tbody>             
                @forelse ($labels as $label)
                <tr>
                  <td>{{ $label->label}}</td>             
                  <td><button class="btn btn-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal" data-name="{{ $label->label }}" data-id="{{ $label->id }}">Update</button></td>
                  <form action="label/{{ $label->id}}" method="post">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-link text-decoration-none">Delete</button></td>
                  </form>  
                </tr>  
                @empty
                    <tr></tr>
                @endforelse                    
              </tbody>
          </table> 
        </div>
  </div>


</x-layout>
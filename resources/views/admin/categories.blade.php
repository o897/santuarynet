<x-layout>
    <div class="container pt-5">
      <div class="">
        <h4>Create a new category</h4>
        <form action="/admin/store/category" method="post">
          @csrf
          <input type="text" class="form-control mb-2" name="new_category" placeholder="New category name">
          <button class="btn btn-success mb-5" >Create</button>
        </form>         
      </div>

      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update category</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                <form id="update-form" action="/category/update" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="text" id="id" name="id" hidden>
                  <input type="text" id="category" name="category" class="form-control mb-2" placeholder="">
                  <button class="btn btn-primary" id="update-btn">Update</button>
                </form>
                </div>
            </div>           
          </div>
        </div>
      </div>

        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Category name</th> 
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>       
                  @forelse ($categories as $category)
                  <tr>
                    <td id={{ $category->id }}>{{ $category->category}}</td>  
                    <td>
                      <button class="btn text-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-name="{{ $category->category }}" data-id="{{ $category->id }}">Update</button>        
                    </td>                 
                    <form action="category/{{ $category->id}}" method="post">
                      @csrf
                      @method('delete')
                      <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash" href="#" aria-hidden="true"></i></button></td>
                    </form>                   
                  </tr>  
                  @empty
                      <tr>
                        No data
                      </tr>
                  @endforelse                    
                </tbody>
            </table>
            
          </div>
    </div>
</x-layout>
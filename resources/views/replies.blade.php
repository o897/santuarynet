<x-app>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
      
              @forelse ($comment as $comment)
              <div class="card mb-4">
                <div class="card-body">
                  <p>{{ $comment->content }}</p>
      
                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img
                      {{-- Use a local user icon image --}}
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                        alt="avatar"
                        width="25"
                        height="25"
                      />
                      <p class="small mb-0 ms-2">{{ $comment->name }}</p>
                    </div>
                  </div>
                </div>
              </div> 
                <div class="form-outline mb-4">
                    <form action="/reply/{{ $comment->ticket_id }}" method="post">
                    @csrf

                    <input
                      type="text"
                      id="addANote"
                      class="form-control"
                      name="content"
                      placeholder="Type comment..."
                    />
                    <button type="submit" class="btn btn-link text-decoration-none">+ Add a note</button>
                </form>
                </div>

                @forelse ($replies as $reply)
                <div class="card mb-4">
                    <div class="card-body">
                      <p>{{ $reply->content }}</p>
          
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                            alt="avatar"
                            width="25"
                            height="25"
                          />
                          {{-- Who made the reply its the authorized user --}}
                          <p class="small mb-0 ms-2">{{ Auth::user()->name }}</p> 
                        </div>
                        <div class="d-flex flex-row align-items-center">
                        @if ($reply->user_id == Auth::id())
                        
                        <form action="/reply/{{ $reply->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link">
                                <i
                                class="fas fa-trash-alt mx-2 fa-xs text-black"
                                style="margin-top: -0.16rem;">
                                </i>
                            </button>
                        </form>
                        
                        @endif                         
                        </div>
                      </div>
                    </div>
                  </div> 
                @empty
                    
                @endforelse
               
              @empty
                  
              @endforelse
              
      
           
            </div>
          </div>
        </div>
      </div>
    
</x-app>


        


<x-app>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
              
              @forelse ($comments as $comment)
              <div class="card mb-4">
                <div class="card-body">
                  <p>{{ $comment->content }}</p>
      
                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                        alt="avatar"
                        width="25"
                        height="25"
                      />
                      <p class="small mb-0 ms-2">{{ $comment->name }}</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <a href="/replies/{{ $comment->ticket_id }}">
                            <i class="fas fa-reply mx-2 fa-xs text-black" style="margin-top: -0.16rem;" ></i>
                        </a> 
                      <p class="small text-muted mb-0">{{ \App\Models\Reply::where('post_id',$comment->ticket_id)->count() }}</p> {{-- number of replies --}}
                    </div>
                  </div>
                </div>
              </div>  
              @empty
                  
              @endforelse  
            </div>
          </div>
        </div>
      </div>
    
</x-app>


        


<x-layout>
     {{-- pdf records are downloaded every 2 minutesfor demonstration purposes --}}

    <div class="container">
        <div class="row mt-5 p-5">
            @forelse ($logs as $log)
            <div class="col-lg-4 col-sm-12 text-center mb-3">
                <i class="fa fa-file-text fa-3x" aria-hidden="true"></i> 
                <p><a style="text-decoration:none" href="/logs/{{basename($log)}}">{{ basename($log) }}</a></p>   
            </div>
            @empty
            @endforelse  
        </div>     
    </div>
   
</x-layout>
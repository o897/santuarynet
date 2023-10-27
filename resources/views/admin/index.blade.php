<x-layout>

  <div class="container px-3 pt-4">
    {{-- <h1 class="fs-5">Dashboard</h1> --}}
        
    <p class="text-center">All the core requirements done</p>
      <div>
        {{-- Manage Labels, Categories, Priorities and Users, in CRUD way -- see example from that site --}}
      </div>
     
    {{-- Use graph to demonstrate some stats --}}

    <div>
      <canvas id="myChart"></canvas>
    </div>

    
    <script>
        var labels = {{ Js::from($labels) }};
        var count = {{ Js::from($count) }};

        console.log(count);
        console.log(labels);

        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: '# of tickets',
              data: count,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    <div>
      {{-- Idicate the places I have users indicate the current stage and twitter link to their community page --}}
    </div>
  </div>
      
</x-layout>
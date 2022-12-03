<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Weight chart') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Displays your weight overtime') }}
        </p>
    </header>

    <div>
        <canvas id="weightChart"></canvas>
        <input id="weightChartValue" type="hidden" value={{ $weight }}></input>
    </div>

    <script>
        const ctx = document.getElementById('weightChart')
        let weight = JSON.parse(document.getElementById('weightChartValue').value)
        let labels = [];
        let data = [];
        console.log(weight)
        console.log(typeof(weight))
        weight.forEach(element => {
          let date = element.date.split('T')
          labels.push(date[0])
          data.push(element.weight)
        });

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Weight in KG',
              fill: true,
              data: data,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                suggestedMin: (data[0] - 20)
              }
            }
          }
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</section>
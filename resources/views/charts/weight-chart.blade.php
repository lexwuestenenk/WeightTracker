<section class="w-full">
    <header>
        <h2 class="text-gray-900 dark:text-white">
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
        const weightChart = document.getElementById('weightChart')
        let weight_chart_data = JSON.parse(document.getElementById('weightChartValue').value)
        let weight_labels = [];
        let weight = [];
        weight_chart_data.forEach(element => {
          let date = element.date.split('T')
          weight_labels.push(date[0])
          weight.push(element.weight)
        });

        new Chart(weightChart, {
          type: 'line',
          data: {
            labels: weight_labels,
            datasets: [{
              label: 'Weight in KG',
              fill: true,
              data: weight,
              borderWidth: 1,
              tension: 0.3,
              color: 'rgba(240, 83, 64, 0.8)',
              borderColor: 'rgba(240, 83, 64, 0.8)',
              backgroundColor: 'rgba(240, 83, 64, 0.3)',
              responsive: true,
            }]
          },
          options: {
            scales: {
              y: {
                suggestedMin: (weight[0] - 20)
              }
            }
          }
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</section>
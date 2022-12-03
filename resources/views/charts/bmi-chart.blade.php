<section class="w-full">
    <header>
        <h2 class="text-gray-900 dark:text-white">
            {{ __('BMI chart') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Displays your BMI (Body Mass Index) overtime') }}
        </p>
    </header>

    <div>
        <canvas id="bmiChart" class="max-w-fit"></canvas>
        <input id="weightChartValue" type="hidden" value={{ $weight }}></input>
    </div>

    <script>
        const bmiChart = document.getElementById('bmiChart')
        let bmi_chart_data = JSON.parse(document.getElementById('weightChartValue').value)
        let bmi_labels = [];
        let bmi = [];
        bmi_chart_data.forEach(element => {
          let date = element.date.split('T')
          bmi_labels.push(date[0])
          bmi.push(element.bmi)
        });
        new Chart(bmiChart, {
          type: 'line',
          data: {
            labels: bmi_labels,
            datasets: [{
              label: 'BMI',
              fill: true,
              data: bmi,
              borderWidth: 1,
              tension: 0.3,
              color: 'rgba(57, 255, 20, 0.8)',
              borderColor: 'rgba(57, 255, 20, 0.8)',
              backgroundColor: 'rgba(57, 255, 20, 0.3)',
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
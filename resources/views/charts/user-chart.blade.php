<section class="w-full">
    <header>
        <h2 class="text-gray-900 dark:text-white">
            {{ __('User chart') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Displays users per month') }}
        </p>
    </header>

    <div>
        <canvas id="userChart"></canvas>
        <input id="userChartValue" type="hidden" value={{ $users_per_month }}></input>
    </div>

    <script>
        // Get data from input field in HTML code (userChartValue). This is fine, as it's not data that needs to be secure.
        const userChart = document.getElementById('userChart')
        let user_chart_data = JSON.parse(document.getElementById('userChartValue').value)
        let user_chart_data_sorted = []
        let data = Object.values(user_chart_data)

        // Create array with monthnames to turn month id (0-11) into month name
        const monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];

        // Create objects with month number && amount of new users
        data.forEach(item => {
          user_chart_data_sorted.push({'x': new Date(item[0].created_at).getMonth(), 'y': item.length }) 
        })

        // Sort month based on month number 0-11
        user_chart_data_sorted.sort(({x:a}, {x:b}) => a-b);

        let labels = []
        let user_data = []

        user_chart_data_sorted.forEach(item => { labels.push(monthNames[item.x]) })
        user_chart_data_sorted.forEach(item => user_data.push(item.y))

        new Chart(userChart, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Users per month',
              fill: true,
              data: user_data,
              borderWidth: 1,
              tension: 0.3,
              color: 'rgba(57, 255, 20, 0.8)',
              borderColor: 'rgba(57, 255, 20, 0.8)',
              backgroundColor: 'rgba(57, 255, 20, 0.3)',
              responsive: true,
            }]
          },
          options: {
            scale: {
              ticks: {
                precision:0
              }
            },
            scales: {
              y: {
                suggestedMin: (0),
                suggestedMax: (Math.max(...user_data) * 2),
              }
            }
          }
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</section>
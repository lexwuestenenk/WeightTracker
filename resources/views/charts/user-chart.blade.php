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
        const userChart = document.getElementById('userChart')
        let user_chart_data = JSON.parse(document.getElementById('userChartValue').value)
        let user_labels = [];
        let users = [];
        let monthNames = {
          "January": 1,
          "February": 2,
          "March": 3,
          "April": 4,
          "May": 5,
          "June": 6,
          "July": 7,
          "August": 8,
          "September": 9,
          "October": 10,
          "November": 11,
          "December": 12
        };

        let data = Object.values(user_chart_data).sort(function(a, b) {
          return a - b;
        });

        data.forEach(item => {
          console.log(new Date(item[0].created_at).getMonth() + 1)
          user_labels.push(new Date(item[0].created_at).toLocaleString('default', { month: 'short' })) 
          users.push(item.length)
        })

        console.log(user_chart_data)
        console.log(users)
        console.log(user_labels)
        user_labels.sort()

        new Chart(userChart, {
          type: 'line',
          data: {
            labels: user_labels,
            datasets: [{
              label: 'Users this month',
              fill: true,
              data: users,
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
              }
            }
          }
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</section>
const ctx = document.getElementById('tab_hum');

const graph_hum = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
          label: 'Humidité',
          data: [],
          backgroundColor: [
            'rgba(255, 255, 255, 0.7)',
          ],
          borderColor: [
            'rgb(0, 0, 0)',
          ],
          borderWidth: 3
        }]
    },
    options: {
      scales: {
        x: {
            display: false
        },
        y: {
          beginAtZero: false,
          grace: '5%'
        }
      }
    },
});

function maj_hum() {
    fetch('../PHP/valeur.php')
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(val => {
        console.log(val);
        let listHum = [];
        let listDate = [];
        for (let i = 9; i >= 0; i--) {
            listHum.push(val[i].humidite);
            listDate.push(val[i].date_heure);
        }
        graph_hum.data.labels = listDate;
        graph_hum.data.datasets[0].data = listHum;
        graph_hum.update();
    })
}

maj_hum();
setInterval(maj_hum, 60000);
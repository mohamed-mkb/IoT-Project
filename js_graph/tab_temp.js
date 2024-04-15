const ctx = document.getElementById('tab_temp');

const graph_temp = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
          label: 'Temperature',
          data: [],
          backgroundColor: [
            'rgba(0, 0, 0, 0.2)',
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

function maj_temp() {
    fetch('../PHP/valeur.php')
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(val => {
        console.log(val);
        let listTemp = [];
        let listDate = [];
        for (let i = 9; i >= 0; i--) {
            listTemp.push(val[i].temperature);
            listDate.push(val[i].date_heure);
        }
        graph_temp.data.labels = listDate;
        graph_temp.data.datasets[0].data = listTemp;
        graph_temp.update();
    })
}

maj_temp();
setInterval(maj_temp, 60000);
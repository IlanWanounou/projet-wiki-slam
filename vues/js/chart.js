let chartData = {
  getData: function () {
    const data = {
      datasets: [{
        label: 'Nombre de visiteurs',
        backgroundColor: '#3180b5',
        borderColor: '#000000',
        borderWidth: 1,
        fill: {
          target: 'origin',
          above: '#2999d6ad'
        },
        tension: 0.6
      }]
    }
    return data
  },
  getConfig: function () {
    const config = {
      type: 'line',
      data: this.getData(),
      options: {
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            suggestedMin: 0
          }
        }
      }
    }
    return config
  }
}

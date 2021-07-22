var data = {
    datasets: [{
        label: 'Nombre de visiteurs',
        backgroundColor: '#3180b5',
        borderColor: '#000000',
        borderWidth: 1,
        fill: {
            target: 'origin',
            above: '#2999d6ad',
        },
        tension: 0.6
    }]
};
const config = {
    type: 'line',
    data,
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
};


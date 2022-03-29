var base_url = $('#url').val();

function quote() {
    let uf = $('#uf_put').val();
    let quotePercentage = $('#quote_percentage_put').val();

    let validate = validateSimulateQuote(
        uf,
        quotePercentage
    );

    if (validate == '') {
        axios({
            method: 'put',
            url: base_url + '/api/cotacao',
            data: {
                'uf': uf,
                'valor_pedido': quotePercentage
            }
        })
            .then(response => {
                $('#table_quote').show();
                let tableData = '';

                $.each(response.data, function (key, value) {
                    key++;
                    tableData +=
                        '<tr>' +
                        '<td>' + key + '</td>' +
                        '<td>' + value.transportadora_id + '</td>' +
                        '<td>' + value.valor_cotacao + '</td>' +
                        '</tr>';
                });

                $('#top_best').html(tableData);
            })
            .catch(error => {
                let errorMessage = '';

                $.each(error.response.data.errors, function (key, value) {
                    errorMessage += value[0];
                });

                Swal.fire({
                    title: 'Atenção',
                    html: errorMessage,
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then(response => {
                    $('#table_quote').hide();
                });
            })
    } else {
        Swal.fire({
            title: 'Atenção',
            html: validate,
            icon: 'warning',
            confirmButtonText: 'Ok'
        })
    }
}

var base_url = $('#url').val();

$(document).ready(function () {
    axios({
        method: 'get',
        url: base_url + '/api/cotacao'
    })
        .then(response => {
            let tableData = '';

            $.each(response.data.data, function (key, value) {
                tableData +=
                    '<tr>' +
                    '<td>' + value.id + '</td>' +
                    '<td>' + value.uf + '</td>' +
                    '<td>' + value.percentual_cotacao + '</td>' +
                    '<td>' + value.valor_extra + '</td>' +
                    '<td>' + value.transportadora_id + '</td>' +
                    '</tr>';
            });

            $('#table_list_quotes').html(tableData);
        })
        .catch(error => {
            console.log(error)
        })
});

var base_url = $('#url').val();

function saveShipping() {
    let shippingCompany = $('#shipping_company_post').val();
    let uf = $('#uf_post').val();
    let quotePercentage = $('#quote_percentage_post').val();
    let extraValue = $('#extra_value_post').val();

    let validate = validateSaveShippingQuote(
        shippingCompany,
        uf,
        quotePercentage,
        extraValue
    );

    if (validate == '') {
        axios({
            method: 'post',
            url: base_url + '/api/cotacao',
            data: {
                'uf': uf,
                'percentual_cotacao': quotePercentage,
                'valor_extra': extraValue,
                'transportadora_id': shippingCompany
            }
        })
            .then(response => {
                Swal.fire({
                    title: 'Salvo',
                    html: response.data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(response => {
                    location.reload();
                })
            })
            .catch(error => {
                console.log(error)
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

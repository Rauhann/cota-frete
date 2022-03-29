function validateSaveShippingQuote(
    shippingCompany,
    uf,
    quotePercentage,
    extraValue
) {
    let error = '';

    if (shippingCompany == '') {
        error += 'O campo Transportadora é obrigatório<br>';
    } else if (uf == '') {
        error += 'O campo UF é obrigatório<br>';
    } else if (quotePercentage == '') {
        error += 'O campo Percentual Cotação é obrigatório<br>';
    } else if (extraValue == '') {
        error += 'O campo Valor Extra é obrigatório<br>';
    }

    return error;
}

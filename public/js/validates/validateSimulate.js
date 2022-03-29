function validateSimulateQuote(
    uf,
    quotePercentage
) {
    let error = '';

    if (uf == '') {
        error += 'O campo UF é obrigatório<br>';
    } else if (quotePercentage == '') {
        error += 'O campo Percentual Cotação é obrigatório<br>';
    }

    return error;
}

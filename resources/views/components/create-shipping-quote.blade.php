<div class="card">
    <h5 class="card-header"><b>Cadastro cotação de frete</b></h5>
    <div class="card-body">
        <div class="row m-2">
            <select class="form-select" id="shipping_company_post">
                <option selected value="">Transportadora</option>

                @foreach ($shippingCompanies as $shippingCompany)
                    <option value={{ $shippingCompany->id }}>{{ $shippingCompany->nome }}</option>
                @endforeach

            </select>
        </div>

        <div class="row m-2">
            <select class="form-select" id="uf_post">
                <option selected value="">UF</option>

                @foreach ($states as $state)
                    <option value={{ $state }}>{{ $state }}</option>
                @endforeach

            </select>
        </div>

        <div class="row m-2">
            <label class="p-0" for="percent">Percentual cotação (%)</label>
            <input class="form-control form-control-sm" type="number" id="quote_percentage_post">
        </div>

        <div class="row m-2">
            <label class="p-0" for="extra_value">Valor extra (R$)</label>
            <input class="form-control form-control-sm" type="number" id="extra_value_post">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-secondary me-md-2" onclick="saveShipping()" type="button">Salvar</button>
        </div>
    </div>
</div>

@push('js')
    <script src="{{ asset('js/shipping-quote/shippingQuote.js') }}"></script>
    <script src="{{ asset('js/validates/validateShippingQuote.js') }}"></script>
@endpush

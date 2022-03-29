<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">UF</th>
                    <th scope="col">Percentual Frete</th>
                    <th scope="col">Valor Taxa</th>
                    <th scope="col">Transportadora</th>
                  </tr>
            </thead>

            <tbody id="table_list_quotes">
            </tbody>
        </table>
    </div>
</div>

@push('js')
    <script src="{{ asset('js/shipping-quote/listShippingQuote.js') }}"></script>
@endpush

<div class="card">
    <h5 class="card-header"><b>Cotar frete</b></h5>
    <div class="card-body">
        <div class="row m-2">
            <select class="form-select" id="uf_put">
                <option selected value="">UF</option>

                @foreach ($states as $state)
                    <option value={{ $state }}>{{ $state }}</option>
                @endforeach

            </select>
        </div>

        <div class="row m-2">
            <label class="p-0" for="percent">Percentual cotação (%)</label>
            <input class="form-control form-control-sm" type="number" id="quote_percentage_put">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button class="btn btn-secondary me-md-2" onclick="quote()" type="button">Cotar</button>
        </div>

        <div class="row p-2" id="table_quote" style="display: none">
            <div class="col-12">
                <p>Melhores resultados: </p>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Transportadora</th>
                            <th scope="col">Valor cotação</th>
                        </tr>
                    </thead>

                    <tbody id="top_best">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{ asset('js/simulate/simulateQuote.js') }}"></script>
    <script src="{{ asset('js/validates/validateSimulate.js') }}"></script>
@endpush

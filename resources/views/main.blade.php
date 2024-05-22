<div>
    <div class="col-12 col-xl-6">
        <label for="county">Megye:</label>

        <select name="county" id="county">
            <option selected disabled hidden value="">Válasszon</option>
            @foreach($counties as $county)
                <option value="{{ $county->id }}"> {{ $county->name }}</option>
            @endforeach
        </select>
    </div>

</div>

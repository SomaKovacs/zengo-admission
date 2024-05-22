<!DOCTYPE html>

<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>

    <body>
        <div id="app">
            <div>
                <label for="county">Megye:</label>

                <select name="county" id="county">
                    <option selected disabled hidden value="">Válasszon!</option>
                    @foreach($counties as $county)
                        <option value="{{ $county->id }}"> {{ $county->name }}</option>
                    @endforeach
                </select>
            </div>

            <teszt></teszt>
        </div>
    </body>
</html>



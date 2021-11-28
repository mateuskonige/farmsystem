<div class="form-group">
    <label>Nome da Vacina</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name', $vacina->name ?? null) }}"/>
</div>

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>Nome é obrigatório e deve conter pelo menos 5 caracteres</strong>
    </span>
@enderror

<div class="form-group">
    <label>Descrição da Vacina</label>
    <p>
        <input type="text" name="description" class="form-control" value="{{ old('description', $vacina->description ?? null) }}"/>
    </p>
</div>

@error('description')
    <span class="invalid-feedback" role="alert">
        <strong>Descrição é obrigatório e deve conter pelo 10 caracteres!</strong>
    </span>
@enderror

<div class="form-group">
    <label for="animals_id">Classe do animal</label>
    <select name="animals_id" class="form-control">
        @foreach ($animals as $animal)
            <option value="{{ old('animals_id', $vacina->animals_id ?? null) }}">{{ $animal->id }} - {{$animal->class}}</option>
        @endforeach
    </select>
</div>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

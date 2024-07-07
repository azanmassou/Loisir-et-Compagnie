@csrf
{{-- <div class="form-group">
    <label for="TypeSalle">Type de la Salle</label>
    <input type="text" class="form-control @error('TypeSalle') is-invalid @enderror" id="TypeSalle" name="TypeSalle"
        value="{{ old('TypeSalle') ?? $salle->TypeSalle}}" placeholder="Eg : Salle des Fetes">
    <div id="TypeSalle" class="invalid-feedback">
        {{ $errors->first('TypeSalle') }}
    </div>
</div>
<div class="form-group">
    <label for="Capacite">Capacite de la Salle</label>
    <input type="number" class="form-control @error('Capacite') is-invalid @enderror" id="Capacite"
        name="Capacite" value="{{ old('Capacite') ?? $salle->Capacite}}" placeholder="Eg : 890">
    <div id="Capacite" class="invalid-feedback">
        {{ $errors->first('Capacite') }}
    </div>
</div> --}}
{{-- <div class="form-group">
    <label for="Capacite">Email</label>
    <input type="text" class="form-control @error('Capacite') is-invalid @enderror" id="Capacite"
        name="Capacite" value="{{ old('Capacite') ?? $client->Capacite}}" placeholder="Eg : John@gmail.com">
    <div id="Capacite" class="invalid-feedback">
        {{ $errors->first('Capacite') }}
    </div>
</div>
<div class="form-group">
    <label for="Capacite">Email</label>
    <input type="text" class="form-control @error('Capacite') is-invalid @enderror" id="Capacite"
        name="Capacite" value="{{ old('Capacite') ?? $client->Capacite}}" placeholder="Eg : John@gmail.com">
    <div id="Capacite" class="invalid-feedback">
        {{ $errors->first('Capacite') }}
    </div>
</div>
<div class="form-group">
    <label for="email">Status</label>
    <select name="status" id="" class="custom-select @error('status') is-invalid @enderror">
        @foreach($client->getStatusOptions() as $key => $value)
        <option value="{{$key}}" {{ $client->status == $value ? 'selected' : '' }}>{{$value}}</option>
        @endforeach
    </select>
    <div id="status" class="invalid-feedback">
        {{ $errors->first('status') }}
    </div>
</div> --}}
{{-- @dd($representation->salle_id) --}}

<div class="form-group">
    <label for="salle_id">Salle</label>
    <select name="salle_id" id="salle_id" class="custom-select @error('salle_id') is-invalid @enderror">
        @foreach($salles as $salle)
        <option value="{{$salle->id}}" {{$representation->salle_id === $salle->id ? 'selected' : ''}}>{{$salle->TypeSalle}}</option>
        @endforeach
    </select>
    <div id="salle_id" class="invalid-feedback">
        {{ $errors->first('salle_id') }}
    </div>
</div>

<div class="form-group">
    <label for="artiste_id">Artiste</label>
    <select name="artiste_id" id="artiste_id" class="custom-select @error('artiste_id') is-invalid @enderror">
        @foreach($artistes as $artiste)
        <option value="{{$artiste->id}}" {{$representation->artiste_id === $artiste->id ? 'selected' : ''}}>{{$artiste->NomArtiste}}</option>
        @endforeach
    </select>
    <div id="artiste_id" class="invalid-feedback">
        {{ $errors->first('artiste_id') }}
    </div>
    
</div>

<div class="form-group">
    <label for="artiste_id">Artiste</label>
    <select name="artiste_id" id="artiste_id" class="custom-select @error('artiste_id') is-invalid @enderror">
        @foreach($artistes as $artiste)
        <option value="{{$artiste->id}}" {{$representation->artiste_id === $artiste->id ? 'selected' : ''}}>{{$artiste->NomArtiste}}</option>
        @endforeach
    </select>
    <div id="artiste_id" class="invalid-feedback">
        {{ $errors->first('artiste_id') }}
    </div>

</div>
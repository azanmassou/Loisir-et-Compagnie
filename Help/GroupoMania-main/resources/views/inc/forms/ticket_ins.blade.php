@csrf
{{-- <div class="form-group">
    <label for="TypeSalle">Type de la Salle</label>
    <input type="text" class="form-control @error('TypeSalle') is-invalid @enderror" id="TypeSalle" name="TypeSalle"
        value="{{ old('TypeSalle')}}" placeholder="Eg : Salle des Fetes">
    <div id="TypeSalle" class="invalid-feedback">
        {{ $errors->first('TypeSalle') }}
    </div>
</div>
<div class="form-group">
    <label for="Capacite">Capacite de la Salle</label>
    <input type="number" class="form-control @error('Capacite') is-invalid @enderror" id="Capacite"
        name="Capacite" value="{{ old('Capacite')}}" placeholder="Eg : 890">
    <div id="Capacite" class="invalid-feedback">
        {{ $errors->first('Capacite') }}
    </div>
</div> --}}
<div class="form-group">
    <label for="Libelle">Libelle du Ticket</label>
    <input type="text" class="form-control @error('Libelle') is-invalid @enderror" id="Libelle"
        name="Libelle" value="{{ old('Libelle') ?? $ticket->Libelle}}" placeholder="Eg : John@gmail.com">
    <div id="Libelle" class="invalid-feedback">
        {{ $errors->first('Libelle') }}
    </div>
</div>
{{-- <div class="form-group">
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
</div>
<div class="form-group">
    <label for="entreprise_id">Entreprise</label>
    <select name="entreprise_id" id="" class="custom-select @error('entreprise_id') is-invalid @enderror">
        @foreach($entreprises as $entreprise)
        <option value="{{$entreprise->id}}" {{$client->entreprise_id == $entreprise->id ? 'selected' : ''}}>{{$entreprise->name}}</option>
        @endforeach
    </select>
    <div id="entreprise_id" class="invalid-feedback">
        {{ $errors->first('entreprise_id') }}
    </div>
</div> --}}
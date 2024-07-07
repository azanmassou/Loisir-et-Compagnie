@csrf
<div class="form-group">
    <label for="name">Nom</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name') ?? $client->name }}" placeholder="Eg : John">
    <div id="name" class="invalid-feedback">
        {{ $errors->first('name') }}
    </div>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
        name="email" value="{{ old('email') ?? $client->email}}" placeholder="Eg : John@gmail.com">
    <div id="email" class="invalid-feedback">
        {{ $errors->first('email') }}
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
</div>
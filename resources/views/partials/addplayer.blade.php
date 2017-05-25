<div class="row col-md-10 col-md-offset-0">
    <form class="form-inline" method="post" action="{{ url('/players') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="sr-only" for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <label class="sr-only" for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <label class="sr-only" for="companyId">Company</label>
            <select class="form-control" id="companyId" name="companyId" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="sr-only" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
        </div>
        <div class="form-group">
            <label class="sr-only" for="teamid">Team</label>
            <select class="form-control" id="teamId" name="teamId">
                <option value="" disabled selected>Select Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Player</button>
    </form>
</div>
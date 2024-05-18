<nav class="nav shadow-lg mb-3 p-2 bg-body-tertiary border-top rounded mt-3 mx-3 justify-content-between">
    <div class="btn-group" role="group" aria-label="Default button group">
        <button type="button" class="btn btn-outline-primary">All Clients</button>
    </div>
    <span class="flex-grow-1"></span>

    <div class="nav-item btn-group" role="group" aria-label="Default button group">
        <div class="dropdown btn-group">
            <button class="btn btn-outline-primary border-end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Status
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Open']) }}">Open</a></li>
                <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Closed']) }}">Closed</a></li>
                <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Pending']) }}">Pending</a></li>
            </ul>
        </div>
        <button type="button" class="btn btn-outline-primary"><a href="{{ route('caseall', ['param' => 'all']) }}" style="text-decoration:none;">All Cases</a></button>
        <div class="dropdown btn-group">
            <button class="btn btn-outline-primary rounded-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Type
            </button>
            <ul class="dropdown-menu dropdown-menu-end w-100">
                @foreach($caseTypes as $caseType)
                <li><a class="dropdown-item" href="{{ route('type', ['param' => $caseType->id]) }}">{{ $caseType->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <span class="flex-grow-1"></span>
    <div class="input-group col flex-shrink-1">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary rounded-end-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Filter</button>

            <input type="hidden" readonly name="filter" value="">
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" value="first_name">First name</a></li>
                <li><a class="dropdown-item" value="last_name">Last name</a></li>
                <li><a class="dropdown-item" value="phone_number">Phone number</a></li>
                <li><a class="dropdown-item" value="city">City</a></li>
            </ul>
        </div>

        <input type="text" class="form-control col" aria-label="Search" value="Search">
        <button class="btn btn-outline-primary " type="submit">Search</button>
    </div>

</nav>
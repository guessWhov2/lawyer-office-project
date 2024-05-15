<?php


?>

<x-app-layout>
    <div class="container">
        <div class="row my-2 py-2">
            <div class="col-12 d-flex ">
                <a href="{{ route('kurcina') }}" class="btn btn-outline-secondary">Back to panel</a>
                <p class="lead p-0 m-0 d-inline-block mx-auto" style="transform:translateX(-50%);">Searched by <strong>{{ $filter}}</strong></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">{{ $users }}</div>
            </div>
        </div>

        <div class="row my-4">
            <div class="accordion accordion-flush" id="accordionFlushParent">
                @foreach($users as $user)
                <div class="accordion-item">
                    <h2 class="accordion-header border-top">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $user->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $user->id }}">
                            <p class="p-0 m-0">Email: {{ $user->email }}</p>
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $user->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushParent">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <p class="p-0 m-0 d-inline-block">ID: {{ $user->id }}</p>
                                        <p class="lead p-0 m-0 d-inline-block">First name: {{ $user->firstname }}</p>
                                        <p class="lead p-0 m-0 d-inline-block">Last name: {{ $user->lastname }}</p>
                                        <p class="p-0 m-0 d-inline-block">Role: {{ $user->role->name }}</p>
                                        <button type="button" class="btn btn-small btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{$user->id}}">
                                            Edit user
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="p-0 m-0 d-inline-block">Ph num: {{ $user->phone_number }}</p>
                                            <p class="p-0 m-0 d-inline-block">Address: {{ $user->address }}</p>
                                            <p class="p-0 m-0 d-inline-block">City: {{ $user->city }}</p>
                                            <p class="p-0 m-0 d-inline-block">Remember token: {{ $user->remember_token }}</p>
                                            <p class="p-0 m-0 d-inline-block">Date: {{ $user->created_at->format('d-m-Y') }}</p>
                                        </div>
                                        <p class="card-text my-2"><strong>Password: </strong>{{ $user->password }}</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">#</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for editing -->
                    <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModal{{$user->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editUserModal{{$user->id}}Label">Edit user</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <!-- ID -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                            <input name="id" type="text" value="{{ $user->id }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Firstname -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
                                            <input name="firstname" type="text" value="{{ $user->firstname }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Lastname -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
                                            <input name="lastname" type="text" value="{{ $user->lastname }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Email -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                            <input name="email" type="email" value="{{ $user->email }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Phone number -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Phone number</span>
                                            <input name="phone_number" type="text" value="{{ $user->phone_number }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                                            <input name="address" type="text" value="{{ $user->address }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- City -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                                            <input name="city" type="text" value="{{ $user->city }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                        </div>
                                        <!-- Password -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                                            <input name="password" type="text" value="{{ $user->password }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="new-password" required>
                                        </div>
                                        <!-- Role -->
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Role - {{ $user->role->name }}</span>
                                            <input name="role" type="text" value="{{ $user->role->id }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="new-password" required>
                                        </div>
                                        @if($user->role->name == 'Lawyer')
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Specialization</span>
                                            <input name="specialization" value="add model lawyer" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="specialization" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Years of exp</span>
                                            <input name="years_exp" value="add model lawyer" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="years_exp" required>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

</x-app-layout>
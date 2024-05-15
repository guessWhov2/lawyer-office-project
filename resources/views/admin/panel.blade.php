<?php

use App\Models\CaseType;
use App\Models\Role;

$roles = Role::all();
$caseTypes = CaseType::all();
?>
<x-app-layout>
    <div class="row my-2">
        <div class="col-12">
            <h6 class="display-6">Admin panel</h6>
        </div>
    </div>
    <ul class="nav border-bottom border-dark pb-2 mb-5">
        <li class="nav-item me-2">
            <a class="btn btn-primary" href="#addOptions" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="addOptions" data-bs-parent="#optionsParent">User</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-success me-2" href="#displayLegalCase" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="displayLegalCase" data-bs-parent="#optionsParent">Case</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-danger me-2" href="#displayAdmin" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="displayAdmin" data-bs-parent="#optionsParent">Admin</a>
        </li>
        <span class="flex-grow-1"></span>
        <li class="nav-item">
            <form class="input-group" role="search" method="post" action="{{ route('search') }}">
                @csrf
                <select name="searchFilter" class="btn border border-primary col-auto rounded-start">
                    <option value="">Filter</option>
                    <option value="firstname">First name</option>
                    <option value="lastname">Last name</option>
                    <option value="email">Email</option>
                    <option value="phone_number">Phone number</option>
                    <option value="address">Address</option>
                    <option value="city">City</option>
                </select>
                <input class="form-control" type="search" placeholder="Search users" aria-label="Search" name="searchInput">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </li>
        <li class="nav-item">

        </li>

    </ul>



    <!-- user block -->
    <div class="row collapse" id="addOptions">
        <!-- USERS SEARCCH -->
        <div class="col-12 mb-4">
            <p class="m-0 p-0 lead d-block ms-4">User - Display</p>
            <div class="nav-item btn-group" role="group" aria-label="Default button group">
                <div class="dropdown btn-group">
                    <button class="btn btn-outline-primary border-end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Role
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($roles as $role)
                        <li><a class="dropdown-item" href="{{ route('role', ['param' => $role->id]) }}">{{ $role->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn btn-outline-primary"><a href="{{ route('userall', ['param' => 'all']) }}" style="text-decoration:none;">All Users</a></button>

            </div>
        </div>
        <div class="col-12 mb-4" id="">
            <p class="m-0 p-0 lead d-block ms-4">User - Add</p>
            @foreach($roles as $role)
            <div class="btn-group" role="group" aria-label="Form & role group">
                <button type="button" class="btn btn-outline-{{ $role->name == 'Client' ? 'secondary' : 'primary' ;  }}" data-bs-target="#add{{ $role->name }}ByForm" data-bs-toggle="modal" aria-expanded="false" aria-controls="add{{ $role->name }}ByForm" data-bs-parent="#addParent">User form & role-{{ $role->name }}</button>
            </div>
            @endforeach
            <span class="btn btn-outline-primary disabled"></span>
            @foreach($roles as $role)
            @if($role->name != 'Client')
            <div class="btn-group" role="group" aria-label="Role & id group">
                <button type="button" class="btn btn-outline-primary" data-bs-target="#add{{ $role->name }}ById" data-bs-toggle="modal" aria-expanded="false" aria-controls="add{{ $role->name }}ById" data-bs-parent="#addParent">{{ $role->name }}-role by ID</button>
            </div>
            @endif
            @endforeach
        </div>
        <div class="col-12">
            <p class="m-0 p-0 lead d-block ms-4">User - Edit</p>
            <div class="btn-group" role="group" aria-label="Form & role group">
                <button type="button" class="btn btn-outline-primary" data-bs-target="#" data-bs-toggle="modal" aria-expanded="false" aria-controls="#" data-bs-parent="#addParent">Edit by ID</button>
            </div>
            <p class="m-0 p-0 lead d-block ms-4">User - Delete</p>
            <button type="button" class="btn btn-outline-primary" data-bs-target="#" data-bs-toggle="modal" aria-expanded="false" aria-controls="#" data-bs-parent="#addParent">Delete by ID</button>
        </div>

    </div>
    <!-- Legal case buttons  -->
    <!--
    <div class="row text-center collapse" id="displayLegalCase">
        <div class="col-12 mb-4">
            <p class="m-0 p-0 lead d-block ms-4">Case - Display</p>
            <div class="nav-item btn-group" role="group" aria-label="Default button group">
                <div class="dropdown btn-group">
                    <button class="btn btn-outline-success border-end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Open']) }}">Open</a></li>
                        <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Closed']) }}">Closed</a></li>
                        <li><a class="dropdown-item" href="{{ route('status', ['param' => 'Pending']) }}">Pending</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-outline-success"><a href="{{ route('caseall', ['param' => 'all']) }}" style="text-decoration:none;">All Cases</a></button>
                <div class="dropdown btn-group">
                    <button class="btn btn-outline-success rounded-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Type
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end w-100">
                        @foreach($caseTypes as $caseType)
                        <li><a class="dropdown-item" href="{{ route('type', ['param' => $caseType->id]) }}">{{ $caseType->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
-->
    <div class="row collapse text-end" id="displayAdmin">
        <div class="col-12 mb-4">
            <p class="m-0 p-0 lead d-block ms-4">Admin</p>
            <div class="btn-group" role="group" aria-label="Admin buttons group">
                <button type="button" class="btn btn-outline-danger" data-bs-target="#m" data-bs-toggle="modal" aria-expanded="false" aria-controls="" data-bs-parent="#">Add admin - form</button>
                <button type="button" class="btn btn-outline-danger" data-bs-target="#m" data-bs-toggle="modal" aria-expanded="false" aria-controls="" data-bs-parent="#">Make user admin - ID</button>

            </div>
        </div>
        <div class="col-12 mb-4">
            <button type="button" class="btn btn-outline-danger" data-bs-target="#m" data-bs-toggle="modal" aria-expanded="false" aria-controls="" data-bs-parent="#">Display all</button>
            <button type="button" class="btn btn-outline-danger" data-bs-target="#m" data-bs-toggle="modal" aria-expanded="false" aria-controls="" data-bs-parent="#">Edit admin user - ID</button>
        </div>
        <div class="col-12 mb-4">
            <button type="button" class="btn btn-outline-danger" data-bs-target="#m" data-bs-toggle="modal" aria-expanded="false" aria-controls="" data-bs-parent="#">Delete admin user - ID</button>
        </div>
    </div>

    <?php // Modals 
    ?>
    @foreach($roles as $role) <?php // --------------------------------- implement store, then update role on that user 
                                ?>

    <div class="modal" tabindex="-1" id="add{{ $role->name }}ByForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User form & role-{{ $role->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('register') }}" class="row border-top border-bottom py-2 needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        @include('components.register-form')
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Role-{{ $role->name }}</span>
                            <input name="role_id" value="{{ $role->id }}" type="hidden" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="role_id" required>
                        </div>
                        @if($role->name == 'Lawyer')
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Specialization</span>
                            <input name="specialization" value="" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="specialization" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Years of exp</span>
                            <input name="years_exp" value="" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="years_exp" required>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary" type="submit">Register user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($role->name !== 'Client')

    <div class="modal fade" id="add{{ $role->name }}ById" tabindex="-1" aria-labelledby="add{{ $role->name }}ByIdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add{{ $role->name }}ByIdLabel">{{ $role->name }}-role by ID</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="User id">
                        <div class="input-group mb-3">
                            <span class="input-group-text">{{ $role->name }}</span>
                            <input type="hidden" class="form-control" placeholder="Role id" readonly name="role_id" value="{{  $role->id }}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary">Add {{ $role->name }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="modal fade d-none" id="" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Lawyer-role by ID</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="User id">
                    <input type="text" class="form-control" placeholder="Lawyer id">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary">Add Lawyer</button>
                </div>
            </div>
        </div>
    </div>

    <?php // Edit - odvoji komponentu user form pa je po potrebi ukljucuj  
    ?>
    <div class="row">
        <div class="col-12">

        </div>
    </div>

    <?php // Delete  
    ?>
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <?php // Search  
    ?>


</x-app-layout>
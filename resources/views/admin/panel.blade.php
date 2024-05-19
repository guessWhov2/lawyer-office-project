<?php

use App\Models\CaseType;
use App\Models\Role;

$roles = Role::all();
$caseTypes = CaseType::all();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-black-op {
            background-color: rgb(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="container mt-5">
    
    <div class="row m-0 my-4 justify-content-between align-items-center border-bottom">
        <div class="col-auto">
            <h6 class="display-6">Admin panel</h6>
        </div>
        <div class="col-auto flex-grow-1">
            <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('logout') }}">Logout</a>
        </div>
        <div class="col-auto">
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
        <button class="btn btn-outline-primary " type="submit"><i class="bi bi-search"></i></button>
    </div>
        </div>
    </div>
    


<div class="row bg-black-op position-relative py-3 rounded" style="box-shadow: 0 5px 15px #6c757d;">
    <!-- user block -->
    <div class=" col-auto" id="addOptions">
        
        <div class="col-12 mb-4">
            
            <div class="nav-item btn-group" role="group" aria-label="Default button group">
                <div class="dropdown btn-group">
                    <button class="btn btn-outline-primary border-end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Show by Role
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($roles as $role)
                        <li><a class="dropdown-item" href="{{ route('role', ['param' => $role->id]) }}">{{ $role->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn btn-outline-primary"><a href="{{ route('userall', ['param' => 'all']) }}" style="text-decoration:none;">Show All Users</a></button>

            </div>
        </div>
        <div class="col-12 mb-4" id="">
            <div class="btn-group" role="group" aria-label="Form & role group">
                <span class="input-group-text rounded-end-0 bg-transparent border-primary border-top-0 border-bottom-0">Add</span>
                <button type="button" class="btn btn-outline-primary" data-bs-target="#addClientByForm" data-bs-toggle="modal" aria-expanded="false" 
                aria-controls="addClientByForm" data-bs-parent="#addParent">Form & role Client</button>
                <button type="button" class="btn btn-outline-primary" data-bs-target="#addLawyerByForm" data-bs-toggle="modal" aria-expanded="false" 
                aria-controls="addLawyerByForm" data-bs-parent="#addParent">Form & role Lawyer</button>
            </div>
        </div>
        <div class="col-12">
        <div class="btn-group" role="group" aria-label="Role & id group">
            <span class="input-group-text rounded-end-0 bg-transparent border-primary border-top-0 border-bottom-0">Add</span>
                <button type="button" class="btn btn-outline-primary" data-bs-target="#addLawyerById" data-bs-toggle="modal" aria-expanded="false" 
                aria-controls="addLawyerById" data-bs-parent="#addParent">Lawyer-role by ID</button>
            </div>
            <div class="btn-group" role="group" aria-label="Form & role group">
                <button type="button" class="btn btn-outline-primary" data-bs-target="#editUserById" data-bs-toggle="modal" aria-expanded="false" 
                aria-controls="#editUserById" data-bs-parent="#addParent">Edit User by ID</button>
            </div>
            
            <button type="button" class="btn btn-outline-primary" data-bs-target="#deleteUserById" data-bs-toggle="modal" aria-expanded="false" 
            aria-controls="#deleteUserById" data-bs-parent="#addParent">Delete User by ID</button>
        </div>

    </div>
    <!-- Legal case buttons  -->
    <!--
        -->
    <div class="col-auto  position-absolute top-0 start-50 translate-middle-x py-3" id="displayLegalCase">
        
    <div class="nav-item btn-group col-auto" role="group" aria-label="Default button group">
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
        <button type="button" class="btn btn-outline-success"><a href="{{ route('caseall', ['param' => 'all']) }}" style="text-decoration:none;"
        class="text-success">All Cases</a></button>
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
    <!-- Admin -->
    <div class=" col-auto ms-auto text-end" id="displayAdmin">
        <div class="col-12 mb-4">
            
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
<!-- Lawyer By Id -->
    <div class="modal fade" id="add{{ $role->name }}ById" tabindex="-1" aria-labelledby="add{{ $role->name }}ByIdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="{{ route('admin.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <button type="button" class="btn-close me-auto ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                        <button class="btn btn-outline-primary">Add {{ $role->name }}</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Add user ID to apply role Lawyer">
                        <input type="text" class="form-control my-2" placeholder="Lawyer specialization" name="specialization" value="">
                        <input type="text" class="form-control" placeholder="Years of exp" name="yearsOfExp" value="">
                        <input type="hidden" class="form-control" placeholder="" readonly name="role_id" value="{{  $role->id }}">
                        
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
        <div class="modal fade" id="editUserById" tabindex="-1" aria-labelledby="editUserByIdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <button type="button" class="btn-close me-auto ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                        <button class="btn btn-outline-primary">Search</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="User ID">
                        <small class="text-center d-block">In order to edit user data, first search</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>

    <?php // Delete  
    ?>
    <div class="row">
        <div class="col-12">
        <div class="modal fade" id="deleteUserById" tabindex="-1" aria-labelledby="deleteUserByIdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <button type="button" class="btn-close me-auto ms-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                        <button class="btn btn-outline-danger">Delete</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="User ID">
                        <small class="text-center d-block text-danger">Delete action is final, proceed with caution</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
    <?php // Search  
    ?>


</body>
</html>
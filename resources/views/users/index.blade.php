@extends('layout.base')


@section('content')

    @include('layout.navbar.nav')

    <div id="index_users_app">

        <div class="row">
            <h1 class="text-center"> USERS </h1>
            <br>
            <div class="row gap-2 gap-md-0 p-2 m-3">
                <div class="col-sm-6 col-md-9 d-grid">
                    <input class="form-control" type="text" v-model="search_query" placeholder="search users by name or email..." />
                </div>
                <div class="col-sm-2 col-md-3 d-grid">
                    <a href="{{ route('export_users') }}" class="btn btn-block btn-outline-warning">Export Users</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead style="background-color: #c70835; color:white;">
                        <tr>
                            <th role="button" @click="sort_by('id')">
                                ID
                                <i :class="(sort_direction === -1 && sort_column === 'id' ) ? 'bi bi-sort-alpha-up' : 'bi bi-sort-alpha-down'"></i>
                            </th>
                            <th role="button" @click="sort_by('name')">
                                Name
                                <i :class="(sort_direction === -1 && sort_column === 'name' ) ? 'bi bi-sort-alpha-up' : 'bi bi-sort-alpha-down'"></i>
                            </th>
                            <th role="button" @click="sort_by('email')">
                                Email
                                <i :class="(sort_direction === -1 && sort_column === 'email' ) ? 'bi bi-sort-alpha-up' : 'bi bi-sort-alpha-down'"></i>
                            </th>
                            <th role="button" @click="sort_by('phone')">
                                Phone
                                <i :class="(sort_direction === -1 && sort_column === 'phone' ) ? 'bi bi-sort-alpha-up' : 'bi bi-sort-alpha-down'"></i>
                            </th>
                            <th role="button" @click="sort_by('rfc')">
                                RFC
                                <i :class="(sort_direction === -1 && sort_column === 'rfc' ) ? 'bi bi-sort-alpha-up' : 'bi bi-sort-alpha-down'"></i>
                            </th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in filtered_users" :key="user.id">
                            <td>@{{ user.id }}</td>
                            <td>@{{ user.name }}</td>
                            <td>@{{ user.email }}</td>
                            <td>@{{ user.phone }}</td>
                            <td>@{{ user.rfc }}</td>
                            <td>@{{ user.notes }}</td>
                            <td>
                                <i class="bi bi-pencil-square mx-2" role="button" @click="get_user_by_id(user.id)"
                                    data-bs-toggle="modal" data-bs-target="#edit_modal"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Edit User">
                                </i>

                                <i class="bi bi-trash mx-2" role="button" @click="delete_user(user.id)"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Delete User">
                                </i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('users.edit')

    </div>

    <script type="module" src="{{ asset('js/scripts/index_users_app.js') }}"></script>

@endsection
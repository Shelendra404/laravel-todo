@extends('layout')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new task
        </div>
        {{-- TO DO: Make these parts into layout files --}}

        <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- Table Body -->
                <tbody>
                    <tr>
                        <td>
                            <form method="POST" action="/tasks">

                                @csrf
                                <div class="field">
                                    <label class="label" for="name">Task</label>
                                    <div class="control">
                                        <input class="input @error('name')is-danger @enderror" type="text" name="name"
                                            id="name">
                                    </div>
                                </div>
                                <button class="button is-link" type="submit">Submit</button>

                                {{-- TO DO: Prevent submitting if empty --}}
                                {{-- TO DO: Validate form input properly --}}

                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- TO DO: Allow editing todo's --}}
        {{-- TO DO: Allow reactivating a todo --}}
        {{-- TO DO: Build a proper layout for the site --}}

    </div>


    @if (count($tasks) > 0)

    <div class="panel panel-default">
        <div class="panel-heading">
            To Do
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                    <th>Task</th>

                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks->sortBy('id') as $task)
                    @if ($task->completed === false)

                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td>
                            <button class="btn btn-info" data-name="{{ $task->name }}" data-id={{ $task->id }}
                                data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
                        </td>
                        <td>
                            <form method="POST" action="/tasks/{{ $task->id }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Completed tasks
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
                <th>Task</th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($tasks as $task)
                @if ($task->completed === true)
                <tr>
                    <!-- Task Name -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Edit task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-task-form" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="task-name" class="form-control" placeholder="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

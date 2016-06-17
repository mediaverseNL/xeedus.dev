@extends('layouts.app')

@section('title')
   admin - all users
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">admin all users</div>

                    <div class="panel-body">

                        @include('layouts.menus.admin_menu')

                        {{--<a class="btn btn-primary" href="{{ URL::route('admin_authors_requests') }}">requests</a>--}}

                        <table class="table-condensed table-bordered table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nr</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>credits</th>
                                    <th>status</th>
                                    <th>verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $user)
                                    <tr class="table-row"data-href="{{URL::route('admin_authors_show', $user->id)}}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->user->name }}</td>
                                        <td>{{ $user->user->email }}</td>
                                        <td>{{ $user->credit_bank }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->verified }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">{{__('profile.title')}}</div>

                <div class="panel-body">

                    <div class="alert alert-info">{{__('profile.message_edit_pefil')}}</div>
                    <hr/>
                    <h2>Personal</h2>
                    <table class="table">
                        <tr>
                            <td>{{__('profile.name')}}</td>
                            <td>Iago Effting</td>
                        </tr>
                        <tr>
                            <td>{{__('profile.plan')}}</td>
                            <td>Basico</td>
                        </tr>
                    </table>
                    <a class="btn btn-primary" href="#">{{__('profile.edit_buttom')}}</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{__('profile.title_change_password')}}</div>
                <div class="panel-body">
                    <div class="alert alert-info">{{__('profile.message_change_passord')}}</div>

                    <hr/>
                    <a class="btn btn-primary" href="#">Change Password</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{__('profile.title_danger_area')}}</div>
                <div class="panel-body">
                    <div class="alert alert-danger">{{__('profile.message_danger_area')}}</div>
                    <hr/>
                    <a class="btn btn-danger" href="">{{__('profile.delete_account_buttom')}}</a>
                    <a class="btn btn-default" href="">{{__('profile.disable_account_buttom')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
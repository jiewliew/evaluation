@extends('layouts.app')
@section('title', "- Register")
@section('content')

<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">ข้อมูลส่วนตัว</strong>
                            </div>
                            <div class="card-body">
                                <register-component></register-component>
                                <!--center> <input value="บันทึก" button type="submit" class="btn btn-primary btn-sm"></center-->
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection

@extends('layouts.app')

@section('content')

<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">ข้อมูลแบบประเมิน</strong>
                            </div>
                            <div class="card-body">
                                <dataassessment-component></dataassessment-component>
                                <!--center> <input value="บันทึก" button type="submit" class="btn btn-primary btn-sm"></center-->
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection

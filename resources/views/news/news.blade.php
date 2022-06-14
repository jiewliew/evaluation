@extends('layouts.app')
@section('title', '- Student')
@section('content')
<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">เพิ่มข่าวสาร</strong>
                                
                            </div>
                            <div class="card-body">
                                <news-component></news-component>
                                <!--center> <input value="บันทึก" button type="submit" class="btn btn-primary btn-sm"></center-->
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
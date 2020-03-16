@extends('admin.master')
@section('content')
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel">
            <div class="panel_header">
                <div class="panel_title">
                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Divisions</span>
                </div>
            </div>
            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr>
                                <th>Name (English)</th>
                                <th>Name (Bangla)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divisions as $division)
                            <tr>
                                <td>{{$division->name_en}}</td>
                                <td>{{$division->name_bn}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ panel body -->
        </div>
        <!--/ panel -->
    </section>
    <!--/ page content -->
    <!-- start code here... -->
</div>
<!--/middle content wrapper-->
@endsection

@extends('website.master')
@section('content')
<section id="profile_detail">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="profile_image">
                        <div class="img_de_box">
                            <img class="lazy" data-src="{{asset('public/admins/images/team/'.$data->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
                        </div>
                        <div class="probile_tbl mt-3 text-left">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>

                                        <td class="fc">Name</td>
                                        <td class="sc">:</td>
                                        <td class="tc">{{$data->name}}</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Email</td>
                                        <td class="sc">:</td>
                                        <td class="tc">{{$data->email}}</td>
                                    </tr>

                                    <tr>

                                        <td class="fc">Phone</td>
                                        <td class="sc">:</td>
                                        <td class="tc">{{$data->phone}}</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Address</td>
                                        <td class="sc">:</td>
                                        <td class="tc">{{$data->address}}</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Description</td>
                                        <td class="sc">:</td>
                                        <td class="tc">{{$data->description}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- mobile version -->
                        <div class="probile_tbl_mb mt-3 text-left" style="display: none;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>

                                        <td class="fc">Name</td>
                                        <td class="sc">:</td>
                                        <td class="tc">Md.Mosabberuzzaman</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Email</td>
                                        <td class="sc">:</td>
                                        <td class="tc">zamanovi160@gmail.com</td>
                                    </tr>

                                    <tr>

                                        <td class="fc">Phone</td>
                                        <td class="sc">:</td>
                                        <td class="tc">01685208379</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Address</td>
                                        <td class="sc">:</td>
                                        <td class="tc">Shahrasti,Chandpur,Chattogram</td>
                                    </tr>
                                    <tr>

                                        <td class="fc">Description</td>
                                        <td class="sc">:</td>
                                        <td class="tc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit
                                            dicta officia iusto unde sapiente assumenda repellendus harum dolore quas
                                            suscipit!</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
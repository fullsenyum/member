@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        <section class="vh-20" style="background-color: #f4f5f7;">
                            <div class="container py-5 h-20">
                                <div class="row d-flex justify-content-center align-items-center h-20">
                                    <div class="col col-lg-6 mb-4 mb-lg-0">
                                        <div class="card mb-3" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-black"
                                                     style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                    <img src="{{ asset('storage/'.Auth::user()->foto) }}"
                                                         alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                                    <h5>{{Auth::user()->name}}</h5>
                                                    <p>{{Auth::user()->jk}}</p>
                                                    <i class="far fa-edit mb-5"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h6>Information</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>Email</h6>
                                                                <p class="text-muted">{{Auth::user()->email}}</p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Nohp</h6>
                                                                <p class="text-muted">{{Auth::user()->nohp}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
